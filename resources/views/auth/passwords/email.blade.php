
@extends('layouts.master-without-nav')


@section('content')
@section('title','Reset Password')
       <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index" class="logo logo-admin">
                            <h3 style="font-weight: bold;color: #ff00b6;">SMP N 19 Kota Jambi</h3>
                        </a>

                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 mb-3 text-center">Reset Password</h4>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @else
                        <div class="alert alert-info" role="alert">
                            Masukkan email anda untuk menerima permintaan reset password.
                        </div>
                        @endif
                        <form class="form-horizontal m-t-30" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="useremail">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p>Remember It ? <a href="{{ route('login') }}" class="font-500 font-14 text-primary font-secondary"> Sign In Here </a> </p>
                <p>© {{date('Y')}} {{config('web_config')['WEB_TITLE']}}. Crafted with <i class="bi bi-heart text-danger"></i> by <a href="https://saugi.me">Nissa hasanah siagian</a></p>
            </div>

        </div>
@endsection