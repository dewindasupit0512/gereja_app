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
                <label for="jenis_kelamin">Jenis Kelamin</label>
            </div>
            
            <div class="form-floating">
                <select wire:model='status' id="status" class="form-select">
                    <option selected>Pilih status</option>
                    <option value="pemuda-remaja">Pemuda / Remaja</option>
                    <option value="sekolah-minggu">Sekolah Minggu</option>
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
                <label for="status">Status</label>
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
                            <td>
                                @if ($jemaat->id != $edit_id)
                                    {{ $jemaat->nama }}
                                @else
                                    <div class="input-group">
                                        <input wire:model='edit_nama' id="edit_nama" type="text" required data-msg="Masukkan nama lengkap jemaat" class="input-material" placeholder="Nama Lengkap">
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($jemaat->id != $edit_id)
                                    {{ $jemaat->keluarga }}
                                @else
                                    <div class="input-group">
                                        <input wire:model='edit_keluarga' id="edit_keluarga" type="text" data-msg="Masukkan keluarga" class="input-material" placeholder="keluarga">
                                    </div>                    
                                @endif
                            </td>
                            <td>
                                @if ($jemaat->id != $edit_id)
                                    {{ $jemaat->rayon }}
                                @else
                                    <div class="input-group">
                                        <input wire:model='edit_rayon' id="edit_rayon" type="number" min="1" class="input-material" placeholder="rayon">
                                    </div>                    
                                @endif
                            </td>
                            <td>
                                @if ($jemaat->id != $edit_id)
                                    {{ $jemaat->jenis_kelamin }}
                                @else
                                    <div class="form-floating">
                                        <select wire:model='edit_jenis_kelamin' id="edit_jenis_kelamin" class="form-select">
                                            <option selected>Pilih jenis_kelamin</option>
                                            <option value="laki-laki">Laki - laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                        <label for="edit_jenis_kelamin">Jenis Kelamin</label>
                                    </div>
                                @endif                    
                            </td>
                            <td>
                                @if ($jemaat->id != $edit_id)
                                    {{ $jemaat->status }}
                                @else
                                    <div class="form-floating">
                                        <select wire:model='edit_status' id="edit_status" class="form-select">
                                            <option selected>Pilih status</option>
                                            <option value="pemuda-remaja">Pemuda / Remaja</option>
                                            <option value="sekolah-minggu">Sekolah Minggu</option>
                                            <option value="pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                        <label for="edit_status">Status</label>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($jemaat->id != $edit_id)
                                    {{ $jemaat->tanggal_lahir }}
                                @else
                                    <div class="form-group-material">
                                        <input wire:model='edit_tanggal_lahir' id="edit_tanggal_lahir" type="date" data-msg="Masukkan tanggal lahir" class="input-material">
                                    </div>
                                @endif                    
                            </td>
                            <td>
                                @if ($jemaat->id != $edit_id)
                                    <button wire:click='set_edit_state({{ $jemaat->id }})' class="btn btn-primary">Edit</button>
                                @else
                                    <button wire:click='save_edited' class="btn btn-success">Simpan</button>
                                    <button wire:click='delete_record({{ $jemaat->id }})' class="btn btn-danger">Hapus</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-wrapper">

        </div>
    </div>

</div>
