 {{-- <form action="{{ route('register') }}" method="POST" class="register-form"> --}}
    <form action="{{ route('register') }}" method="POST" class="register-form">
        @csrf

        <a href="#"><img src={{asset("images/logo.png")}} width="130px" alt=""></a>
        <p class="title"><u>Register for new membership</u></p>
        @include('include.flash')

        <div class="input-field">
            <i class="icon fas fa-user"></i>
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus
                placeholder="First name"/>
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-field">
            <i class="icon fas fa-user"></i>
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus
                placeholder="Last name"/>
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-field">
            <i class="icon fas fa-user"></i>
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                name="username" value="{{ old('username') }}" required autocomplete="username" autofocus
                placeholder="Username"/>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-field">
            <i class="icon fas fa-envelope"></i>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"/>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-field">
            <i class="icon fas fa-location"></i>
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                name="address" value="{{ old('address') }}" required autocomplete="address" autofocus
                placeholder="Address"/>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-field">
            <i class="icon fas fa-phone"></i>
            <input id="phone" type="integer" class="form-control @error('phone') is-invalid @enderror"
                name="phone" value="{{ old('phone') }}" required autocomPlete="phone" autofocus
                placeholder="phone"/>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-field">
            <i class="icon fas fa-lock"></i>
            <input id="password" type="password"
                class="form-control @error('password') is-invalid @enderror" name="password" required
                autocomplete="new-password" placeholder="Password"/>
            {{-- @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
        </div>

        <div class="input-field">
            <i class="icon fas fa-lock"></i>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                required autocomplete="new-password" placeholder="Retype password"/>
        </div>

        <button type="submit" class="btn">
            {{ __('Register') }}
        </button>
        {{-- <input type="submit" class="btn" value="Register" /> --}}

    </form>

