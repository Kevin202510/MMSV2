@extends('layouts.welcome')

@section('title')
    MMS
@endsection


@section('content')

<!-- About Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="{{ asset('landingpageassets/img/mushroomkoto.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="card">
                <div class="card-header text-center">
                    <h3>Register</h3>
                </div>
                <div class="card-body">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="role_id" id="role_id" value="2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label><span
                                    class="text-danger">*</span>
                            <input id="fname" type="text"
                                   class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                   name="fname"
                                   tabindex="1" placeholder="Enter First Name" value="{{ old('fname') }}"
                                   autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('fname') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Last Name</label><span
                                    class="text-danger">*</span>
                            <input id="lname" type="text"
                                   class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}"
                                   placeholder="Enter Last Name" name="lname" tabindex="1"
                                   value="{{ old('lname') }}"
                                   required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('lname') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label><span
                                    class="text-danger">*</span>
                            <input id="address" type="text"
                                   class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                   name="address"
                                   tabindex="1" placeholder="Enter Address" value="{{ old('address') }}"
                                   autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact">Contact</label><span
                                    class="text-danger">*</span>
                            <input id="contact" type="number"
                                   class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}"
                                   placeholder="Enter Contact Number" name="contact" tabindex="1"
                                   value="{{ old('contact') }}"
                                   required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('contact') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username">Username</label><span
                                    class="text-danger">*</span>
                            <input id="username" type="text"
                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                   placeholder="Enter Username only accept letters and digits" name="username" tabindex="1"
                                   value="{{ old('username') }}"
                                   required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('username') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label><span
                                    class="text-danger">*</span>
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}"
                                   placeholder="Set account password" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation"
                                   class="control-label">Confirm Password</label><span
                                    class="text-danger">*</span>
                            <input id="password_confirmation" type="password" placeholder="Confirm password"
                                   class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}"
                                   name="password_confirmation" tabindex="2">
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-block" style="background-color: rgb(116 177 151); color: white; font-size: 15px;" tabindex="4">
                            Register
                        </button>
                        </div>
                    </div>
                </div>
            </form>
                <a href="{{ route('login') }}" class="btn btn-lg btn-block" type="button">Login</a>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

@endsection
