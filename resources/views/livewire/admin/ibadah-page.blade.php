@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css\admin-ibadah-page.css') }}">
@endpush

@push('sidebar-slot')
    @include('layouts.inc.admin-sidebar')
@endpush

<div class="page admin-ibadah-page">
    @include('layouts.inc.admin-navbar')

    <div class="page-content">
        <h1>Ibadah</h1>
        <form wire:submit.prevent='tambah_ibadah' class="input-wrapper">
            <div class="form-group-material">
                <input wire:model='nama_ibadah' id="nama_ibadah" type="text" required data-msg="Masukkan nama ibadah" class="input-material">
                <label for="nama_ibadah" class="label-material">Nama Ibadah</label>
                @error('nama_ibadah')
                <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="from-group-material">
                <input type="time" wire:model='waktu_ibadah' class="form-control">
                @error('waktu_ibadah')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating">
                <select wire:model='hari_ibadah' id="hari_Ibadah" class="form-select">
                    <option selected>Pilih hari ibadah</option>
                    <option value="0">Minggu</option>
                    <option value="1">Senin</option>
                    <option value="2">Selasa</option>
                    <option value="3">Rabu</option>
                    <option value="4">Kamis</option>
                    <option value="5">Jumat</option>
                    <option value="6">Sabtu</option>
                </select>
                <label for="hari_Ibadah">Hari Ibadah</label>
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan Ibadah</button>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama Ibadah</th>
                        <th>Hari Ibadah</th>
                        <th>Jam Ibadah</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ibadah_list as $ibadah)
                        <tr>
                            <td>{{ $ibadah->name }}</td>
                            <td>
                                @if ($ibadah->id != $edit_id)
                                    {{ $this->translate_hari($ibadah->hari) }}
                                @else
                                    <div class="form-floating">
                                        <select wire:model='edit_day' id="edit_hari_Ibadah" class="form-select" style="font-size: 0.9rem">
                                            <option selected>Pilih hari ibadah</option>
                                            <option value="0">Minggu</option>
                                            <option value="1">Senin</option>
                                            <option value="2">Selasa</option>
                                            <option value="3">Rabu</option>
                                            <option value="4">Kamis</option>
                                            <option value="5">Jumat</option>
                                            <option value="6">Sabtu</option>
                                        </select>
                                        <label for="edit_hari_Ibadah">Hari Ibadah</label>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($ibadah->id != $edit_id)
                                    {{ $ibadah->jam }}
                                @else
                                    <div class="from-group-material">
                                        <input wire:model='edit_time' type="time" class="form-control" style="font-size: 0.9rem">
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($ibadah->id != $edit_id)
                                    <button wire:click='set_edit_state({{ $ibadah->id }})' style="font-size: 0.8rem" class="btn btn-primary">Edit</button>
                                @else
                                    <button wire:click='save_edited' style="font-size: 0.8rem" class="btn btn-success">Simpan</button>
                                    <button wire:click='delete_record({{ $ibadah->id }})' style="font-size: 0.8rem" class="btn btn-danger">Hapus</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        


    </div>

</div>
