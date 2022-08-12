@extends('app')
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>
@section('content')
@guest
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{ route('register.action') }}" method="POST">
                    @csrf
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">

                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">LOGIN REPORTING</p>
                    </div>

                    <!-- Email input -->
                    <div class="mb-3">
                        <label>Nama user <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_user" value="{{ old('nama_user') }}" />
                    </div>
                    <div class="form-outline mb-4">

                        <input class="form-control form-control-lg" type="username" name="username" value="{{ old('username') }}" />
                        <label class="form-label" for="username">user name</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">

                        <input class="form-control form-control-lg" type="password" name="password" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="form-outline mb-3">
                        <label>Password Confirmation<span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password_confirm" />
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">

                        </div>

                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button class="btn btn-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;">daftar</button>
                        <a class="btn btn-danger" href="{{ route('login') }}" style="padding-left: 2.5rem; padding-right: 2.5rem;">Back</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>
@endguest
@endsection