<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"defer></script>

   <!--for datepicker-->
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"defer></script>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--for datepicker-->

        

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url("/template/img/background.png");
            background-size: cover;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .logo-container {
            width: 100%;
            text-align: center;
            margin-bottom: 1rem;
        }
        .logo {
            width: 48px;
            height: 48px;
        }
        .divider {
            margin: 1rem 0;
            border-top: 1px solid #dee2e6;
        }
        .login-title {
            font-weight: 600;
            font-size: 1.25rem;
            text-align: center;
        }
        .btn-signin {
            width: 100%;
            padding: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .dropdown-menu.dropdown-item{
            background-color: #3490dc !important;
        }
        .sidebar-rtl {
        /* Example styles */
        right: 0;
        left: auto;
        text-align: right;
    }

    .sidebar-ltr {
        /* Example styles */
        left: 0;
        right: auto;
        text-align: left;
    }

    </style>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('template/dist/css/theme.min.css')}}">
  


   <!--for datepicker-->
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <!--for datepicker-->

        
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a style="color: #fff;font-weight: bold;" class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

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
        </nav>

        <main class="py-4">

            @yield('content')
        </main>
    </div>
        

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" crossorigin="anonymous"></script>

<!-- Bootstrap Bundle JS (must be included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 <script>
    
    var dateToday = new Date();
  $( function() {
    $("#datepicker").datepicker({
        dateFormat:"yy-mm-dd",
        showButtonPanel:true,
        numberOfMonths:2,
        minDate:dateToday,
    });
});
function clearLocalStorageAndLogout() {
    //   localStorage.removeItem("templateCustomizer-vertical-menu-theme-semi-dark-light--Rtl");
    //   localStorage.removeItem("templateCustomizer-vertical-menu-theme-semi-dark-light--Lang");
      document.getElementById('logout-form').submit();
    }

  
    function setLanguage(lang) {
    // Save the selected language and direction in localStorage
    localStorage.setItem('language', lang);
    localStorage.setItem('direction', lang === 'ar' ? 'rtl' : 'ltr');
    
    // Send an AJAX request to the server to update the language
    fetch('/lang/' + lang)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // After successful response, reload the page to apply language change
                location.reload();
            }
        });
}


 // Check language from localStorage
 const language = localStorage.getItem('language');
const direction = localStorage.getItem('direction');
const headerTop = document.querySelector('.header-top'); // Select the header-top element
console.log(headerTop)
console.log(appDiv);

// Change the direction (RTL/LTR) based on the selected language
if (direction === 'rtl') {
    document.documentElement.setAttribute('dir', 'rtl');
    appDiv.setAttribute('dir', 'rtl');
    if (headerTop) {
        headerTop.setAttribute('dir', 'ltr');
        // Or alternatively add a CSS class for RTL styling
        headerTop.classList.add('rtl-direction');
    }
} else {
    document.documentElement.setAttribute('dir', 'ltr');
    appDiv.setAttribute('dir', 'ltr');
    if (headerTop) {
        headerTop.setAttribute('dir', 'rtl');
        headerTop.classList.remove('rtl-direction');
    }
}


</script>
<style type="text/css">
    body{
        background: #fff;
    }
    .ui-corner-all{
        background: red;
        color: #fff;
    }
    label.btn{
        padding: 0;
    }
    label.btn input{
        opacity: 0; 
        position: absolute;
    }
    label.btn span{
        text-align: center; 
        padding: 6px 12px; 
        display: block;
        min-width: 80px;
    }
    label.btn input:checked+span{
        background-color: rgb(80,110,228); 
        color: #fff;
    }
    .navbar{
        background:#6610f2!important;
        color: #fff!important;
    }
</style>
  
</body>
</html>
