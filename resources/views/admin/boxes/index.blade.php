@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>@lang('trans.delivery_boxes_management')</h2>
    <a href="{{ route('boxes.create') }}" class="btn btn-primary mb-3">@lang('trans.add_new_box')</a>
    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>@lang('trans.location')</th>
                        <th>@lang('trans.address')</th>
                        <th>@lang('trans.city')</th>
                        <th>@lang('trans.status')</th>
                        <th>@lang('trans.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boxes as $box)
                    <tr>
                        <td>{{ $box->location_name }}</td>
                        <td>{{ $box->address }}</td>
                        <td>{{ $box->city }}</td>
                        <td>
                            <span class="badge bg-{{ $box->status == 'available' ? 'success' : ($box->status == 'in_use' ? 'warning' : 'danger') }}">
                                @if($box->status == 'available')
                                    @lang('trans.available_badge')
                                @elseif($box->status == 'in_use')
                                    @lang('trans.in_use_badge')
                                @else
                                    @lang('trans.under_maintenance_badge')
                                @endif
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('boxes.edit', $box->id) }}" class="btn btn-sm btn-primary">@lang('trans.edit')</a>
                            <form action="{{ route('boxes.destroy', $box->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('@lang('trans.confirm_delete')')">@lang('trans.delete')</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $boxes->links() }}
        </div>
    </div>
</div>
@endsection