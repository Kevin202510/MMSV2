@extends('layouts.authapp')

@section('title')
    MMS
@endsection

@section('page_css')
    <style>
        
    </style>
@endsection


@section('content')

<!-- About Start -->
<div class="container-xxl py-5" style="margin-top:50px;background-color: #e0ac69;">
    <div class="container" > 
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" style="border-radius:20px" src="{{ asset('landingpageassets/img/oyster3.jpg') }}">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="card" style=" border-radius: 50px; background-image: linear-gradient(to right, #8d5524 , #c68642);">
                    <div class="card-header text-center">
                        <h3 style="color:white;">Login</h3>
                    </div>
                    <div class="card-body" style="background-image: linear-gradient(to right, #8d5524 , #c68642)">
                        <form method="POST" style="margin-top: 20px;" action="{{ route('login') }}">
                            @csrf
                            @if (session()->has('error'))
                                    <input type="hidden" id="errorMessage" value="{{ session()->get('error') }}">
                            @endif
                            <div class="form-group">
                                <label for="username" style="color: white; font-size:15px; font-weight: bold;">Username</label>
                                <input style="margin-top: 20px;font-size:15px; height:50px; border-radius:10px;" aria-describedby="emailHelpBlock" id="username" type="text"
                                    class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                                    placeholder="Enter Username" tabindex="1"
                                    value="{{ (Cookie::get('username') !== null) ? Cookie::get('username') : old('username') }}" autofocus
                                    required>
                                <div class="invalid-feedbacks">
                                    {{ $errors->first('username') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label" style="margin-top: 20px;color: white; font-size:15px; font-weight: bold;">Password</label>
                                </div>
                                <input style="margin-top: 20px; font-size:15px; border-radius:10px; height:50px;" aria-describedby="passwordHelpBlock" id="password" type="password"
                                    value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                                    placeholder="Enter Password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                                    tabindex="2" required>
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            </div>

                            <div class="form-group justify-content-center">
                                <center style="margin-top:10px;">
                                    <button type="submit" class="btn btn-xl btn-block" style="border-radius:10px;background-color: #c37e4c; color: white; font-size: 15px;" tabindex="4">
                                        Login
                                    </button>
                                </center>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer" >
                       <span style="color:#8d5726;">MMS</span> 
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
