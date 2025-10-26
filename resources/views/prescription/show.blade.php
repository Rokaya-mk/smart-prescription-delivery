@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="card prescription-card mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">@lang('trans.prescription')  @lang('trans.details') </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- @lang('trans.patient') Information Column -->
                <div class="col-md-6">
                    <div class="patient-info mb-4">
                        <h5 class="section-title">@lang('trans.patient_information')</h5>
                        <div class="row">
                            <div class="col-sm-4 fw-bold">@lang('trans.patient')  @lang('trans.name') </div>
                            <div class="col-sm-8"> {{ $prescription->user->name }} </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 fw-bold"> @lang('trans.address'):</div>
                            <div class="col-sm-8">{{ $prescription->user->address}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 fw-bold">@lang('trans.gender'):</div>
                            <div class="col-sm-8">{{ $prescription->user->gender }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 fw-bold"> @lang('trans.blood') :</div>
                            <div class="col-sm-8">{{ $prescription->user->blood }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 fw-bold">@lang('trans.prescription') @lang('trans.date'):</div>
                            <div class="col-sm-8">{{ $prescription->date }}</div>
                        </div>
                    </div>

                    
                </div>

                <div class="col-md-6">
                    <div class="medical-info mb-4">
                        <h5 class="section-title">@lang('trans.medical_info')</h5>
                        <div class="row">
                            <div class="col-sm-6 fw-bold">@lang('trans.doctor'):</div>
                            <div class="col-sm-6">@lang('trans.doctor')  {{ $prescription->doctor->name }} </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 fw-bold"> @lang('trans.problems') :</div>
                            <div class="col-sm-6">{{ $prescription->problem_description }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 fw-bold"> @lang('trans.food_allergies') :</div>
                            <div class="col-sm-6"> {{ ($prescription->food_allergies == 1) ? 'Yes' : 'No' }} </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 fw-bold"> @lang("trans.pulse_rate") :</div>
                            <div class="col-sm-6">{{ ($prescription->pulse_rate == 1) ? 'Yes' : 'No' }}  </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 fw-bold"> @lang('trans.temperature') :</div>
                            <div class="col-sm-6"> {{ $prescription->temperature }} </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 fw-bold"> @lang('trans.diabetic') :</div>
                            <div class="col-sm-6">{{ ($prescription->diabetes == 1) ? 'Yes' : 'No' }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 fw-bold"> @lang('trans.heart_disease') :</div>
                            <div class="col-sm-6">{{ ($prescription->heart_disease == 1) ? 'Yes' : 'No' }}</div>
                        </div>
                    </div>
                </div>

                <!-- @lang('trans.prescription') Column -->
                <div class="col-md-12">
                    <div class="prescription-info">
                        <h5 class="section-title">@lang('trans.prescription')</h5>
                        @if ($prescription->medicines)
                        <div class="table-responsive">
                            <table class="table table-bordered prescription-table">
                                <thead class="table-light">
                                    <tr>
                                        <th> @lang('trans.medicine_name') </th>
                                        <th>@lang('trans.dosage') </th>
                                        <th>@lang('trans.duration')</th>
                                        <th>@lang('trans.dose_interval')</th>
                                        <th>@lang('trans.comment')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prescription->medicines as $medicine)
                                    <tr>
                                        <td> {{ $medicine->name }} </td>
                                        <td> {{ $medicine->pivot->dosage ?? '' }} </td>
                                        <td> {{ $medicine->pivot->duration ?? '' }} </td>
                                        <td> {{ $medicine->pivot->interval ?? '' }} </td>
                                        <td> {{ $medicine->pivot->comment ?? '' }} </td>
                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        @endif
                        

                        <div class="advice-section mt-4">
                            <h5 class="section-title"> @lang('trans.advice') </h5>
                            <div class="advice-content p-3 bg-light rounded">
                               {{ $prescription->advice }}
                            </div>
                        </div>

                        {{-- <div class="test-section mt-4">
                            <h5 class="section-title">Test</h5>
                            <div class="test-content p-3 bg-light rounded">
                                {{ $prescription->advice }}
                            </div>
                        </div> --}}
                    </div>
                </div> 
            </div> 
        </div>
        <div class="card-footer text-end">
          @if($prescription->status =="new")
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sendReceiptModal">
                <i class="fas fa-check"></i>@lang('trans.send_to_pharmacy')
            </button>
        @else
        <span class="badge bg-warning p-2">{{ ucfirst($prescription->status) }}
        @endif
        </div>
    </div>
</div>
<!-- Confirmation Modal -->
<div class="modal fade" id="sendReceiptModal" tabindex="-1" aria-labelledby="sendReceiptModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="sendReceiptModalLabel"> @lang('trans.confirm_reciep') </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p> @lang('trans.confirm_sent') </p>
                
                <form id="sendReceiptForm" method="POST" action="{{ route('prescriptions.send-to-pharmacy', $prescription->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="pharmacy" class="form-label">Select @lang('trans.pharmacy')</label>
                        <select name="pharmacy" id="pharmacy" class="form-select" required>
                            <option value="">-- Select @lang('trans.pharmacy') --</option>
                            @foreach ($pharmacies as $pharmacy)
                                <option value="{{ $pharmacy->id }}">{{ $pharmacy->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('trans.cancel')</button>
                <button type="submit" class="btn btn-success" form="sendReceiptForm">@lang('trans.send_to_pharmacy')</button>
            </div>
        </div>
    </div>
</div>
<style>
    .prescription-card {
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
    }
    
    .section-title {
        color: #0d6efd;
        border-bottom: 2px solid #0d6efd;
        padding-bottom: 0.5rem;
        margin-bottom: 1rem;
    }
    
    .prescription-table th {
        background-color: #f8f9fa;
    }
    
    .row {
        margin-bottom: 0.5rem;
    }
    
    .card-footer {
        background-color: #f8f9fa;
    }
</style>
@endsection