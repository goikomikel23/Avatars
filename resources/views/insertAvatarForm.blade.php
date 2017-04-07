@extends('insertAvatar')

@section('contentForm')

    <div class="row">
        <h2 class="text-center">Chargez votre Avatar</h2>
    </div>

    {!! Form::open(['route' => 'addAvatarSubmit', 'method' => 'post', 'files' => true]) !!}

    {{ csrf_field() }} <!-- To protect from CSRF attacks -->

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group, text-center">
                {!! Form::label('emailLabel_form', 'Courriel') !!}
                {!! Form::email('email_form', '', ['class' => 'center-block'],array('required' => 'required')) !!}

            </div>
        </div>


        <div class="col-xs12 col-sm-12 col-md-12">
            <div class="form-group text-center pad">
                {!! Form::label('avatarLabel_form', 'Avatar') !!}
                {!! Form::file('image', ['class' => 'center-block'],array('required' => 'required')) !!}

            </div>
        </div>

        <div class="col-xs12 col-sm-12 col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary center-block padButton">Charger</button>

                {!! Form::close() !!}
            </div>

        </div>
    </div>


@endsection