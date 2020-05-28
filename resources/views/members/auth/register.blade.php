@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('members.register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="username"
                               class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text"
                                   class="form-control @error('username') is-invalid @enderror"
                                   name="username" value="{{ old('username') }}" required autocomplete="username"
                                   autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone"
                               class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                   name="phone" value="{{ old('phone') }}" required autocomplete="username" autofocus>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>

                </form>
            </div>
        </div>
    </div>

@endsection
