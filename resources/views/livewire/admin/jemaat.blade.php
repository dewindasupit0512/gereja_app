@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css\admin-jemaat.css') }}">
@endpush

@push('sidebar-slot')
    @include('layouts.inc.admin-sidebar')
@endpush

<div class="page admin-jemaat">
    @include('layouts.inc.admin-navbar')

    <div class="page-content">
        <h1>Data Jemaat</h1>
        <form wire:submit.prevent='add_jemaat' class="add-data-wrapper">
            <div class="form-group-material">
                <input wire:model='nama' id="nama" type="text" required data-msg="Masukkan nama lengkap jemaat" class="input-material">
                <label for="nama" class="label-material">Nama Lengkap</label>
                @error('nama')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group-material">
                <input wire:model='keluarga' id="keluarga" type="text" data-msg="Masukkan keluarga" class="input-material">
                <label for="keluarga" class="label-material">Keluarga</label>
                @error('keluarga')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group-material">
                <input wire:model='tanggal_lahir' id="tanggal_lahir" type="date" data-msg="Masukkan tanggal lahir" class="input-material">
                <label for="tanggal_lahir" class="label-material">Tanggal lahir</label>
                @error('tanggal_lahir')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group-material">
                <input wire:model='rayon' id="rayon" type="number" min="1" class="input-material">
                <label for="rayon" class="label-material">Rayon</label>
                @error('rayon')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-floating">
                <select wire:model='jenis_kelamin' id="jenis_kelamin" class="form-select">
                    <option selected>Pilih jenis_kelamin</option>
                    <option value="laki-laki">Laki - laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                <label for="hari_Ibadah">Jenis Kelamin</label>
            </div>
            
            <div class="form-floating">
                <select wire:model='status' id="status" class="form-select">
                    <option selected>Pilih status</option>
                    <option value="pemuda-remaja">Pemuda / Remaja</option>
                    <option value="sekolah-minggu">Sekolah Minggu</option>
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
                <label for="hari_Ibadah">Status</label>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nama Lengkap</th>
                        <th>Keluarga</th>
                        <th>Rayon</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Tanggal Lahir</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jemaats as $jemaat)
                        <tr>
                            <td>{{ $jemaat->id }}</td>
                            <td>{{ $jemaat->nama }}</td>
                            <td>{{ $jemaat->keluarga }}</td>
                            <td>{{ $jemaat->rayon }}</td>
                            <td>{{ $jemaat->jenis_kelamin }}</td>
                            <td>{{ $jemaat->status }}</td>
                            <td>{{ $jemaat->tanggal_lahir }}</td>
                            <td><a href="#">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-wrapper">

        </div>
    </div>

</div>
