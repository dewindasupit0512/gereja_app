@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css\admin-tambah-peran.css') }}">
@endpush

@push('sidebar-slot')
    @include('layouts.inc.admin-sidebar')
@endpush

<div class="page admin-tambah-peran">
    @include('layouts.inc.admin-navbar')

    <div class="page-content">
        <h1>Tambah Peran</h1>
        <form wire:submit.prevent='simpan_peran' class="input-wrapper tambah-anggota-form">
            <div class="form-group-material">
                <input wire:model='peran' id="nama" type="text" name="name" required data-msg="Tambahkan nama peran" class="input-material">
                <label for="nama" class="label-material">Peran</label>
            </div>
            <button type="submit" name="btnAdd" class="btn btn-primary">Tambah</button>
        </form>
        <div class="content-body">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Peran</th>
                    <th colspan="2">Tindakan</th>
                </tr>
                @foreach ($perans as $peran)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $peran->peran }}</td>
                        <td><span wire:click='hapus_peran({{ $peran->id }})' class='delete_button'>Hapus</span></td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>

</div>