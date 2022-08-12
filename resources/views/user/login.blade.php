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
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{ asset('dist/img/r.png')}}" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{ route('login.action') }}" method="POST">
                    @csrf
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">

                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">LOGIN REPORTING</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">

                        <input class="form-control form-control-lg" type="username" name="username" value="{{ old('username') }}" />
                        <label class="form-label" for="username">user name</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">

                        <input class="form-control form-control-lg" type="password" name="password" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">

                        </div>

                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button class="btn btn-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                       <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}" class="link-danger">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>


@endsection