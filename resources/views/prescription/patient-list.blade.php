@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <h2>@lang('trans.patient') @lang('trans.list')</h2>
          {{-- <a href="{{ route('patients.add') }}" class="btn btn-primary mb-3">Add @lang('trans.patient')</a> --}}

            <div class="card"> 
             
              <div class="card-header" >
                        </div>

                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr class="border-">
                          <th scope="col">@lang('trans.patient')</th>
                          <th scope="col">@lang('trans.phone')</th>
                          <th scope="col">@lang('trans.blood_group') </th>
                          <th scope="col">@lang('trans.status')</th>
                          <th scope="col">@lang('trans.action')</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($patients as $key=>$patient)
                        <tr>
                          <td>
                            <div class="row">
                              <div class="col-md-3">
                                <img src=" {{ $patient->image ? '/profile/'.$patient->image : asset('/profile/1600769363.png') }} " width="60" style="border-radius: 50%;">

                              </div>
                              <div class="col-md-7">
                                <span class="text-info"> {{ $patient->name }} </span> <br>
                                <span class="text-muted"> {{ $patient->email }} </span>
                              </div>
                            </div>
                          </td>
                          <td>{{$patient->phone_number}}</td>
                          <td>
                            @if($patient->blood)
                              <span class="badge bg-label-success"> {{$patient->blood }} </span>
                            @else  
                            N/A
                            @endif
                            {{$patient->blood}}

                          </td>
                          <td>
                           
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"  @checked($patient->status)>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex justify-content-start">

                              <a class="mr-3" href="javascript:void(0);"><i class=" text-primary fa fa-pen"></i> </a>
                              <a class="" href="javascript:void(0);"><i class="text-danger fa fa-trash"></i> </a>
                            </div>
                          </td>
                          
                        </tr>
                        @empty
                        <td> @lang('trans.no_appointments')  !</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
