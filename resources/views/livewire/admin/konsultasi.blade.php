@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css\admin-konsultasi.css') }}">
@endpush

@push('sidebar-slot')
    @include('layouts.inc.admin-sidebar')
@endpush

<div class="page admin-konsultasi">
    @include('layouts.inc.admin-navbar')

    <div class="page-content">
        <h1>Pesan Masuk</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>Tanggal</td>
                        <td>Nama</td>
                        <td>Email / HP</td>
                        <td>Pesan</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Konsultasi as $data)
                        <tr>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }} / {{ $data->phone }}</td>
                            <td>{{ $data->message }}</td>
                            <td>
                                <button wire:click='delete_message({{ $data->id }})' class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

    </div>

</div>