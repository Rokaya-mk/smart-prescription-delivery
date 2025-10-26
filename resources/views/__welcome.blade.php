@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid" style="border:1px solid #ccc;">
        </div>
        <div class="col-md-6">
            <h2>@lang('trans.home_title')</h2>
            <p> @lang('trans.home_description')
            </p>
            <div class="mt-5">
               <a href="{{url('/register')}}"> <button class="btn btn-success"> @lang('trans.register_as')  @lang('trans.patient')</button></a>
                <a href="{{url('/login')}}"><button class="btn btn-secondary">@lang('trans.login') </button></a>
            </div>
        </div>
    </div>
    <hr>
<!--Search doctor-->
<form action="{{url('/')}}" method="GET">
    <div class="card">
        <div class="card-body">
            <div class="card-header"> @lang('trans.find_doc') </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="date" class="form-control" id="datepicker">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit">@lang('trans.find_doc')</button>

                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
</form>

    <!--display doctors-->
    <div class="card">
        <div class="card-body">
            <div class="card-header"> @lang('trans.doctors') </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('trans.photo')</th>
                            <th>@lang('trans.name')</th>
                            <th>@lang('trans.expertise') </th>
                            <th> @lang('trans.book') </th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse($doctors as $doctor)
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <img src="{{asset('images')}}/{{$doctor->doctor->image}}" width="100px" style="border-radius: 50%;">
                            </td>
                            <td>
                                {{$doctor->doctor->name}}
                            </td>
                            <td>
                                {{$doctor->doctor->department}}
                            </td>
                            <td>
                                <a href="{{route('create.appointment',[$doctor->user_id,$doctor->date])}}"><button class="btn btn-success">Book Appointment</button></a>
                            </td>
                        </tr>
                        @empty
                        <td> @lang('trans.no_doctor_availble')  @lang('trans.today')</td>
                        @endforelse


                    </tbody>
                </table>
                
            </div>
        </div>
        
    </div>
</div>
@endsection
