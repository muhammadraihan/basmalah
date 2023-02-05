@extends('layouts.page')

@section('title', 'Testimoni Edit')

@section('css')
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/select2/select2.bundle.css')}}">
<link rel="stylesheet" media="screen, print"
    href="{{asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
            <h2>Edit <span class="fw-300"><i>{{$testimoni->judul}}</i></span></h2>
                <div class="panel-toolbar">
                    <a class="nav-link active" href="{{route('testimoni.index')}}"><i class="fal fa-arrow-alt-left">
                        </i>
                        <span class="nav-link-text">Back</span>
                    </a>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                        data-offset="0,10" data-original-title="Fullscreen"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        Form with <code>*</code> can not be empty.
                    </div>
                    @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    {!! Form::open(['route' => ['testimoni.update',$testimoni->uuid],'method' => 'PUT','class' =>
                    'needs-validation','novalidate', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('nama_jemaah','Nama Jemaah',['class' => 'required form-label'])}}
                        {{ Form::text('nama_jemaah',$testimoni->nama_jemaah,['placeholder' => 'Nama Jemaah','class' => 'form-control '.($errors->has('nama_jemaah') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('nama_jemaah'))
                        <div class="invalid-feedback">{{ $errors->first('nama_jemaah') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('umur','Usia',['class' => 'required form-label'])}}
                        {{ Form::text('umur',$testimoni->umur,['placeholder' => 'Usia','class' => 'form-control '.($errors->has('umur') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('umur'))
                        <div class="invalid-feedback">{{ $errors->first('umur') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('nama_paket','Nama Paket',['class' => 'required form-label'])}}
                        {{ Form::text('nama_paket',$testimoni->nama_paket,['placeholder' => 'Nama Paket','class' => 'form-control '.($errors->has('nama_paket') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('nama_paket'))
                        <div class="invalid-feedback">{{ $errors->first('nama_paket') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('tanggal','Tanggal Keberangkatan',['class' => 'required form-label'])}}
                        {{ Form::text('tanggal',$testimoni->tanggal,['placeholder' => 'Tanggal Keberangkatan','class' => 'tanggal form-control '.($errors->has('tanggal') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('tanggal'))
                        <div class="invalid-feedback">{{ $errors->first('tanggal') }}</div>
                        @endif
                    </div>  
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('judul','Komentar',['class' => 'required form-label'])}}
                        {{ Form::textarea('judul',$testimoni->judul,['placeholder' => 'Komentar','class' => 'form-control '.($errors->has('judul') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('judul'))
                        <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('video','Media',['class' => 'required form-label'])}}
                        <input type="hidden" name="oldImage" value="{{ $testimoni->video }}"> 
                        @if ($testimoni->video)
                            <img src="{{ asset('photo/' . $testimoni->video) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-5 col-sm-5">
                        @endif
                        {{ Form::file('video',null,['placeholder' => 'Media','class' => 'form-control upload '.($errors->has('video') ? 'is-invalid':''),'required', 'autocomplete' => 'off', 'id' => 'video'])}}
                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                        alt="preview image" style="max-height: 250px;">
                        @if ($errors->has('video'))
                        <div class="invalid-feedback">{{ $errors->first('video') }}</div>
                        @endif
                    </div>
                <div
                    class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                    <button class="btn btn-primary ml-auto" type="submit">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('js/formplugins/select2/select2.bundle.js')}}"></script>
<script src="{{asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();

        $('.tanggal').datepicker({
            orientation: "bottom left",
            format:'yyyy-mm-dd', // Notice the Extra space at the beginning
            todayHighlight:'TRUE',
            autoclose: true,
            todayBtn: "linked",
            clearBtn: true,
        });

        $('#video').change(function(){
            
            let reader = new FileReader();
         
            reader.onload = (e) => { 
         
              $('#preview-image-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });
        
        // Generate a password string
        function randString(){
            var chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNP123456789";
            var string_length = 8;
            var randomstring = '';
            for (var i = 0; i < string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum, rnum + 1);
            }
            return randomstring;
        }
        
        // Create a new password
        $(".getNewPass").click(function(){
            var field = $('#password').closest('div').find('input[name="password"]');
            field.val(randString(field));
        });

        //Enable input and button change password
        $('#enablePassChange').click(function() {
            if ($(this).is(':checked')) {
                $('#passwordForm').attr('disabled',false); //enable input
                $('#getNewPass').attr('disabled',false); //enable button
            } else {
                    $('#passwordForm').attr('disabled', true); //disable input
                    $('#getNewPass').attr('disabled', true); //disable button
            }
        });
    });
</script>
@endsection