@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css\admin-jadwal-page.css') }}">
@endpush

@push('sidebar-slot')
    @include('layouts.inc.admin-sidebar')
@endpush

<div class="page admin-jadwal-page">
    @include('layouts.inc.admin-navbar')

    <div class="page-content">
        <h1>Generate Jadwal</h1>
        <form wire:submit.prevent='prepare_generate' class="input-wrapper">
            <div class="form-group-material">
                <input wire:model='jumlah_jadwal' id="jumlah_jadwal" type="number" required class="input-material">
                <label for="jumlah_jadwal" class="label-material">Jumlah Jadwal</label>
                @error('jumlah_jadwal')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group-material">
                <input wire:model='tanggal_mulai' id="tanggal_mulai" type="date" class="input-material">
                <label for="tanggal_mulai" class="label-material active">Tanggal mulai</label>
                @error('tanggal_mulai')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating">
                <select wire:model='selected_ibadah' id="ibadah" class="form-select">
                    <option selected>Pilih ibadah</option>
                    @foreach ($ibadah_list as $ib)
                        <option value="{{ $ib->name_slug }}">{{ $ib->name }}</option>                    
                    @endforeach
                </select>
                <label for="hari_Ibadah">Ibadah</label>
                @error('selected_ibadah')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            @if ($selected_ibadah == 'rayon')
                <div class="form-floating">
                    <select wire:model='rayon' id="rayon" class="form-select">
                        <option hidden selected>Pilih rayon</option>
                        @foreach ($rayon_values as $i)
                            <option value="{{ $i }}">{{ $i }}</option>                    
                        @endforeach
                    </select>
                    <label for="rayon">Rayon</label>
                    @error('rayon')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>
            @endif

            <div class="checkbox-wrapper">
                @foreach ($perans as $peran)
                    <div class="form-check">
                        <input wire:model='peran_anggota' type="checkbox" class="form-check-input" value="{{ $peran->id }}" id='peran-{{ $peran->id }}-checkbox'>
                        <label for="peran-{{ $peran->id }}-checkbox" class="form-check-label">{{ $peran->peran }}</label>
                    </div>
                @endforeach
                @error('peran_anggota')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Generate</button>
        </form>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Nama Ibadah</th>
                        <th>Tanggal generate</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($generatedJadwal as $jadwal)
                    <tbody>
                        <tr>
                            <td>{{ $jadwal->active_status }}</td>
                            <td>{{ $jadwal->ibadah->name }}</td>
                            <td>{{ $jadwal->created_at }}</td>
                            <td><a href="{{ route('admin.jadwal-detail', ['generate_id' => $jadwal->id]) }}">Tinjau</a></td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>

    </div>

</div>
