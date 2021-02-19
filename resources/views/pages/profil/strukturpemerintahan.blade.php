@extends('layouts.app')
@section('title','Struktur Pemerintahan') 
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.0/css/jquery.orgchart.css" integrity="sha512-SKoKfn6Eth8Kj8vZWM0xHEzSiZbmdTAdJFaZ9q8qiNY1clmPHect/GGWEWSxankQQieDVf9ZW4UUH6nnUCMXTA==" crossorigin="anonymous" />
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
            {{-- <div>{{ $jabatans }}</div> --}}
            {{-- <img id="myImg"  style="width:97%;" src="@if(! $profil->file_struktur_organisasi =='') {{ asset($profil->file_struktur_organisasi) }} @else {{ 'http://placehold.it/700x400' }} @endif"> --}}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.0/js/jquery.orgchart.js" integrity="sha512-Rv/K0cxEUXGig+atSkEogerzocK4zxogh+B4XsRscHfGbHBQZCMrIF+lF9Hy5VG8bpBVrroBhYCc80XYBJYk9A==" crossorigin="anonymous"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/js/jquery.orgchart.min.js"></script> --}}
<script>
  $(function() {
    // var ds = {!! $jabatans !!} ;
    var datasource = {
      'name': 'Lao Lao',
      'title': 'general manager',
      'office': '白城',
      'children': [
        { 'name': 'Bo Miao', 'title': 'department manager', 'office': '北京' },
        { 'name': 'Su Miao', 'title': 'department manager', 'office': '北戴河',
          'children': [
            { 'name': 'Tie Hua', 'title': 'senior engineer', 'office': '北戴河' },
            { 'name': 'Hei Hei', 'title': 'senior engineer', 'office': '北戴河' }
          ]
        },
        { 'name': 'Yu Jie', 'title': 'department manager', 'office': '长春' },
        { 'name': 'Yu Li', 'title': 'department manager', 'office': '长春' },
        { 'name': 'Hong Miao', 'title': 'department manager', 'office': '长春' },
        { 'name': 'Yu Wei', 'title': 'department manager', 'office': '长春' },
        { 'name': 'Chun Miao', 'title': 'department manager', 'office': '长春' },
        { 'name': 'Yu Tie', 'title': 'department manager', 'office': '长春' }
      ]
    };
    var nodeTemplate = function(data) {
      return `
        <span class="office" style="font-size:7px">${data.title}</span>
        <div class="title" style="font-size:7px">${data.name}</div>
        <div class="content no-padding" style="font-size:7px; heigh:0px auto;">${data.title}</div>
      `;
    };
    var oc = $('#chart-container').orgchart({
      'data' : datasource,
      'nodeTemplate': nodeTemplate
    });
    });
</script>   
@endpush


