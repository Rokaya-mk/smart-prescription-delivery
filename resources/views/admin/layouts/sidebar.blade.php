<div class="page-wrap" >
                <div class="app-sidebar colored">
                    <div class="sidebar-header" id="sidebar">
                        <a class="header-brand" href="{{url('/dashboard')}}">
                            <div class="logo-img">
                              
                            </div>
                            <span class="text"> @lang('trans.hospital') </span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel"> @lang('trans.navigation') </div>
                                <div class="nav-item active">
                                    <a href="{{url('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span> @lang('trans.dashboard') </span></a>
                                </div>
                              <!--   <div class="nav-item">
                                    <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                                </div> -->

                                @if(auth()->check()&& auth()->user()->role->name === 'admin')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>@lang('trans.department')</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('department.create')}}" class="menu-item">@lang('trans.create')</a>
                                        <a href="{{route('department.index')}}" class="menu-item">@lang('trans.view')</a>
                                       
                                    </div>
                                </div>
                                @endif
                                @if(auth()->check()&& auth()->user()->role->name === 'admin')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="fa-solid fa-prescription-bottle-medical"></i><span> @lang('trans.pharmacy') </span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('pharmacy.create')}}" class="menu-item">@lang('trans.create')</a>
                                        <a href="{{route('pharmacy.index')}}" class="menu-item">@lang('trans.view')</a>
                                       
                                    </div>
                                </div>
                                @endif
                                @if(auth()->check()&& auth()->user()->role->name === 'admin')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="fa-solid fa-box-open"></i><span> @lang('trans.delivery_boxes') </span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('boxes.create')}}" class="menu-item">@lang('trans.create')</a>
                                        <a href="{{route('boxes.index')}}" class="menu-item">@lang('trans.view')</a>
                                       
                                    </div>
                                </div>
                                @endif
                                  @if(auth()->check()&& auth()->user()->role->name === 'admin')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>@lang('trans.doctor')</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('doctor.create')}}" class="menu-item">@lang('trans.create')</a>
                                        <a href="{{route('doctor.index')}}" class="menu-item">@lang('trans.view')</a>
                                       
                                    </div>
                                </div>
                                @endif
                                  @if(auth()->check()&& auth()->user()->role->name === 'doctor')
                                   <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span> @lang('trans.appointment_time') </span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('appointment.create')}}" class="menu-item">@lang('trans.create')</a>
                                        <a href="{{route('appointment.index')}}" class="menu-item">@lang('trans.check')</a>
                                       
                                    </div>
                                </div>
                                @endif
                                @if(auth()->check()&& auth()->user()->role->name === 'pharmacy')
                                <div class="nav-item has-sub">
                                  <a href="javascript:void(0)"><i class="ik ik-layers"></i><span> @lang('trans.medicines') </span> <span class="badge badge-danger"></span></a>
                                  <div class="submenu-content">
                                      <a href="{{route('medicines.create')}}" class="menu-item">@lang('trans.create')</a>
                                      <a href="{{route('medicines.index')}}" class="menu-item"> @lang('trans.medicines_liste') </a>
                                     
                                  </div>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="fa-solid fa-box-open"></i><span> @lang('trans.delivery_boxes') </span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('boxes.create')}}" class="menu-item">@lang('trans.create')</a>
                                        <a href="{{route('boxes.index')}}" class="menu-item">@lang('trans.view')</a>
                                       
                                    </div>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="fa-solid fa-capsules"></i><span>@lang('trans.prescriptions')</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        {{-- <a href="{{route('prescription.process.create')}}" class="menu-item">@lang('trans.create')</a> --}}
                                        <a href="{{route('prescription.process.index')}}" class="menu-item">@lang('trans.pending_prescriptions')</a>
                                        <a href="{{route('prescription.deliveryPrescription')}}" class="menu-item">@lang('trans.delivred_prescriptions')</a>
                                        <a href="{{route('prescription.recievedPrescription')}}" class="menu-item">@lang('trans.recieved_prescriptions')</a>
                                       
                                    </div>
                                </div>
                              @endif

                                @if(auth()->check()&& auth()->user()->role->name === 'doctor')
                                   <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>@lang('trans.patients')</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('patients.today')}}" class="menu-item">@lang('trans.patients')(@lang('trans.today'))</a>
                                        <a href="{{route('prescribed.patients')}}" class="menu-item">@lang('trans.all_paitent_prescription')</a>
                                        <a href="{{route('patients.list')}}" class="menu-item">@lang('trans.patients') @lang('trans.list')</a>
                                       
                                    </div>
                                </div>
                                @endif

                               


                                  @if(auth()->check()&& auth()->user()->role->name === 'admin')
                                 <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>@lang('trans.patient_appointment')</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('patient')}}" class="menu-item">@lang('trans.today_appointment')</a>
                                        <a href="{{route('all.appointments')}}" class="menu-item">@lang('trans.all_time_appointment')</a>
                                       
                                    </div>
                                </div>
                                
                                @endif

                                <div class="nav-item active">
                                    <a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="ik ik-power dropdown-icon"></i><span> @lang('trans.logout') </span></a>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                           
                                
                            </nav>
                        </div>
                    </div>
                </div>