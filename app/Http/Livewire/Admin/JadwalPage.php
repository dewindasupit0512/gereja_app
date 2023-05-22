<?php

namespace App\Http\Livewire\Admin;

use DateTime;
use App\Models\Peran;
use App\Models\Ibadah;
use App\Models\Jemaat;
use Livewire\Component;
use App\Models\JadwalIbadah;
use App\Models\PeranAnggota;
use App\Models\JadwalGenerate;
use App\Models\PelayananIbadah;

class JadwalPage extends Component
{
    // Model Variable
    public $jemaat;
    public $anggota;
    public $generatedJadwal;

    // Binding Variable
    public $jumlah_jadwal;
    public $hari_ibadah;
    public $selected_ibadah;
    public $peran_anggota;
    public $tanggal_mulai;
    public $rayon;

    public $peran_anggota_id_dict;
    public $rayon_values;

    protected $rules = [
        'selected_ibadah' => 'required',
        'jumlah_jadwal' => 'required|numeric',
        'tanggal_mulai' => 'required',
        'peran_anggota' => 'required',
    ];

    public function mount() {
        $this->jemaat = null;
        $this->anggota = null;
        
        $this->generatedJadwal = JadwalGenerate::with('ibadah')->get()->sortByDesc('created_at');

        $this->jumlah_jadwal = 7;
        $this->tanggal_mulai = "";
        $this->selected_ibadah = '';
        $this->peran_anggota = [];
        $this->peran_anggota_id_dict = [];
        $this->rayon = '';


        $this->rayon_values = $this->get_rayon_values();
        sort($this->rayon_values);
    }

    private function get_rayon_values() {
        $rayon_values = [];
        foreach(Jemaat::get() as $jemaat) {
            array_push($rayon_values, $jemaat->rayon);
        }
        return array_unique($rayon_values);
    }

    public function render()
    {
        $ibadah_list = Ibadah::get()->all();
        $peran_list = Peran::get()->all();
        return view('livewire.admin.jadwal-page', [
            'ibadah_list' => $ibadah_list,
            'perans' => $peran_list,
        ])->layout('layouts.admin_app');
    }

    public function prepare_generate() {
        $this->validate();
        if ($this->selected_ibadah == 'rayon') {
            $this->validate([
                'rayon' => 'required|numeric',
            ]);
        }

        $this->jemaat = $this->filter_jemaat_model($this->selected_ibadah);
        $this->anggota = PeranAnggota::whereIn('id_peran', $this->peran_anggota)->with(['anggota', 'peran'])->get()->all();
        
        $this->peran_anggota_id_dict = array_combine($this->peran_anggota, array_fill(0, count($this->peran_anggota), []));

        foreach ($this->anggota as $pa) {
            if (in_array($pa->id_peran, array_keys($this->peran_anggota_id_dict))) {
                array_push($this->peran_anggota_id_dict[$pa->id_peran], $pa->id_anggota);
            }
        }

        $initial_pop = $this->generate_population($this->jumlah_jadwal, $this->jemaat->toArray(), $this->peran_anggota, $this->peran_anggota_id_dict);
        $initial_pop_score =  $this->count_score($initial_pop);
        
        $optimized_pop =  $this->genetic_algorithm_optimize($initial_pop);
        $optimized_pop_score =  $this->count_score($optimized_pop);

        $Ibadah = Ibadah::where('name_slug', '=', $this->selected_ibadah)->first();        
        $this->store_generated_jadwal(
            $optimized_pop,
            $Ibadah,
            $this->tanggal_mulai
        );
        
        return redirect(request()->header('Referer'));
    }
    
    private function filter_jemaat_model($ibadah) {
        if ($ibadah == 'pemuda-remaja') {
            return Jemaat::where('status' , '=', 'pemuda-remaja')->get();
        }
        else if ($ibadah == 'raya') {
            return Jemaat::get(2);
        }
        else if ($ibadah == 'rayon') {
            return Jemaat::where('rayon', '=', $this->rayon)
                    ->whereIn('status', ['pria', 'wanita'])
                    ->get();
        }
        else if ($ibadah == 'pria') {
            return Jemaat::where('status', '=', 'pria')
                    ->get();
        }
        else if ($ibadah == 'wanita') {
            return Jemaat::where('status', '=', 'wanita')
                    ->get();
        }
        else if ($ibadah == 'sekolah-minggu') {
            return Jemaat::where('status', '=', 'sekolah-minggu')
                    ->get();
        }
        return null;
    }

    private function array_get_random($arr) {
        $randomKey = array_rand($arr);
        return $arr[$randomKey];
    }

    private function generate_population($num, $places, $peran_anggota, $peran_anggota_id_dict) {
        $population = [];

        foreach(range(1,$num) as $i) {
            $place = $this->array_get_random($places);

            $data_peran = [];
            foreach($peran_anggota as $pa_id) {
                $peran_to_push = $this->array_get_random($peran_anggota_id_dict[$pa_id]);
                if ($data_peran != null) {
                    foreach (range(0,100) as $i) {
                        $peran_to_push = $this->array_get_random($peran_anggota_id_dict[$pa_id]);
                        if ( !in_array($peran_to_push, $data_peran) ) {
                            break;
                        }
                    }
                }
                array_push($data_peran, $peran_to_push);
            }
            
            $perans = array_combine($peran_anggota, $data_peran);

            array_push($population, [$place['id'], $perans]);
        }
        return $population;
    }

    private function count_score($population) {
        $final_score = 0;
        // Count Jemaat / Lokasi Ibadah Score
        $location_count_val = array_count_values(array_column($population, 0));
        foreach($location_count_val as $data) {
            $session_score = 10;
            $plus_number = 0;

            if ($data > 1) {
                foreach (range(1, $data) as $i) {
                    $plus_number += 10;
                    $session_score += $plus_number;
                }
            }
            else {
                $session_score = 0;
            }
            $final_score += $session_score;
        }
        // Calculate the Gap
        $gap_session_score = 0;
        $max_val = max($location_count_val);
        $min_val = min($location_count_val);

        if ($max_val != $min_val) {
            $gap_session_score = 200 * ($max_val - $min_val);
        } else {
            $gap_session_score = 0;
        }
        $final_score += $gap_session_score;

        
        // ---------------------------------
        // Count Anggota's Score
        $peran_id_dict_values = array_column($population, 1);
        // scoring 1 person with duplicate role
        foreach($peran_id_dict_values as $peran_id) {
            foreach(array_count_values($peran_id) as $data) {
                $session_score = 100;
                if ($data > 1) {
                    $session_score *= $data;
                } else {
                    $session_score = 0;
                }
                $final_score += $session_score;
            }
        }

        return $final_score;
    }

    private function return_unique_individuals($population) {
        $population_index = range(0, count($population) - 1);
        
        $population_return = [];
        foreach ($population_index as $px) {
            $state_individual = $population[$px];
            foreach ($population as $indv) {
                if ($population_return) {
                    if ($indv == $state_individual) {
                        if (!$this->is_indv_in_arr($indv, $population_return)) {
                            array_push($population_return, $state_individual);
                        }
                    }
                } else {
                    array_push($population_return, $state_individual);
                }
            }
        }

        return $population_return;
    }

    private function is_indv_in_arr($indv, $arr) {
        foreach ($arr as $ar) {
            if ($ar == $indv) {
                return true;
            }
        }
        return false;
    }

    private function get_random_values($parent, $key) {
        $index = rand(0, count($parent) - 1 );
        return $parent[$index][$key];
    }

    private function crossover($parent, $pop_size) {
        if (count($parent) < $pop_size) {
            $desired_individual_len = $pop_size - count($parent);
            $children = [];
            
            foreach (range(0, $desired_individual_len - 1) as $i) {
                array_push($children, [
                    $this->get_random_values($parent, 0),
                    $this->get_random_values($parent, 1),
                ]);
            }
            
            $population = array_merge($parent, $children);
            return $population;
        }
        return $parent;
    }

    private function mutate($population, $parent_len, $mutate_change=0.4) {
        foreach ($population as $key=>$indv) {
            if ($key >= $parent_len) {
                $rate = mt_rand() / mt_getrandmax();

                if ($mutate_change > $rate) {
                    $pos_to_mutate = rand(0,1);
                    $recent_val = $indv[$pos_to_mutate];

                    $new_val_to_mutate = $this->get_random_values($population, $pos_to_mutate);
                    
                    while ($new_val_to_mutate == $recent_val) {
                        $new_val_to_mutate = $this->get_random_values($population, $pos_to_mutate);
                    }

                    $population[$key][$pos_to_mutate] = $new_val_to_mutate;
                }
            }
        }
        return $population;
    }

    private function genetic_algorithm_optimize(
        $population,
        $diversity_rate=0.2,
        $mutation_rate=0.4,
        $genetic_iteration=10000
    ) {
        $score = null;
        $best_population = null;

        foreach(range(0, $genetic_iteration) as $i) {
            $population_size = count($population);
            $parent =  $this->return_unique_individuals($population);
    
            // Genetic Diversity
            foreach($parent as $indv_div) {
                if (count($parent) < $population_size) {
                    $rate = mt_rand() / mt_getrandmax();
                    if ($diversity_rate > $rate) {
                        array_push($parent, $indv_div);
                    }
                }
            }
    
            // Crossover
            $population = $this->crossover($parent, $population_size);

            // Mutation
            $population = $this->mutate($population, count($parent), $mutation_rate);
            $newScore = $this->count_score($population);
            
            if ($score == null) {
                $score = $newScore;
                $best_population = $population;
            } else {
                if ( $newScore < $score ) {
                    $score = $newScore;
                    $best_population = $population;
                }
            }
        }

        return $best_population;
    }

    private function generateDate($startDay, $dayofWeek, $numDates) {
        $date = new DateTime($startDay);        // YYYY-MM-DD
        $dates = array();                       // 1 = Monday || 6 = Saturday || 0 = Sunday
        $calcNumDate = $numDates * 7;
        for ($i = 0; $i < $calcNumDate; $i++) {
            $currDayOfWeek = $date->format('w');
            if ($currDayOfWeek == $dayofWeek) {
                $dates[] = $date->format('Y-m-d');
            }
            $date->modify('+1 day');
        }
        return $dates;
    }

    private function store_generated_jadwal($population, $Ibadah, $start_date) {
        shuffle($population);
        $jadwalGenerate = new JadwalGenerate;
        $jadwalGenerate->ibadah_id = $Ibadah->id;
        $jadwalGenerate->active_status = false;
        $jadwalGenerate->save();

        // Store JadwalIbadah
        $generatedDate = $this->generateDate($start_date, $Ibadah->hari, count($population));
        foreach($population as $i=>$indv) {
            $jadwalIbadah = new JadwalIbadah;
            $jadwalIbadah->generate_id = $jadwalGenerate->id;
            $jadwalIbadah->waktu = $generatedDate[$i] . ' ' . $Ibadah->jam;
            $jadwalIbadah->tempat_ibadah = $indv[0];
            $jadwalIbadah->save();

            // Store PelayananIbadah
            for ($j=0; $j < count($indv[1]); $j++) {
                $peran_id = array_keys($indv[1])[$j];
                $anggota_id = $indv[1][$peran_id];

                $pelayananIbadah = new PelayananIbadah;
                $pelayananIbadah->id_jadwal_ibadah = $jadwalIbadah->id;
                
                $peranAnggota = PeranAnggota::where('id_anggota', '=', $anggota_id)
                                                ->where('id_peran', '=', $peran_id)
                                                ->first();
                if ($peranAnggota) {
                    $pelayananIbadah->id_peran_anggota = $peranAnggota->id;
                } else {
                    $newPeranAnggota = new PeranAnggota;
                    $newPeranAnggota->id_anggota = $anggota_id;
                    $newPeranAnggota->id_peran = $peran_id;
                    $newPeranAnggota->save();
                    $pelayananIbadah->id_peran_anggota = $newPeranAnggota->id;
                }
                $pelayananIbadah->save();
            }
        }
    }


}
