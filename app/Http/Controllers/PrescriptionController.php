<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Box;
use App\Medicine;
use App\Pharmacy;
use App\Prescription;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PrescriptionController extends Controller
{
    public function index()
    {

    	// // date_default_timezone_set('Australia/Melbourne');
    
		$bookings =  Booking::where('date',date('Y-m-d'))->where('status',1)->where('doctor_id',auth()->user()->id)->get();
		return view('prescription.index',compact('bookings'));
    }

    // liste 
    public function getListe(){
        // date_default_timezone_set('Australia/Melbourne');
    	$bookings = Booking::where('doctor_id',auth()->user()->id)->pluck('user_id');
        $patients = User::whereIn('id',$bookings)->where('role_id',3)->get();
    	return view('prescription.patient-list',compact('patients'));
    }
   

    // public function store(Request $request)
    // {
    // 	$data  = $request->all();
    // 	$data['medicine'] = implode(',',$request->medicine);
    // 	Prescription::create($data);
    // 	return redirect()->back()->with('message','Prescription created');
    // }
    public function store(Request $request)
    {
        logger('Starting prescription store with data:', $request->all());
        
        $data = $request->all();
        $data['health_insurance'] = $request->has('health_insurance'); // Better boolean handling
    
        try {
            $validator = Validator::make($data, [
                'patient_id' => 'required|exists:users,id',
                'date' => 'required',
                'health_insurance' => 'nullable|boolean',
                'reference' => 'nullable|string|max:255',
                'medicines' => 'required|array|min:1',
                'medicines.*.medicine_id' => 'required|exists:medicines,id',
                'medicines.*.dosage' => 'required|string|max:255',
                'medicines.*.duration' => 'required|string|max:255',
                'medicines.*.time' => 'required|string|max:255',
                'medicines.*.interval' => 'required|string|max:255',
                'problem_description' => 'nullable|string',
                'advice' => 'nullable|string',
                'next_visit_date' => 'nullable|date',
                'next_visit_time' => 'nullable|date_format:H:i',
            ]);
    
            if ($validator->fails()) {
                logger('Validation failed:', $validator->errors()->toArray());
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            $validated = $validator->validated();
            logger('Validation passed with data:', $validated);
            
        } catch (\Exception $e) {
            logger('Validation exception:', ['error' => $e->getMessage()]);
            return back()->with('error', 'Validation error: ' . $e->getMessage());
        }
        
        try {
            DB::beginTransaction();
            logger('Database transaction started');
    
            // Verify patient exists
            $patient = User::find($validated['patient_id']);
            if (!$patient) {
                logger('Patient not found:', ['id' => $validated['patient_id']]);
                return back()->with('error', 'Patient not found');
            }
    
            // Create prescription
            $prescriptionData = [
                'user_id' => $validated['patient_id'],
                'doctor_id' => auth()->id(), // Assuming doctors are authenticated users
                'health_insurance' => $request->filled('health_insurance'),
                'reference' => $validated['reference'],
                'high_blood_pressure' => $request->filled('high_blood_pressure'),
                'food_allergies' => $request->filled('food_allergies'),
                'tendency_bleed' => $request->filled('tendency_bleed'),
                'heart_disease' => $request->filled('heart_disease'),
                'diabetes' => $request->filled('diabetes'),
                'pregnancy' => $request->filled('pregnancy'),
                'breast_feeding' => $request->filled('breast_feeding'),
                'current_medication' => $request->input('current_medication'),
                'surgery' => $request->input('surgery'),
                'date' => $validated['date'],
                'accident' => $request->input('accident'),
                'pulse_rate' => $request->input('pulse_rate'),
                'temperature' => $request->input('temperature'),
                'problem_description' => $validated['problem_description'],
                'advice' => $validated['advice'],
                'next_visit_required' => $request->filled('next_visit_required'),
                'next_visit_date' => $validated['next_visit_date'] ?? null,
                'next_visit_time' => $validated['next_visit_time'] ?? null,
            ];
            
            logger('Attempting to create prescription with:', $prescriptionData);
            
            $prescription = Prescription::create($prescriptionData);
            
            if (!$prescription->exists) {
                logger('Prescription creation failed');
                throw new \Exception('Prescription creation failed');
            }
            
            logger('Prescription created:', ['id' => $prescription->id]);
    
            // Handle booking
            if (!empty($validated['next_visit_date']) && !empty($validated['next_visit_time'])) {
                $booking = Booking::create([
                    'user_id' => $validated['patient_id'],
                    'doctor_id' => auth()->id(),
                    'time' => Carbon::createFromFormat('H:i', $validated['next_visit_time'])->format('g:i A'),
                    'date' => $validated['next_visit_date'],
                    'status' => 0
                ]);
                logger('Booking created:', ['id' => $booking->id]);
            }
    
            // Attach medicines
            $medicinesData = [];
            foreach ($validated['medicines'] as $medicine) {
                if (!Medicine::find($medicine['medicine_id'])) {
                    logger('Medicine not found:', ['id' => $medicine['medicine_id']]);
                    throw new \Exception('Medicine not found: ' . $medicine['medicine_id']);
                }
                
                $medicinesData[$medicine['medicine_id']] = [
                    'dosage' => $medicine['dosage'],
                    // ... other fields
                ];
            }
            
            $prescription->medicines()->attach($medicinesData);
            logger('Medicines attached:', ['count' => count($medicinesData)]);
    
            DB::commit();
            logger('Transaction committed successfully');
    
            return redirect()->route('prescriptions.show', $prescription)
                ->with('success', 'Prescription created successfully');
    
        } catch (\Exception $e) {
            DB::rollBack();
            logger('Transaction rolled back due to error:', ['error' => $e->getMessage()]);
            
            return back()->withInput()
                ->with('error', 'Error creating prescription: ' . $e->getMessage());
        }
    }
    public function show($userId,$date)
    {
        $prescription = Prescription::with(['user','doctor','medicines'])->where('user_id',$userId)->where('date',$date)->first();
        $deliveryBoxes = Box::where('status', 'available')->get();
        $pharmacies = User::where('role_id',4)->get();
        return view('prescription.show',compact('prescription','deliveryBoxes','pharmacies'));
    }

    //get all patients from prescription table
    public function patientsFromPrescription()
    {
        $patients = Prescription::get();
        return view('prescription.all',compact('patients'));
    }
    public function addPatient(){
        return view('prescription.add-patient');
    }

    public function newPrescription($id){
        $booking = Booking::with('user')->find($id);
        
        $medicines  = Medicine::all();
        return view('prescription.create')->with([
            'booking' => $booking,
            'medicines' => $medicines
        ]);
    }

    public function sendPrescription(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pharmacy' => 'required',
        ]);
        $prescription = Prescription::find($id);
        $prescription->pharmacy_id = $request->pharmacy;
        $prescription->status = "in_process";
        $prescription->save();
        return redirect()->back()
        ->with([
            'success'=>'Prescription send to pharmacy successfully'
        ]);
    }

   



}
