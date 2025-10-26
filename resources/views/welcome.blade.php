@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid" style="border:1px solid #ccc;">
        </div>

        <div class="col-md-6">
            <h2> @lang('trans.home_title') </h2>
            <p>
                @lang('trans.home_description') 
            </p>
            <div class="mt-5">
               <a href="{{url('/register')}}"> <button class="btn btn-success">@lang('trans.register_as') @lang('trans.patient')</button></a>
                <a href="{{url('/login')}}"><button class="btn btn-secondary">@lang('trans.login')</button></a>
            </div>
        </div>
    </div>
    <hr>

  <!--date picker component-->
  <find-doctor></find-doctor>
</div>
@endsection
