@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
    <div class="header header-filter"
        style="background-image: url('{{ 'img/city.jpg' }}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="header header-primary text-center">
                                <h4>{{ __('Inicio de sesión') }}</h4>
                                <div class="social-line">
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <p class="text-divider">{{ __('Ingresa tus datos') }}</p>
                            <div class="content">

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>

                                    <input id="email" type="email" placeholder="Email..."
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input id="password" type="password" placeholder="Password..."
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- If you want to add a checkbox to this form, uncomment this code -->

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('Recordar sesión') }}
                                    </label>
                                </div>
                            </div>

                            <div class="footer text-center">
                                <button type="submit"
                                    class="btn btn-simple btn-primary btn-lg mb-0">{{ __('Ingresar') }}</a>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-simple btn-primary" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; 2016, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com"
                        target="_blank">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
@endsection
