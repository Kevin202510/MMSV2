@extends('layouts.welcome')

@section('title')
    MMS
@endsection


@section('content')

<!-- About Start -->
<div class="container-xxl py-5" style="margin-top:50px;">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="{{ asset('landingpageassets/img/oyster3.jpg') }}">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @if (session()->has('error'))
                                    <input type="hidden" id="errorMessage" value="{{ session()->get('error') }}">
                            @endif
                            <div class="form-group">
                                <label for="username" style="color: black; font-size:15px; font-weight: bold;">Username</label>
                                <input aria-describedby="emailHelpBlock" id="username" type="text"
                                    class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                                    placeholder="Enter Username" tabindex="1"
                                    value="{{ (Cookie::get('username') !== null) ? Cookie::get('username') : old('username') }}" autofocus
                                    required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('username') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label" style="color: black; font-size:15px; font-weight: bold;">Password</label>
                                </div>
                                <input aria-describedby="passwordHelpBlock" id="password" type="password"
                                    value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                                    placeholder="Enter Password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                                    tabindex="2" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-block" style="background-color: rgb(116 177 151); color: white; font-size: 15px;" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- About End -->

@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        if(!($("#errorMessage").val()===undefined)){
            swal.fire({
                icon: "error",
                title: "Invalid Credentials",
                showConfirmButton: false,
                timer: 3000,
                text: "Maybe Your Account is not Approved or has been deleted try to contact your administrator"
            });
        }
    });
</script>
@endsection
