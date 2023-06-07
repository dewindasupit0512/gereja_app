@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css\admin-jadwal-page.css') }}">
@endpush

@push('sidebar-slot')
    @include('layouts.inc.admin-sidebar')
@endpush


<div class="page admin-jadwal-page">
    @include('layouts.inc.admin-navbar')

    <div class="page-content">
        <h1>Jadwal Ibadah</h1>
        <div class="status-wrapper">
            <span>Status</span>
            <div class="form-check form-switch">
                <input wire:model='status' class="form-check-input" type="checkbox" id="status-switch">
                <label class="form-check-label" for="status-switch">
                @if ($status  == true)
                    Aktif
                @else
                    Mati
                @endif</label>
            </div>
            <div class="button-wrapper">  
                <button wire:click='delete_jadwal_ibadah({{ $generate_id }})' class="btn page-save-btn">Hapus</button>
                <button wire:click='save_changed' class="btn page-save-btn">Simpan</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>waktu</th>
                        <th>tempat ibadah</th>
                        @foreach ($perans as $peran)
                            <th>{{ $peran['peran'] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($JadwalIbadah as $jadwal)
                        <tr data-id={{ $jadwal->id }}>
                            <td class="waktu">
                                <span>{{ $jadwal->waktu }}</span>
                                <form action="">
                                    <input class="form-control" type="datetime-local" value="{{ $jadwal->waktu }}">
                                    <button class="save-edited-time-btn btn btn-primary" type="button">Simpan</button>
                                </form>
                            </td>
                            <td class="tempat col">
                                <span>{{ $jadwal->lokasi->keluarga }}</span>
                                <form action="">
                                    <select class="form-select toggleable" aria-label="Pilih tempat ibadah">
                                        <option selected>Pilih tempat ibadah</option>\
                                        @foreach ($Jemaat as $jm)
                                            <option value="{{ $jm->id }}">{{ $jm->keluarga }}</option>
                                        @endforeach
                                    </select>
                                    <button class="save-edited-place-btn btn btn-primary" type="button">Simpan</button>
                                </form>
                            </td>
                            @foreach ($jadwal->peran_anggota as $peran)
                                <td>
                                    {{ $this->get_anggota($peran->id_anggota)->nama }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>

@push('scripts')
<script>

    function td_input_hide() {
       $('tbody tr td input').removeClass('active') 
    }

    $('td.waktu span').on('click', function() {
        td_input_hide()
        $( this ).parent().find('form').first().toggleClass('active')
    })

    $('td.tempat span').on('click', function() {
        td_input_hide()
        $( this ).parent().find('form').first().toggleClass('active')
    })

    $('.save-edited-time-btn').on('click', function() {
        let inputId = $( this ).parents('tr').data('id')
        let inputVal = $( this ).parent().find('input').val()
        Livewire.emit('updateDateTime', inputId, inputVal)
    })

    $('.save-edited-place-btn').on('click', function() {
        let inputId = $( this ).parents('tr').data('id')
        let inputVal = $( this ).parent().find('select').val()
        Livewire.emit('updatePlace', inputId, inputVal)
    })

    $('td.waktu input').click(function () {
        let inputId = $( this ).data('id')
        let inputComp = $( this )
        $( this ).keypress(function (key) {
            if (key.keyCode == '13') {
                Livewire.emit('updateDateTime', inputId, inputComp.val())
            }
        })
    })
    


</script>
@endpush