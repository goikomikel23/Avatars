@extends('insertAvatar')

@section('contentForm')

    <div class="row">
        <h2 class="text-center">Ton Avatar a été chargé!</h2>
    </div>
    <div class="row">
        <img class="center-block" width="300" height="300" src="{{ route('downloadAvatar', ['email' => $email]) }}" />
    </div> <!-- Shows the avatar image -->

    <div class="row">
        <a class="btn btn-success center-block" href="{{ route('home') }}"> Dashboard</a>
    </div>


@endsection
