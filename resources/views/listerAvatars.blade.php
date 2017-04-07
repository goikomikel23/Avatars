@extends('insertAvatar')

@section('contentForm')

    <!-- Une liste en HTML -->

    <div>
        <div class="row">
            <h2 class="text-center">Liste des avatars</h2>
        </div>
        <table class="table table-striped panel-body">
            <thead>
            <tr>
                <th class="text-center">Avatar</th>
                <th class="text-center">Courriel</th>
                <th class="text-center">Supprimer</th>
            </tr>
            </thead>
            <tbody>
                @each('listerAvatarsLoop', $avatars, 'avatar') <!-- Take the avatars collection from the database and make a row for each email -->
            </tbody>
        </table>
        <div class="row">
            <a class="center-block btn btn-success" href="{{ route('insertAvatar') }}"> Créer Avatar</a>
        </div>
    </div>


@endsection