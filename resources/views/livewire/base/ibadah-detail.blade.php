@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('/css/ibadah-detail.css') }}">
@endpush


<div class="">
    <div class="ibadah-detail-page">
        <div class="container">
            <div class="back-button-container">
                <div id="back-button" class="back-button">
                    < Kembali
                </div>
            </div>


            <h2 class="page-title">Rincian Ibadah</h2>
            <h1 class="page-title">{{ $JadwalIbadah->ibadah->name }}</h1>

            <div class="page-content">
                <div class="content-row">
                    <span class="row-title">Tempat Ibadah</span>
                    <span class="row-content">{{ $this->get_jemaat($JadwalIbadah->tempat_ibadah)->nama }}, keluarga : {{ $this->get_jemaat($JadwalIbadah->tempat_ibadah)->keluarga }}</span>
                </div>
                <div class="content-row">
                    <span class="row-title">Tanggal dan waktu</span>
                    <span class="row-content">{{ $JadwalIbadah->waktu }}</span>
                </div>
                @foreach ($JadwalIbadah->peran_anggota as $peranAnggota)
                    <div class="content-row">
                        <span class="row-title">{{ $this->get_peran($peranAnggota->id_peran)->peran }}</span>
                        <span class="row-content">{{ $this->get_anggota($peranAnggota->id_anggota)->nama }}</span>
                    </div>                    
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function (){
        $('#back-button').click(function (){
            history.go(-1);
        })

    })

</script>
@endpush