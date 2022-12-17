@extends('layouts.page')

@section('title', 'Hotel Create')

@section('css')
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/select2/select2.bundle.css')}}">
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/dropzone/dropzone.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Add New <span class="fw-300"><i>Hotel </i></span></h2>
                <div class="panel-toolbar">
                    <a class="nav-link active" href="{{route('hotel.index')}}"><i class="fal fa-arrow-alt-left">
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
                    {!! Form::open(['route' => 'hotel.store','id'=>'forms','method' => 'POST','class' =>
                    'needs-validation','dropzone', 'forms','novalidate','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('name','Nama Hotel',['class' => 'required form-label'])}}
                        {{ Form::text('name',null,['placeholder' => 'Nama Hotel','class' => 'form-control '.($errors->has('name') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('grade','Bintang',['class' => 'required form-label'])}}
                        {!! Form::select('grade', array('3' => '3', '4' => '4', '5' => '5'), '',
                        ['id'=>'grade','class'
                        => 'custom-select select2'.($errors->has('grade') ? 'is-invalid':'') ,'required'
                        => '', 'placeholder' => 'Pilih Bintang Hotel ...'])!!}
                        @if ($errors->has('grade'))
                        <div class="invalid-feedback">{{ $errors->first('grade') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('location','Lokasi Hotel',['class' => 'required form-label'])}}
                        {{ Form::text('location',null,['placeholder' => 'Lokasi Hotel','class' => 'form-control '.($errors->has('location') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('location'))
                        <div class="invalid-feedback">{{ $errors->first('location') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('photo','Photo',['class' => 'required form-label'])}}
                        {{ Form::file('photo',null,['placeholder' => 'Photo','class' => 'form-control upload '.($errors->has('photo') ? 'is-invalid':''),'required', 'autocomplete' => 'off', 'id' => 'photo'])}}
                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                        alt="preview image" style="max-height: 250px;">
                        @if ($errors->has('photo'))
                        <div class="invalid-feedback">{{ $errors->first('photo') }}</div>
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
<script src="{{asset('js/formplugins/dropzone/dropzone.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
        $('#photo').change(function(){
            
            let reader = new FileReader();
         
            reader.onload = (e) => { 
         
              $('#preview-image-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });
    });
</script>
@endsection