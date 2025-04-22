@extends('layouts.app-nonav')

@section('content')
<div class="px-5 pt-2 icon-container">
    <a href="{{ url('/') }}"><i class="bi bi-house"></i></a>
</div>
<div class="login-container">
      <div class="login-header">
        <img src="{{ asset('uploads/reg2.jpg') }}" alt="Header Image" />
        <h6 class="mt-3 text-success fw-bold">
            Welcome to Your Health Journey: Register Now
        </h6>
      </div>

      <form method="POST" action="{{ route('register') }}">
      @csrf
        <div class="my-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input
                id="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                name="name"
                placeholder="Full Name"
                value="{{ old('name') }}"
                required
                autocomplete="name"
                autofocus

            />
            @error('login')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="my-3">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input
                id="email"
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                name="email"
                placeholder="Email Address"
                value="{{ old('email') }}"
                required
                autocomplete="email"
               

            />
            @error('login')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="my-3">
            <label for="resident_number" class="form-label">{{ __('Resident Number') }}</label>
            <input
                id="resident_number"
                type="text"
                class="form-control @error('resident_number') is-invalid @enderror"
                name="resident_number"
                placeholder="Residential Number"
                value="{{ old('resident_number') }}"
                required

            />
            @error('login')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>


        <div class="mb-3 position-relative">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Password"
                id="password"
                name="password"
                required
                autocomplete="new-password"
            />
            @error('password')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
        </div>

        <div class="mb-3 position-relative">
            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
            <input
                type="password"
                class="form-control"
                placeholder="Password"
                id="password-confirm"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />
            @error('password')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
        </div>

       

        <div class="d-flex">
          <button type="submit" class="btn btn-success login-btn">
            {{ __('Register') }}
          </button>
         
        </div>

      </form>
      

      


      
      <div class="d-flex justify-content-between align-items-center mt-4">

      
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">
            <button  class="open-file-btn">{{ __('Forgot Your Password?') }}</button>
          </a>
            
         @endif
        
        
         <a href="{{ route('login') }}">
            <button  class="open-file-btn">Login</button>
         </a>
        
       
      </div>
</div>
@endsection