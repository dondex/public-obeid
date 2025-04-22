@extends('layouts.app-nonav')

@section('content')
<div class="px-5 pt-2 icon-container">
    <a href="{{ url('/') }}"><i class="bi bi-house"></i></a>
</div>
<div class="login-container">
      <div class="login-header">
        <img src="{{ asset('uploads/login-img.jpg') }}" alt="Header Image" />
        <h6 class="mt-3 text-success fw-bold">
          Transforming the standards of healthcare
        </h6>
      </div>

      <form method="POST" action="{{ route('login') }}">
      @csrf
        <div class="mb-3 mt-4">
          <input
            id="login"
            type="text"
            class="form-control @error('login') is-invalid @enderror"
            name="login"
            placeholder="Email or Resident Number"
            value="{{ old('login') }}"
            required
            autocomplete="login"
            autofocus

          />
          @error('login')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
           @enderror
        </div>
        <div class="mb-3 position-relative">
          <input
            type="password"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Password"
            id="password"
            name="password"
            required
            autocomplete="current-password"
          />
          @error('password')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="mb-4 form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                </label>
        </div>

        <div class="d-flex">
          <button type="submit" class="btn btn-success login-btn">
            {{ __('Login') }}
          </button>
         
        </div>

      </form>
      

      


      
      <div class="d-flex justify-content-between align-items-center mt-4">

      
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">
            <button  class="open-file-btn">{{ __('Forgot Your Password?') }}</button>
          </a>
            
         @endif
        
        
         <a href="{{ route('register') }}">
            <button  class="open-file-btn">Register</button>
         </a>
        
       
      </div>
</div>
@endsection