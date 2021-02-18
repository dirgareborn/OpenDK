@extends('layouts.app')
@section('title','Struktur Pemerintahan') 
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/css/jquery.orgchart.min.css">
<link rel="stylesheet" href="{{ asset('/css/OrgChar.css') }}">
@endpush
@section('content')
<div class="col-md-8">
    <div class="box box-warning">
        <div class="box-header with-border">
            <div class="box-header with-border text-bold">
                <h3 class="box-title text-bold"><i class="fa  fa-arrow-circle-right fa-lg text-blue"></i> STRUKTUR PEMERINTAHAN  {{ strtoupper($sebutan_wilayah) }} {{ strtoupper($profil->kecamatan->nama) }}</h3>
            </div>
        </div>
        <div class="box-body">
            <!-- The Modal -->
            <div id="chart-container"></div>
            <img id="myImg"  style="width:97%;" src="@if(! $profil->file_struktur_organisasi =='') {{ asset($profil->file_struktur_organisasi) }} @else {{ 'http://placehold.it/700x400' }} @endif">
            <!-- The Modal -->
            <div class="col-md-5 col-xs-8">
                <label for="">Nama Camat</label> 
            </div>
            <label for="" class="col-md-1 no-padding">: </label>
            <div class="col-md-6">
                <label for="" class="text-muted">{{ $profil->nama_camat    ?? '-' }}</label>
            </div>
            <div class="col-md-5 col-xs-8">
                <label for="">Sekretaris Camat</label> 
            </div>
            <label for="" class="col-md-1 no-padding">: </label>
            <div class="col-md-6">
                <label for="" class="text-muted">{{ $profil->sekretaris_camat ?? '-'}}</label>
            </div>
            <div class="col-md-5 col-xs-8">
                <label for="">Kepala Seksi Pemerintahan Umum</label> 
            </div>
            <label for="" class="col-md-1 no-padding">: </label>
            <div class="col-md-6">
                <label for="" class="text-muted">{{ $profil->kepsek_pemerintahan_umum ?? '-'}}</label>
            </div>
            <div class="col-md-5 col-xs-8">
                <label for="">Kepala Seksi Kesejahteraan Masyarakat</label> 
            </div>
            <label for="" class="col-md-1 no-padding">:</label>
            <div class="col-md-6">
                <label for="" class="text-muted">{{ $profil->kepsek_kesejahteraan_masyarakat ?? '-'}}</label>
            </div>
            <div class="col-md-5 col-xs-8">
                <label for="">Kepala Seksi Pemberdayaan Masyarakat</label> 
            </div>
            <label for="" class="col-md-1 no-padding">:</label>
            <div class="col-md-6">
                <label for="" class="text-muted">{{ $profil->kepsek_pemberdayaan_masyarakat ?? '-'}}</label>
            </div>
            <div class="col-md-5 col-xs-8">
                <label for="">Kepala Seksi Pelayanan Umum</label> 
            </div>
            <label for="" class="col-md-1 no-padding">:</label>
            <div class="col-md-6">
                <label for="" class="text-muted">{{ $profil->kepsek_pelayanan_umum ?? '-'}}</label>
            </div>
            <div class="col-md-5 col-xs-8">
                <label for="">Kepala Seksi TRANTIB</label> 
            </div>
            <label for="" class="col-md-1 no-padding">:</label>
            <div class="col-md-6">
                <label for="" class="text-muted">{{ $profil->kepsek_trantib ?? '-'}}</label>
            </div> 
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/js/jquery.orgchart.min.js"></script>
<script src="{{ asset('/js/OrgChar.js') }}"></script>   
@endpush


