<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | {{ config('app.slogan') }}</title>
    <meta property="og:title" content="{{ config('app.name') }} | {{ config('app.slogan') }}"/>
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}"/>
    <meta property="og:description" content="A platform to connect students/parents with their right tutor.
Brief message-25000+ Expert male/female tutors from Bangla Medium, English Medium,IELTS, GMAT, SAT, Medical/University Admission test, Project/Assignment are available. Locate your Home tutor in districts of Bangladesh." />
    <link rel="icon" href="{{ asset('assets/images/favicon16.png') }}">
    <meta name="google-site-verification" content="cqC7jASDD6ePj60BddTtffY2XB4wLCObIFKDCV8aEns">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('assets/uikit/css/uikit.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/datepicker/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/timepicker/bootstrap-timepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/croppie/css/croppie.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- toaster css link -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <script type="text/javascript" src="{{ asset('assets/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
    <!-- UIkit JS -->
    <script src="{{ asset('assets/uikit/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/uikit/js/uikit-icons.min.js') }}"></script>
    <script src="{{ asset('assets/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/axios/axios.min.js') }}"></script>
    <script src="{{ asset('assets/croppie/js/croppie.js') }}"></script>
    <script src="{{ asset('assets/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>
<header class="uk-navbar-container uk-background-primary uk-navbar-transparent" uk-navbar uk-navbar="mode: click">
    <div class="uk-navbar-left">
    	<a href="{{ route('dashboard') }}" class="uk-navbar-item uk-logo">
            <img src="{{ asset('assets/images/tutor-provide.png') }}" width="200px" alt="{{ config('app.name') }}">
        </a>
        <a class="uk-navbar-toggle" href="#offcanvas-slide" uk-toggle>
            <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
        </a>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav cs-notifications-area">
            @if(!empty($top_percentage))
            <li>
                <a href="{{ route('tutor.profile.edit') }}">
                    <strong class="top_percentage {{ $color }}">Profile Complete : {{ $top_percentage }}%</strong>
                </a>
            </li>
            @endif
        	<li>
                <form action="{{ route('logout') }}" method="POST" class="uk-padding-small logout-form">
                    @csrf
                    <button type="submit" class="uk-button uk-button-danger"><strong class="uk-margin-small-right" uk-icon="icon: sign-out"></strong> <span>{{ __('Logout') }}</span></button>
                </form>
            </li>
        </ul>
    </div>
</header>

<nav class="sidebar-nav uk-background-primary" id="offcanvas-slide" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
    	<div class="uk-grid-small uk-flex-middle uk-padding-small" uk-grid>
            <div class="uk-width-auto">
                <img class="uk-border-circle" width="40" height="40" src="{{ (!empty($profile_photo)) ? asset('storage/upload/'.$profile_photo.'') : asset('storage/upload/default-profile.png') }}">
            </div>
            <div class="uk-width-expand">
                <p class="uk-text-light uk-margin-remove-bottom uk-text-bold">{{ auth()->user()->name }}</p>
                <p class="uk-text-light uk-margin-remove-top uk-text-capitalize uk-text-bold">{{ auth()->user()->role }} ID {{ auth()->user()->id }}</p>
            </div>
        </div>
        @php
        $segment_one = request()->segment(1);
        $segment_two = request()->segment(2);
        @endphp
        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
            @if(auth()->user()->role == 'administrator')
            <li class="{{ ($segment_one == 'dashboard') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('dashboard') }}"><span class="uk-margin-small-right" uk-icon="icon: grid"></span> Dashboard</a>
            </li>
            <li class="{{ ($segment_one == 'categories') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('categories.index') }}"><span class="uk-margin-small-right" uk-icon="icon: nut"></span> Categories</a>
            </li>
            <li class="{{ ($segment_one == 'courses') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('courses.index') }}"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Courses</a>
            </li>
            <li class="{{ ($segment_one == 'subjects') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('subjects.index') }}"><span class="uk-margin-small-right" uk-icon="icon: bookmark"></span> Subjects</a>
            </li>
            <li class="{{ ($segment_one == 'cities') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('cities.index') }}"><span class="uk-margin-small-right" uk-icon="icon: world"></span> Cities</a>
            </li>
            <li class="{{ ($segment_one == 'locations') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('locations.index') }}"><span class="uk-margin-small-right" uk-icon="icon: location"></span> Locations</a>
            </li>

            <li class="{{ ($segment_one == 'notice') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('notice.index') }}"><span class="uk-margin-small-right" uk-icon="icon: bell"></span>Notice</a>
            </li>
            @endif

            @if(auth()->user()->role == 'admin')
            <li class="{{ ($segment_one == 'dashboard') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('dashboard') }}"><span class="uk-margin-small-right" uk-icon="icon: grid"></span> Dashboard</a>
            </li>
            <li class="{{ ($segment_one == 'tutors') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('tutors.index') }}"><span class="uk-margin-small-right" uk-icon="icon: users"></span> Tutor's</a>
            </li>
            <li class="uk-parent {{ ($segment_one == 'jobs') ? 'uk-active uk-open' : '' }}">
                <a class="uk-text-bold" href="#"><span class="uk-margin-small-right" uk-icon="icon: album"></span> Tuition Jobs</a>
                <ul class="uk-nav-sub">
                    <li class="{{ ($segment_two == 'reviewing') ? 'uk-active' : '' }}"><a href="{{ route('jobs.index.reviewing') }}">Reviewing Tuition Jobs</a></li>
                    <li class="{{ ($segment_two == 'published') ? 'uk-active' : '' }}"><a href="{{ route('jobs.index.published') }}">Published Tuition Jobs</a></li>
                    <li class="{{ ($segment_two == 'completed') ? 'uk-active' : '' }}"><a href="{{ route('jobs.index.completed') }}">Completed Tuition Jobs</a></li>
                </ul>
            </li>
            <li class="{{ ($segment_one == 'hot') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('jobs.hot_jobs') }}"><span class="uk-margin-small-right" uk-icon="icon: heart"></span> Hot Jobs</a>
            </li>

            <li class="{{ ($segment_one == 'notice') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('notice.index') }}"><span class="uk-margin-small-right" uk-icon="icon: bell"></span>Notice</a>
            </li>
            @endif

            @if(auth()->user()->role == 'tutor')
            <li class="{{ ($segment_one == 'dashboard') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('dashboard') }}"><span class="uk-margin-small-right" uk-icon="icon: grid"></span> Available Tuitions</a>
            </li>
            <li class="{{ (request()->is('tutor/profile/edit')) ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('tutor.profile.edit') }}"><span class="uk-margin-small-right" uk-icon="icon: cog"></span> Edit Profile</a>
            </li>
            <li class="{{ (request()->is('tutor/profile')) ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('tutor.profile.show') }}"><span class="uk-margin-small-right" uk-icon="icon: user"></span> Profile</a>
            </li>
            <li class="{{ (request()->is('settings/payment')) ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('settings.payment') }}"><span class="uk-margin-small-right" uk-icon="icon: credit-card"></span> Payment</a>
            </li>
            <li class="{{ (request()->is('tutor/status')) ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('tutor.status') }}"><span class="uk-margin-small-right" uk-icon="icon: heart"></span> My Status</a>
            </li>
            @endif

            @if(auth()->user()->role == 'guardian')
            <li class="{{ ($segment_one == 'dashboard') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('dashboard') }}"><span class="uk-margin-small-right" uk-icon="icon: grid"></span> Dashboard</a>
            </li>
            <li class="{{ ($segment_one == 'jobs') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('jobs.index') }}"><span class="uk-margin-small-right" uk-icon="icon: album"></span> Tuition Jobs</a>
            </li>
            <li class="{{ (request()->is('guardian/profile')) ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('guardian.profile.show') }}"><span class="uk-margin-small-right" uk-icon="icon: user"></span> Profile</a>
            </li>
            @endif

            <li class="{{ ($segment_one == 'password') ? 'uk-active' : '' }}">
                <a class="uk-text-bold" href="{{ route('password.change') }}"><span class="uk-margin-small-right" uk-icon="icon: settings"></span> Settings</a>
            </li>
            @if(auth()->user()->role == 'tutor')
            <li class="uk-parent {{ (request()->is('tutor/profile/edit')) ? 'uk-active uk-open' : '' }} customize">
                <a class="uk-text-bold" href="javaScript:;"><strong>Complete Your Profile</strong></a>
                <ul class="uk-nav-sub">
                    <li class=""><a href="{{ route('tutor.profile.edit') }}"><span class="uk-margin-small-right" uk-icon="icon: bookmark"></span> <strong>Tuition Related Information</strong></a></li>
                    <li class=""><a href="{{ route('tutor.profile.edit') }}"><span class="uk-margin-small-right" uk-icon="icon: pencil"></span> <strong>Educational Information</strong></a></li>
                    <li class=""><a href="{{ route('tutor.profile.edit') }}"><span class="uk-margin-small-right" uk-icon="icon: info"></span> <strong>Personal Information</strong></a></li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</nav>
<section class="uk-section uk-section-default">
    @yield('content')
</section>
@if (session()->has('message'))
    @component('component.alert')
        @if (session()->has('message.success'))
            <strong>Thank You!</strong>!
        @endif
        @if (session()->has('message.error'))
            <strong>Failed!</strong>!
        @endif
    @endcomponent
@endif

<!-- toaster js link -->
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

<script>
  @if ($errors->any())
  @foreach ($errors->all() as  $error)
  toastr.error('{{ $error }}', 'Error',{
    closeButton:true,
    progressBar:true,
  });

  @endforeach
  @else
  @endif
</script>

  @stack('js')
</body>
</html>
