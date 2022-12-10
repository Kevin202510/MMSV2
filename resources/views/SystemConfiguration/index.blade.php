@extends('layouts.app')

@section('title')
    MMS
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">System Setting</h3>
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
              Organize and adjust all settings about this site.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <div class="card card-large-icons">
                  <div class="card-icon bg-primary text-white">
                    <i class="fas fa-database"></i>
                  </div>
                  <div class="card-body">
                    <h4>Reset Database</h4>
                    <p>Refresh the Database tables except users table to make it newer</p>
                    <button type="button" id="resetDB" class="btn btn-primary"> <i class="fas fa-database"></i> Reset DB</button>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card card-large-icons">
                  <div class="card-icon bg-primary text-white">
                  <i class="fas fa-arrow-alt-square-down"></i>
                  </div>
                  <div class="card-body">
                    <h4>BackUp Database</h4>
                    <p>Search engine optimization settings, such as meta tags and social media.</p>
                    <button type="button" id="backUPDB" class="btn btn-primary"> <i class="fas fa-arrow-alt-square-down"></i> Reset DB</button>
                  </div>
                </div>
              </div>
          </div>
          <form action="{{ route('our_backup_database') }}" id="backupdb" method="get">
          </form>
    </section>
@include('SystemConfiguration/modal')
@endsection

@section('javascript')
<script type="module" src="{{ asset('js/systemconfiguration/index.js') }}"></script>
@endsection

