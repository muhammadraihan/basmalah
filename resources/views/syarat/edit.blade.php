@extends('layouts.page')

@section('title', 'Syarat Edit')

@section('css')
<link rel="stylesheet" media="screen, print" href="{{asset('css/formplugins/select2/select2.bundle.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
            <h2>Edit <span class="fw-300"><i>{{$syarat->name}}</i></span></h2>
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
                    @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    {!! Form::open(['route' => ['syarat.update',$syarat->uuid],'method' => 'PUT','class' =>
                    'needs-validation','novalidate', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group col-md-3 mb-3">
                        {{ Form::label('name','Kategori Syarat',['class' => 'required form-label'])}}
                        {!! Form::select('name', $kategori, $syarat->name, ['id' =>
                        'name','class' =>
                        'name form-control'.($errors->has('name') ? 'is-invalid':''), 'required'
                        => '', 'placeholder' => 'Pilih Kategori Syarat']) !!} @if ($errors->has('name'))
                        <div class="help-block text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div id="box" class="form-row align-items-center panel-content">
                        <div class="form-group col-md-4 mb-4">
                            {{ Form::label('detail','Syarat Detail',['class' => 'require form-label']) }}
                            {{ Form::text('detail',$syarat->detail,['placeholder' => 'Syarat Detail','id' => 'detail[]','class' => 'form-control '.($errors->has('detail') ? 'is-invalid':''),'required', 'autocomplete' => 'off'])}}
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
<script>
    $(document).ready(function(){
        $('.name').select2();

        // var text ='';
        // var i;

        // for(i=0;i<detail.length;i++){
        //     text += detail[i] + "<br>";
        // }

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