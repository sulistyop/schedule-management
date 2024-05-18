@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="border-0">
                <div class="card-body">
                    <div class="col-md-12 fw-bold mb-2">
                        <div class="row">
                            <div class="col-2" style="margin-bottom: -150px">
                                <a href="{{ route('login') }}" class="mb-3 text-decoration-none">
                                    <i class="fas fa-arrow-circle-left base-color"></i>
                                    <span class="base-color">Back</span>
                                </a>
                            </div>
                            <div class="col-10 text-center offset-1">
                                <h2>Registration</h2>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <h5 class="base-color">Tell us about you</h5>
                            </div>
                        </div>


                    </div>
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-start fw-bold">{{ __('Name') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="John Doe" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-form-label text-md-start fw-bold">{{ __('Email') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="me@company.com" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-2 col-form-label text-md-start fw-bold">{{ __('Phone') }}</label>
                            <div class="col-md-2">
                                <select class="form-select" name="country_code" id="country_code">
                                    <option value="62">+62</option>
                                    <option value="1">+1</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="812xxxxxx" autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-2 col-form-label text-md-start fw-bold">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="password min 8 character" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-start fw-bold">{{ __('Confirm') }}</label>

                            <div class="col-md-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="re-type your password" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary rounded-5">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('title') || session('message'))
    <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{{ asset('images/monster-data.svg') }}" class="img-fluid mx-auto m-2" style="min-width: 250px" alt="Monster Backup">
                    @if(session('title'))
                        <div id="responseTitle" class="h5 mt-2 fs-1 base-color fw-bold">{{ session('title') }}</div>
                    @endif
                    @if(session('message'))
                        <div id="responseMessage" class="fs-4 base-color">{{ session('message') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

@endsection

