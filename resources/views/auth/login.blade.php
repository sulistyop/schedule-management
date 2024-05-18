@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 40em">
        <div class="col-md-6">
            <div class="card border-0 p-0 m-0">
                <div class="">
                    <div class="col-md-8 offset-md-2">
                        <h4 class="fw-bold">{{__('Login')}}</h4>
                        <p class="text-md-start text-muted">Enter your email and password to login to Monster Backup Dashboard</p>
                    </div>
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email Address" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Minimal 8 Character" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login to Your Account') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
