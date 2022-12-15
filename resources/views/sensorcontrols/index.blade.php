@extends('layouts.app')

@section('title')
    MMS
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Sensor Controls</h3>
            <div class="section-header-breadcrumb">
            <nav aria-label="breadcrumb">
              @include('layouts.breadcrum')
            </nav>
            <!-- <button type="button" class="btn btn-primary" id="generateReport" >Generate Report <i class="far fa-file-invoice"></i></button> -->
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Overview</h2>
            <p class="section-lead">
              Manually Using of Devices.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <div class="card card-large-icons">
                  <div class="card-icon bg-primary text-white">
                    <i class="fas fa-database"></i>
                  </div>
                  <div class="card-body">
                    <h4>Sprinkler</h4>
                    <p>Turn off/on Sprinkler Device</p>
                    <button type="button" id="sprinklerstate1" class="btn btn-success text-dark">ON</button>
                    <button type="button" id="sprinklerstate2" class="btn btn-danger text-dark">OFF</button>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card card-large-icons">
                  <div class="card-icon bg-primary text-white">
                  <i class="fas fa-arrow-alt-square-down"></i>
                  </div>
                  <div class="card-body">
                    <h4>Lights</h4>
                    <p>Turn off/on Lights Device</p>
                    <button type="button" id="lightsstate1" class="btn btn-success text-dark">ON</button>
                    <button type="button" id="lightsstate2" class="btn btn-danger text-dark">OFF</button>
                  </div>
                </div>
              </div>
          </div>
    </section>
@endsection

@section('javascript')
<script type="module" src="{{ asset('js/sensorcontrols/index.js') }}"></script>
@endsection

