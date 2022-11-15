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
                    </div>
                    {!! Form::open(['route' => ['paket.update',$paket->uuid],'method' => 'PUT','class' =>
                    'needs-validation','novalidate', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('jenis_paket','Jenis Paket',['class' => 'required form-label'])}}
                        {!! Form::select('jenis_paket', array('haji' => 'Haji', 'umrah' => 'Umrah'), $paket->jenis_paket,
                        ['id'=>'jenis_paket','class'
                        => 'custom-select'.($errors->has('jenis_paket') ? 'is-invalid':'') ,'required'
                        => '', 'placeholder' => 'Pilih Jenis Paket ...'])!!}
                        @if ($errors->has('jenis_paket'))
                        <div class="invalid-feedback">{{ $errors->first('jenis_paket') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('nama','Nama Paket',['class' => 'required form-label'])}}
                        {{ Form::text('nama',$paket->nama,['placeholder' => 'Nama Paket','class' => 'form-control '.($errors->has('nama') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('nama'))
                        <div class="invalid-feedback">{{ $errors->first('nama') }}</div>
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
                        {{ Form::label('include','Include',['class' => 'required form-label'])}}
                        {{ Form::textarea('include',$paket->include,['placeholder' => 'Include','class' => 'form-control '.($errors->has('include') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
                        @if ($errors->has('include'))
                        <div class="invalid-feedback">{{ $errors->first('include') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        {{ Form::label('exclude','Exclude',['class' => 'required form-label'])}}
                        {{ Form::text('exclude',$paket->exclude,['placeholder' => 'Exclude','class' => 'form-control '.($errors->has('exclude') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
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
<script>
    $(document).ready(function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
        $('.transport').select2();
        $('.hotel').select2();
        $('#jenis_paket').select2();
        $('#status').select2();
        $(':input').inputmask();

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