@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="forms-container">
            <div class="login-register">

                <form action="{{ route('login') }}" method="POST" class="login-form">
                    @csrf
                    <a href="#"><img src={{asset("images/logo.png")}} width="130px" alt=""></a>
                    <p class="title"><u>Sign in to begin your journey</u></p>
                    {{-- <br> --}}
                    {{-- <br> --}}
                    @include('include.flash')

                    <div class="input-field" @if($errors->count() > 0 )style="margin-bottom: 25px;" @endif>
                        <i class="icon fas fa-envelope"></i>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                            autofocus />
                        @if($errors->has('email'))
                        <p class="text-danger" style="width: 300px; padding-top:10px; color:red;">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="input-field">
                        <i class="icon fas fa-lock"></i>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Password" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-8">
                        <div class="incheck-primary">
                            <input class="" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn solid">
                        {{ __('Login') }}
                    </button>

                    {{-- @if (Route::has('password.request'))
                        <a class=" btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif --}}


                    {{-- <input type="submit" value="Login" class="btn solid" /> --}}
                </form>
                @include('auth.register')

            </div>
        </div>
        
                <div class="panels-container">
                    <div class="panel left-panel">
                        <div class="content">
                            <h3>New here ?</h3>
                            <p>
                                If you are new here, please register and begin your new journey with us.
                            </p>

                            {{-- @if (Route::has('register'))
                        <li class="btn transparent" id="register-btn">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                            <button class="btn transparent" id="register-btn">
                                Register now
                            </button>
                        </div>
                        <img src="images/undraw_adventure_map_hnin.svg" class="image" alt="" />
                    </div>
                    <div class="panel right-panel">
                        <div class="content">
                            <h3>One of us ?</h3>
                            <p>
                                Welcome back, Sign in and arrange your journey.
                            </p>

                            <button class="btn transparent" id="login-btn">
                                Sign in
                            </button>
                        </div>
                        <img src="images/register.svg" class="image" alt="" />
                    </div>
                </div>


            @endsection
