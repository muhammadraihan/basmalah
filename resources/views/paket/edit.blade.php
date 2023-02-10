@extends('layouts.page')

@section('title', 'Paket Edit')

@section('css')
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/select2/select2.bundle.css')}}">
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/dropzone/dropzone.css')}}">
<link rel="stylesheet" media="screen, print"
    href="{{asset('css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
            <h2>Edit <span class="fw-300"></span></h2>
                <div class="panel-toolbar">
                    <a class="nav-link active" href="{{route('paket.index')}}"><i class="fal fa-arrow-alt-left">
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
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                    </div>
                    {!! Form::open(['route' => ['paket.update',$paket->uuid],'method' => 'PUT','class' =>
                    'needs-validation','novalidate', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group col-md-3 mb-3">
                        {{ Form::label('kategori','Kategori',['class' => 'required form-label'])}}
                        {!! Form::select('kategori', $kategori, $paket->kategori, ['id' =>
                        'kategori','class' =>
                        'kategori form-control'.($errors->has('kategori') ? 'is-invalid':''), 'required'
                        => '', 'placeholder' => 'Pilih Kategori']) !!} @if ($errors->has('kategori'))
                        <div class="help-block text-danger">{{ $errors->first('kategori') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        {{ Form::label('nama','Nama Paket',['class' => 'required form-label'])}}
                        {!! Form::select('nama', $namapaket, $paket->nama, ['id' =>
                        'nama','class' =>
                        'nama form-control'.($errors->has('nama') ? 'is-invalid':''), 'required'
                        => '', 'placeholder' => 'Pilih Nama Paket']) !!}
                         @if ($errors->has('nama'))
                        <div class="help-block text-danger">{{ $errors->first('nama') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('tanggal','Tanggal Keberangkatan',['class' => 'required form-label'])}}
                        {{ Form::text('tanggal',$paket->tanggal,['placeholder' => 'Tanggal Keberangkatan','class' => 'tanggal form-control '.($errors->has('tanggal') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('tanggal'))
                        <div class="invalid-feedback">{{ $errors->first('tanggal') }}</div>
                        @endif
                    </div>  
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('hari','Jumlah Hari',['class' => 'required form-label'])}}
                        {{ Form::text('hari',$paket->hari,['placeholder' => 'Jumlah Hari','class' => 'form-control '.($errors->has('hari') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('hari'))
                        <div class="invalid-feedback">{{ $errors->first('hari') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-15 mb-6">
                        {{ Form::label('include','Include',['class' => 'required form-label'])}}
                        {{ Form::textarea('include',$paket->include,['placeholder' => 'Include','class' => 'include form-control '.($errors->has('include') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('include'))
                        <div class="invalid-feedback">{{ $errors->first('include') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-15 mb-6">
                        {{ Form::label('exclude','Exclude',['class' => 'required form-label'])}}
                        {{ Form::textarea('exclude',$paket->exclude,['placeholder' => 'Exclude','class' => 'exclude form-control '.($errors->has('exclude') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('exclude'))
                        <div class="invalid-feedback">{{ $errors->first('exclude') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('harga','Harga',['class' => 'required form-label'])}}
                        <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                </div>
                        {{ Form::text('harga',$paket->harga,['placeholder' => '','class' => 'form-control '.($errors->has('harga') ? 'is-invalid':''),'required', 'autocomplete' => 'off', 'data-inputmask' => "'alias': 'currency','prefix': ''"])}}
                        @if ($errors->has('harga'))
                        <div class="invalid-feedback">{{ $errors->first('harga') }}</div>
                        @endif
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-3">
                        {{ Form::label('transportasi','Transportasi',['class' => 'required form-label'])}}
                        {!! Form::select('transportasi', $transport, $paket->transportasi, ['id' =>
                        'transport','class' =>
                        'transport form-control'.($errors->has('transportasi') ? 'is-invalid':''), 'required'
                        => '', 'placeholder' => 'Pilih Transportasi']) !!} @if ($errors->has('transportasi'))
                        <div class="help-block text-danger">{{ $errors->first('transportasi') }}</div>
                        @endif
                    </div>    
                    <div class="form-group col-md-3 mb-3">
                        {{ Form::label('hotel','Hotel',['class' => 'required form-label'])}}
                        {!! Form::select('hotel', $hotel, $paket->hotel, ['id' =>
                        'hotel','class' =>
                        'hotel form-control'.($errors->has('hotel') ? 'is-invalid':''), 'required'
                        => '', 'placeholder' => 'Pilih Hotel']) !!} @if ($errors->has('hotel'))
                        <div class="help-block text-danger">{{ $errors->first('hotel') }}</div>
                        @endif
                    </div> 
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('detail','Detail Paket',['class' => 'required form-label'])}}
                        {{ Form::text('detail',$paket->detail,['placeholder' => 'Detail Paket','class' => 'form-control '.($errors->has('detail') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('detail'))
                        <div class="invalid-feedback">{{ $errors->first('detail') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('photo','Photo',['class' => 'required form-label'])}}
                        <input type="hidden" name="oldImage" value="{{ $paket->photo }}"> 
                        @if ($paket->photo)
                            <img src="{{ asset('photo/' . $paket->photo) }}" class="img-preview img-fluid mb-10 col-sm-10 d-block">
                        @else
                            <img class="img-preview img-fluid mb-5 col-sm-5">
                        @endif
                        {{ Form::file('photo',null,['placeholder' => 'Photo','class' => 'form-control upload '.($errors->has('photo') ? 'is-invalid':''),'required', 'autocomplete' => 'off', 'id' => 'photo'])}}
                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                        alt="preview image" style="max-height: 250px;">
                        @if ($errors->has('photo'))
                        <div class="invalid-feedback">{{ $errors->first('photo') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('status','Status Paket',['class' => 'required form-label'])}}
                        {!! Form::select('status', array('0' => 'Tersedia', '1' => 'Full Booked'), $paket->status,
                        ['id'=>'status','class'
                        => 'custom-select'.($errors->has('status') ? 'is-invalid':'') ,'required'
                        => '', 'placeholder' => 'Pilih Status Paket ...'])!!}
                        @if ($errors->has('status'))
                        <div class="invalid-feedback">{{ $errors->first('status') }}</div>
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
<script src="{{asset('js/formplugins/inputmask/inputmask.bundle.js')}}"></script>
<script src="{{asset('js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
        $('.transport').select2();
        $('.hotel').select2();
        $('#nama').select2();
        $('.kategori').select2();
        $('#status').select2();
        $(':input').inputmask();

        CKEDITOR.replace('include');
        CKEDITOR.replace('exclude');

        $('#kategori').change(function (e) {
            var kategori = $(this).val();
            var option = $(this).select2('data');
            
            $.ajax({
                url:"{{route('get.namapaket')}}",
                type: 'GET',
                data: {kategori:kategori},
                success: function(e) {
                    $("#nama").empty();
                    $("#nama").append('<option value="">Pilih Nama Paket</option>');
                    $.each(e, function(key, value) {
                        $("#nama").append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
            
        });

        $('.tanggal').datepicker({
            orientation: "bottom left",
            format:'yyyy-mm-dd', // Notice the Extra space at the beginning
            todayHighlight:'TRUE',
            autoclose: true,
            todayBtn: "linked",
            clearBtn: true,
        });

        $('#photo').change(function(){
            
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