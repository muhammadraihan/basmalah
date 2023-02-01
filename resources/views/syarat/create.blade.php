@extends('layouts.page')

@section('title', 'Syarat Create')

@section('css')
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/select2/select2.bundle.css')}}">
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/dropzone/dropzone.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Add New <span class="fw-300"><i>Syarat </i></span></h2>
                <div class="panel-toolbar">
                    <a class="nav-link active" href="{{route('syarat.index')}}"><i class="fal fa-arrow-alt-left">
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
                    {!! Form::open(['route' => 'syarat.store','id'=>'forms','method' => 'POST','class' =>
                    'needs-validation','dropzone', 'forms','novalidate','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group col-md-6 mb-3">
                        {{ Form::label('name','Kategori Syarat',['class' => 'required form-label'])}}
                        {!! Form::select('name', $kategori, '', ['id' =>
                        'name','class' =>
                        'name form-control'.($errors->has('name') ? 'is-invalid':''), 'required'
                        => '', 'placeholder' => 'Pilih Kategori Syarat']) !!} @if ($errors->has('name'))
                        <div class="help-block text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div id="box" class="form-row align-items-center panel-content">
                        <div class="form-group col-md-4 mb-4">
                            {{ Form::label('detail','Syarat Detail',['class' => 'require form-label']) }}
                            <input type="text" name="detail[]" id="detail[]" class="form-control" placeholder="Syarat Detail">
                        </div>
                        <div class="form-group col-sm-1 col-xl-1">
                            <button id="addBox" class="btn btn-info" type="button btn-group">
                                <i class="fal fa-plus"></i>
                            </button>
                        </div>
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
        $('.name').select2();
        $('#photo').change(function(){
            
            let reader = new FileReader();
         
            reader.onload = (e) => { 
         
              $('#preview-image-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });

        var i = 0;
        $('#addBox').on('click', function(e){
            e.preventDefault();
            i++;
            $('<div id="box"/>').addClass('input-group')
            .html($('<div class="form-group col-sm-4 col-xl-4">{{ Form::label("detail","Syarat Detail",["class" => "form-label"]) }} <input type="text" name="detail['+i+']" id="detail['+i+']" class="form-control" placeholder="Syarat Detail"></div>'))
            .append($('<div class="form-group col-sm-1 col-xl-1"><br><button id="removeBox" class="btn btn-danger remove"><i class="fal fa-minus"></i></button></div>'))
            .insertAfter($('[id="box"]').last());
        });

        $(document).on('click', 'button.remove', function(e){
            e.preventDefault();
            $(this).closest('div.input-group').remove();
        })
    });
</script>
@endsection