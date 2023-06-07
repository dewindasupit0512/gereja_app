@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css\admin-keuangan.css') }}">
@endpush

@push('sidebar-slot')
    @include('layouts.inc.admin-sidebar')
@endpush

<div class="page admin-keuangan">
    @include('layouts.inc.admin-navbar')
    
    <div class="page-content">
        <h1>Informasi Keuangan</h1>
        <form wire:submit.prevent='store_report' class="head-form">
            <div class="form-floating">
                <select wire:model='status' id="status" class="form-select">
                    <option value="" selected>Pilih Status</option>
                    <option value="pemasukan" selected>Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
                <label for="status">Status</label>
                @error('status')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group-material">
                <input wire:model='amount' id="amount" type="number" required data-msg="Masukkan jumlah anggaran" class="input-material" placeholder="Jumlah Anggaran" step="1000" min="0">
                @error('amount')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group-material">
                <input wire:model='dateRecord' id="dateRecord" type="date" data-msg="Masukkan tanggal" class="input-material">
                <label for="dateRecord" class="label-material">Tanggal terdaftar</label>
                @error('dateRecord')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group-material">
                <input wire:model='desc' id="desc" type="text" data-msg="Masukkan keterangan" class="input-material" placeholder="Keterangan">
                @error('desc')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Keuangan as $item)
                        <tr>
                            <td>{{ $item->tanggal_terdaftar }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <button wire:click='delete_report({{ $item->id }})' class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
