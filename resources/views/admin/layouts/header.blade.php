<!doctype html>
<html class="no-js"  lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>My medication</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        
        <link rel="stylesheet" href="{{asset('template/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/icon-kit/dist/css/iconkit.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="{{asset('template/plugins/ionicons/dist/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/jvectormap/jquery-jvectormap.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/weather-icons/css/weather-icons.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/c3/c3.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/owl.carousel/dist/assets/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/owl.carousel/dist/assets/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/dist/css/theme.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"  />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="{{asset('template/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <style>
            /* Ensure Select2 dropdown appears above modal */
            .select2-container {
                z-index: 1060 !important;
            }

            /* Match Bootstrap styling */
            .select2-container .select2-selection--single {
                height: 38px;
                padding: 6px 12px;
                font-size: 1rem;
                line-height: 1.5;
                border: 1px solid #ced4da;
                border-radius: 0.25rem;
            }
        </style>
    </head>
    
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <div class="header-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                                </div>
                            </div>
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="top-menu d-flex align-items-center">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav flex-row  align-items-center ms-auto">
                                    <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                                        <a class="nav-link dropdown-toggle hide-arrow text-white" href="javascript:void(0);" data-bs-toggle="dropdown">
                                            <i class="fas fa-globe fa-2x"></i>
                                        </a>
                                        <ul id="lang_url" class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item {{ app()->getLocale() === 'ar' ? 'active' : '' }}" 
                                                   href="javascript:void(0);" 
                                                   data-language="ar" 
                                                   data-text-direction="rtl"  
                                                   onclick="setLanguage('ar')">
                                                   <span class="align-middle">العربية</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}" 
                                                   href="javascript:void(0);" 
                                                   data-language="en" 
                                                   data-text-direction="ltr"  
                                                   onclick="setLanguage('en')">
                                                   <span class="align-middle">Anglais</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                
            
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                          <i class='bx bx-globe bx-sm'></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" 
                                                   href="javascript:void(0);" 
                                                   data-language="ar"
                                                   onclick="setLanguage('ar')">
                                                  <span class="align-middle">العربية</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" 
                                                   href="javascript:void(0);" 
                                                   data-language="en"
                                                   onclick="setLanguage('en')">
                                                  <span class="align-middle">Anglais</span>
                                                </a>
                                            </li>
                                        </ul>
                                      </li> 
                                      
                                    @if(auth()->check()&& auth()->user()->role->name === 'patient')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('my.booking') }}" style="color: #fff; font-size:16px; font-weight: bold;">{{ __('My Booking') }}</a>
                                        </li>
                                    @endif
                                    @if(auth()->check()&& auth()->user()->role->name === 'patient')
                                        <li class="nav-item">
                                            <a style="color: #fff; font-size:16px; font-weight: bold;" class="nav-link" href="{{ route('my.prescription') }}" style="color: #fff; font-size:16px; font-weight: bold;">{{ __('My Prescriptions') }}</a>
                                        </li>
                                    @endif
                                    <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item">
                                            <a style="color: #fff; font-size:16px; font-weight: bold;"  class="nav-link" href="{{ route('login') }}"> @lang('trans.login') </a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a style="color: #fff; font-size:16px; font-weight: bold;" class="nav-link" href="{{ route('register') }}" style="color: #fff; font-size:16px; font-weight: bold;"> @lang('trans.register')</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a style="color: #fff; font-size:16px; font-weight: bold;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                 @if(auth()->check()&& auth()->user()->role->name === 'patient')
                                                <a href="{{url('user-profile')}}"  class="dropdown-item"style="color: #000; font-size:16px; font-weight: bold;">Profile</a>
                                                @else 
                                                 <a href="{{url('dashboard')}}"  class="dropdown-item">Dashboard</a>
                                                @endif
                                                <a style="color: #000; font-size:16px; font-weight: bold;" class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                        <div class="top-menu d-flex align-items-center">
                            {{-- <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><!-- <i class="ik ik-bell"></i> --><span class="badge bg-danger"></span></a>
                                <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                                    <h4 class="header"> @lang('trans.notifications') </h4>
                                    <div class="notifications-wrap">
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-check"></i> 
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading"> @lang('trans.inventation_accept') </span> 
                                                <span class="media-content"> @lang('trans.you_accepted')  ...</span>
                                            </span>
                                        </a>
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <img src="{{asset('template/img/users/1.jpg')}}" class="rounded-circle" alt="">
                                            </span>
                                            <span class="media-body">
                                                <span class="media-content">I slowly updated projects</span>
                                            </span>
                                        </a>
                                        <a href="#" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-calendar"></i> 
                                            </span>
                                            <span class="media-body">
                                                <span class="heading-font-family media-heading">To Do</span> 
                                                <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                                </div>
                            </div> --}}
                            <button type="button" class="nav-link ml-10 right-sidebar-toggle"><!-- <i class="ik ik-message-square"></i> --><span class="badge bg-success"></span></button>
                           
                             
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <strong>{{strtoupper(Auth()->user()->name)}}</strong>

                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                  <i class="ik ik-power dropdown-icon"></i>      {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>
