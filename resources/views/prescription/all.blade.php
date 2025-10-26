@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
             
              <div class="card-header" >
       
                     Appointment ({{$patients->count()}})
                 </div>

                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">@lang('trans.photo')</th>
                          <th scope="col">@lang('trans.date')</th>
                          <th scope="col">@lang('trans.user')</th>
                          <th scope="col">@lang('trans.email')</th>
                          <th scope="col">@lang('trans.phone')</th>
                          <th scope="col">@lang('trans.gender')</th>

                          <th scope="col">@lang('trans.time')</th>
                          <th scope="col">@lang('trans.doctor')</th>
                          <th scope="col">@lang('trans.status')</th>
                          <th scope="col">@lang('trans.prescription')</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($patients as $key=>$patient)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/profile/{{$patient->user->image}}" width="80" style="border-radius: 50%;">
                          </td>
                          <td>
                                             
</td>
                          <td>{{$patient->user->name}}</td>
                          <td>{{$patient->user->email}}</td>
                          <td>{{$patient->user->phone_number}}</td>
                          <td>{{$patient->user->gender}}</td>
                          <td>{{$patient->time}}</td>
                          <td>{{$patient->doctor->name}}</td>
                          <td>
                            @if($patient->status==1)
                             checked
                             @endif
                          </td>
                          <td>
                              <!-- Button trigger modal -->
              
                   <a href="{{route('prescription.show',[$patient->user_id,$patient->date])}}" class="btn btn-secondary">@lang('trans.view') prescription</a>
                  

                               
                          </td>
                        </tr>
                        @empty
                        <td> @lang('trans.no_prescription') </td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
