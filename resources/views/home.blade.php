@extends('layouts.app')

@section('content')
    @if(Auth::guest()) <!-- If the user is not logged in, the view will show the loggin form -->

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else <!-- If the user is logged in, the view will show the dashboard -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <h1 class="text-center">Bienvenue {{Auth::user()->name}}</h1> <!-- Takes the username from the auth session variable -->
                            </div>
                            <div class="row">
                                <div class="span4"></div>
                                <div class="span4"><img class="center-block" src="{{ route('downloadAvatar', ['email' => Auth::user()->email]) }}" width="350" height="350" /></div>
                                <div class="span4"></div> <!-- Calls to the route to take the user's avatar image -->
                            </div>
                            <div class="row">
                                <h4 class="text-center">Ton Panel</h4>
                            </div>
                            <div class="row">
                                <a class="center-block btn btn-success" href="{{ route('listerAvatars') }}"> Lister Avatars</a>
                            </div>
                            <div class="row">
                                <a class="center-block btn btn-success" href="{{ route('insertAvatar') }}"> Créer Avatar</a>
                            </div>
                        </div> <!-- Add two buttons with the link to the views for show the avatars list and the avatar insertion form -->
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection