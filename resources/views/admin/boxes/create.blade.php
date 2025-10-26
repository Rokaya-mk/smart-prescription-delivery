@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>@lang('trans.add_new_delivery_box')</h2>
    <form method="POST" action="{{ route('boxes.store') }}">
        @csrf
        
        <div class="mb-3">
            <label>@lang('trans.location_name')</label>
            <input type="text" name="location_name" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>@lang('trans.address')</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>@lang('trans.city')</label>
                <input type="text" name="city" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>@lang('trans.postal_code')</label>
                <input type="text" name="postal_code" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>@lang('trans.gps_coordinates')</label>
                <input type="text" name="gps_coordinates" class="form-control" placeholder="@lang('trans.gps_placeholder')">
            </div>
        </div>
        
        <div class="mb-3 col-6">
            <label>@lang('trans.status')</label>
            <select name="status" class="form-select" required>
                <option value="available">@lang('trans.available')</option>
                <option value="in_use">@lang('trans.in_use')</option>
                <option value="under_maintenance">@lang('trans.under_maintenance')</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">@lang('trans.create_box')</button>
    </form>
</div>
@endsection