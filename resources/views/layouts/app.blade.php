<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="author" content="Kevin Felix Caluag" />
    <meta name="description" content="Mushroom Monitoring System" />
    <title>@yield('title') | {{ Route::currentRouteName() }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link rel="icon" type="image/png" href="/img/favicons.ico">
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
@yield('page_css')
<!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">
    @yield('page_css')


    @yield('css')
</head>
<body>

    <div id="app">
    <input type="hidden" id="pfsImages" value="{{\Illuminate\Support\Facades\Auth::user()->profile}}">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                @include('layouts.header')
            </nav>
            <div class="main-sidebar main-sidebar-postion">
                @include('layouts.sidebar')
            </div>
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            <footer class="main-footer">
                @include('layouts.footer')
            </footer>
        </div>
    </div>

@include('profile.change_password')
@include('profile.edit_profile')

</body>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('js/modules/moment.min.js') }}"></script>
<script src="{{ asset('js/modules/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('assets/js/custom/passwordField.js') }}"></script>


<!-- Template JS File -->
<script src="{{ asset('web/js/stisla.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script src="{{ mix('assets/js/profile.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
<script type="module" src="{{ asset('js/dashboard/notification.js') }}"></script>
@yield('page_js')
@yield('scripts')
@yield('javascript')
<script>
    let loggedInUser =@json(\Illuminate\Support\Facades\Auth::user());
    let loginUrl = '{{ route('login') }}';
    // Loading button plugin (removed from BS4)
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));

    $(window).resize(function(){
        if ($(window).width() <= 771){ 
            
        }   
    });


    $(document).ready(function(){
            $("#btnPrEditSave").click(function(event){
              event.preventDefault();
              let pkey = $("#id").val();

              var datas = $("#pfImage")[0].files;

                var fd = new FormData();
                
                fd.append('pfImage',datas[0]);
                fd.append('id',$("#id").val());
                fd.append('role_id',$("#role_id").val());
                fd.append('isApproved',$("#isApproved").val());
                fd.append('fname',$("#fname").val());
                fd.append('lname',$("#lname").val());
                fd.append('address',$("#address").val());
                fd.append('contact',$("#contact").val());
                fd.append('username',$("#username").val());

            //   var tempSettForm = $("#temperatureSettingForm");
            //   $("#temperatureSettingForm").submit();
                console.log(fd);
              $.ajax({
                type: "POST",
                url: "api/users/"+pkey+"/updateProfile",
                data: fd, // serializes the form's elements.
                dataType: "JSON",
                contentType: false,
                cache:false,
                processData:false,
                success: function(data)
                {
                    swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your work has been saved",
                        showConfirmButton: false,
                        timer: 1500,
                        footer: "<a href>InnovaTech</a>",
                    });

                    location.reload();
                    $('#user_password').attr('type', 'password');
                    $('#showhidepass i').addClass( "fa-eye-slash" );
                    $('#showhidepass i').removeClass( "fa-eye" );
                    $('#EditProfileModal').modal('hide');
                }
            });
          })
    });
</script>
</html>
