@extends('layouts.app')

@section('content')
<!-- Main content -->
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ route('unduhan.prosedur') }}">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Kembali
                        </button>
                    </a>
                    <a href="{{ route('unduhan.prosedur.download', ['file'=> str_slug($prosedur->judul_prosedur)] ) }}">
                        <button type="button" class="btn btn-info btn-sm"><i class="fa fa-download"></i> Unduh
                        </button>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- form start -->
                    <div class="row overflow-x">
                        <div class="col-md-12">
                            @if(isset($prosedur->file_prosedur) && $prosedur->mime_type != 'pdf')
                                <img id="fileUnduhan" src="{{ asset($prosedur->file_prosedur) }}" width="100%">
                            @endif
                            @if(isset($prosedur->file_prosedur) && $prosedur->mime_type == 'pdf')
                                <object data="@if(isset($prosedur->file_prosedur)) {{ asset($prosedur->file_prosedur) }} @endif" type="application/pdf" width="100%" height="500" class="" id="showpdf"> </object>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
            </div>

        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.content -->
@endsection
