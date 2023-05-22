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
                                @foreach ($anggota->peran as $peran)
                                    {{ $peran->peran }}, 
                                @endforeach
                            </td>
                            <td>
                                <a href="#">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>