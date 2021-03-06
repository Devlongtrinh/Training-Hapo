@extends('layouts.app')

@section('content')
    <div class="container-fluid background-auth">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-login">
                    <div class="card-title">{{ __('artribute.sign_up_hapolearn') }}</div>

                    <div class="card-login-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="username"
                                    class="col-md-12 col-form-label text-md-left">{{ __('artribute.user_name') }}</label>

                                <div class="col-md-12">
                                    <input id="username" type="text"
                                        class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                                        value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email"
                                    class="col-md-12 col-form-label text-md-left">{{ __('artribute.email') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password"
                                    class="col-md-12 col-form-label text-md-left">{{ __('artribute.password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm"
                                    class="col-md-12 col-form-label text-md-left">{{ __('artribute.password_confirm') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password"
                                        class="form-control @error('password_confirm') is-invalid @enderror"
                                        name="password_confirm" required autocomplete="new-password">

                                    @error('password_confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="offset-md-4 col-md-12 col-xs-4 col-sm-4 col-xl-8 col-lg-8">
                                    <button type="submit" class="btn btn-primary btn-main col-md-4 col-lg-7 btn-register">
                                        {{ __('artribute.sign_up') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
