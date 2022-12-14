@extends('layouts.app')

@section('title')
    MMS
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Users</h3>
            <div class="section-header-breadcrumb">
            <nav aria-label="breadcrumb">
              @include('layouts.breadcrum')
            </nav>
            <!-- <button type="button" class="btn btn-primary" id="generateReport" >Generate Report <i class="far fa-file-invoice"></i></button> -->
            </div>
        </div>
        <div class="section-body">
          <div class="row">
              <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">List of Active Users</button>
                  </li>
                  <li class="nav-item" id="test" role="presentation">
                    <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Deleted Users</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div class="card">
                        <div class="card-header">
                          <h4>List of Users</h4>
                          <div class="card-header-form">
                          <div class="text-right" style="margin-bottom:15px;">
                                <a href="{{ route('ExportUser') }}" class="btn btn-primary"><i class="fas fa-download"></i></a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadUsersDataModal"><i class="fas fa-upload"></i></button>
                                <a href="javascript:void(0)" class="btn btn-success my-2 my-sm-0" id="btn-new"><span class="fa fa-plus"></span></a>
                            </div>
                          <form>
                              <div class="input-group">
                                <input type="text" class="form-control" id="searchData" placeholder="Search by Fullname">
                                <div class="input-group-btn">
                                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="card-body p-0">
                          <div class="table-responsive">
                            <table class="table table-striped">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Role</th>
                                          <th>Fullname</th>
                                          <th>Address</th>
                                          <th>Status</th>
                                          <th>Email</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody id="table-main"></tbody>
                              </table>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="card">
                        <div class="card-header">
                          <h4>List of Users</h4>
                          <div class="card-header-form">
                            <input type="hidden" id="btn-new">
                          <form>
                              <div class="input-group">
                                <input type="text" class="form-control" id="searchData" placeholder="Search by Fullname">
                                <div class="input-group-btn">
                                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="card-body p-0">
                          <div class="table-responsive">
                            <table class="table table-striped">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Role</th>
                                          <th>Fullname</th>
                                          <th>Address</th>
                                          <th>Status</th>
                                          <th>Email</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody id="table-mains"></tbody>
                              </table>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
@include('users/modal')
@include('users/uploadUsersData')
@endsection

@section('javascript')
<script type="module" src="{{ asset('js/users/index.js') }}"></script>
<script type="module" src="{{ asset('js/users/index1.js') }}"></script>
<script type="module" src="{{ asset('js/users/pending.js') }}"></script>
@endsection

