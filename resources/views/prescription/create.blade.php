@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h2>@lang('trans.create') @lang('trans.prescription')</h2>
    
    <form method="POST" action="{{ route('prescription') }}">
        @csrf

        <!-- @lang('trans.patient') Information Section -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">@lang('trans.patient_information')</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">@lang('trans.select_patient')</label>
                        <input type="text" disabled class="form-control" name="patient" value="{{ $booking->user->name ?? '' }}">
                    </div>
                    <input type="hidden" name="patient_id" id="patient_id" value="{{ $booking->user->id ?? '' }}">
                    <input type="hidden" name="date" value="{{$booking->date ?? ''}}">
                    
                    <div class="col-md-4 text-center">
                        <label class="form-label">@lang('trans.health_insurance')</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="health_insurance">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label">@lang('trans.reference')</label>
                        <input type="text" class="form-control" name="reference">
                    </div>
                </div>
            </div>
        </div>

        <!-- Medicine Details Section -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">@lang('trans.medicine_details')</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="medicineTable">
                        <thead>
                            <tr>
                                <th>@lang('trans.medicine')</th>
                                <th>@lang('trans.dosage')</th>
                                <th>@lang('trans.duration')</th>
                                <th>@lang('trans.time')</th>
                                <th>@lang('trans.dose_interval')</th>
                                <th>@lang('trans.comment')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="medicine-row">
                                <td>
                                    <select class="form-select medicine-select" name="medicines[0][medicine_id]" required>
                                        <option value="">@lang('trans.select_medicine')</option>
                                        @foreach($medicines as $medicine)
                                            <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="medicines[0][dosage]" required></td>
                                <td>
                                    <select class="form-select" name="medicines[0][duration]" required>
                                        <option value="1 week">@lang('trans.1_week')</option>
                                        <option value="2 weeks">@lang('trans.2_weeks')</option>
                                        <option value="1 month">@lang('trans.1_month')</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" name="medicines[0][time]" required>
                                        <option value="morning">@lang('trans.morning')</option>
                                        <option value="afternoon">@lang('trans.afternoon')</option>
                                        <option value="evening">@lang('trans.evening')</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" name="medicines[0][interval]" required>
                                        <option value="daily">@lang('trans.daily')</option>
                                        <option value="weekly">@lang('trans.weekly')</option>
                                        <option value="monthly">@lang('trans.monthly')</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="medicines[0][comment]"></td>
                                <td><button type="button" class="btn btn-danger remove-row">×</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-secondary" id="addMedicine">@lang('trans.add_medicine')</button>
            </div>
        </div>

        <!-- Physical Information Section -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">@lang('trans.physical_information')</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="high_blood_pressure">
                            <label class="form-check-label">@lang('trans.high_blood_pressure')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="food_allergies">
                            <label class="form-check-label">@lang('trans.food_allergies')</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tendency_bleed">
                            <label class="form-check-label">@lang('trans.tendency_bleed')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="heart_disease">
                            <label class="form-check-label">@lang('trans.heart_disease')</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="diabetes">
                            <label class="form-check-label">@lang('trans.diabetic')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="pregnancy">
                            <label class="form-check-label">@lang('trans.female_pregnancy')</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="breast_feeding">
                            <label class="form-check-label">@lang('trans.breast_feeding')</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">@lang('trans.current_medication')</label>
                        <input type="text" class="form-control" name="current_medication">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">@lang('trans.surgery')</label>
                        <input type="text" class="form-control" name="surgery">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">@lang('trans.accident')</label>
                        <input type="text" class="form-control" name="accident">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label class="form-label">@lang('trans.pulse_rate')</label>
                        <input type="number" class="form-control" name="pulse_rate">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">@lang('trans.temperature')</label>
                        <input type="number" step="0.1" class="form-control" name="temperature">
                    </div>
                </div>
            </div>
        </div>

        <!-- Problem Description & Advice Section -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">@lang('trans.problem_description')</div>
                    <div class="card-body">
                        <textarea class="form-control" rows="4" name="problem_description"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">@lang('trans.advice')</div>
                    <div class="card-body">
                        <textarea class="form-control" rows="4" name="advice"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Next Visit Section -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">@lang('trans.next_visit')</div>
            <div class="card-body">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="next_visit">
                    <label class="form-check-label">@lang('trans.schedule_next_visit')</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">@lang('trans.submit')</button>
    </form>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add Medicine Row
    let rowCount = 1;
    document.getElementById('addMedicine').addEventListener('click', function() {
        const newRow = document.querySelector('.medicine-row').cloneNode(true);
        newRow.innerHTML = newRow.innerHTML.replace(/\[0\]/g, `[${rowCount}]`);
        document.querySelector('#medicineTable tbody').appendChild(newRow);
        rowCount++;
    });

    // Remove Medicine Row
    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });

    // Toggle Next Visit Fields
    document.getElementById('nextVisitCheck').addEventListener('change', function() {
        document.getElementById('nextVisitFields').style.display = this.checked ? 'block' : 'none';
    });
});
</script>

<style>
.card-header { font-weight: bold; }
.medicine-row td { vertical-align: middle; }
.remove-row { font-size: 1.5rem; line-height: 1; padding: 0 0.5rem; }
</style>
@endsection