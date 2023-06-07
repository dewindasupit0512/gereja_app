@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css\admin-tambah-anggota.css') }}">
@endpush

@push('sidebar-slot')
    @include('layouts.inc.admin-sidebar')
@endpush

<div class="page admin-tambah-anggota">
    @include('layouts.inc.admin-navbar')

    <div class="page-content">
        <h1>Tambah Anggota</h1>
        <form wire:submit.prevent='simpan_anggota' class="input-wrapper tambah-anggota-form">
            <div class="form-group-material">
                <input wire:model='nama_anggota' id="nama" type="text" name="name" required data-msg="Masukkan nama anda" class="input-material">
                <label for="nama" class="label-material">Nama</label>
            </div>
            <button type="submit" name="btnAdd" class="btn btn-primary">Tambah</button>
            <div class="checkbox-wrapper">
                @foreach ($perans as $peran)
                    <div class="form-check">
                        <input wire:model='peran_anggota' type="checkbox" class="form-check-input" value="{{ $peran->id }}" id='peran-{{ $peran->id }}-checkbox'>
                        <label for="peran-{{ $peran->id }}-checkbox" class="form-check-label">{{ $peran->peran }}</label>
                    </div>
                @endforeach
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nama</td>
                        <td>Peran</td>
                        <td>Tindakan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggotas as $anggota)
                        <tr>
                            <td>{{ $anggota->id }}</td>
                            <td>{{ $anggota->nama }}</td>
                            <td>
                                @if ($anggota->id != $edit_id)
                                    @foreach ($anggota->peran as $peran)
                                        {{ $peran->peran }}, 
                                    @endforeach
                                @else
                                    <div class="peran-wrapper">
                                        @foreach ($perans as $peran)
                                            <div class="form-check">
                                                <input wire:model='edit_peran_anggota' type="checkbox" class="form-check-input" value="{{ $peran->id }}" id='{{ $anggota }}-peran-{{ $peran->id }}-checkbox'>
                                                <label for="{{ $anggota }}--peran-{{ $peran->id }}-checkbox" class="form-check-label">{{ $peran->peran }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </td>
                            <td>
                                <button wire:click='delete_anggota({{ $anggota->id }})' class="btn btn-danger" style="font-size: 0.8rem">Hapus</button>
                                @if ($anggota->id != $edit_id)
                                    <button wire:click="set_edit_state({{ $anggota }})" class="edit-btn btn btn-primary" style="font-size: 0.8rem">Edit</button>
                                @else
                                    <button wire:click="save_edited" class="edit-btn btn btn-success" style="font-size: 0.8rem">Simpan</button>
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>