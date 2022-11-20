<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;


class PatientsController extends Controller
{
    public function index(){
        #----------------------------------------------#
        // test-end-point                              #
        // echo "ini index";                           #
        #----------------------------------------------#
        // var patients
        $patients = Patients::all();

        //  get-all-data-patients
        $data = [
            'message' => 'Get all patients data',
            'patients data' => $patients

        ];
        
        #return respon-json 
        return response()->json($data, 200);

    }

    public function store(Request $request){
        #----------------------------------------------#
        // test-end-point                              #
        // echo "ini store";                           #
        #----------------------------------------------#

        // add data and validation
        $patientValidate = $request->validate([
            'name' => 'required',
            'phone' => 'numeric|required',
            'address' => 'required',
            'status' => 'required',
            'in_date_at' => 'date_format:Y-m-d|required',
            'out_date_at' => 'date_format:Y-m-d|required'
        ]);

        // use patient-model for insert data into database
        $patient = Patients::create($patientValidate);
        
        // result if the data is successfully added
        if($patient){
            $data = [
                'message' => 'Patient data added successfully',
                'patient data' => $patient
            ];
            
            // json output displayed
            return response()->json($data, 201);
        } else {
            $data = [
                'message' => 'no patient data sent!!'
            ];
            // json output displayed
            return response()->json($data, 404);
        }
    }

    public function show($id){
        #----------------------------------------------#
        // test-end-point                              #
        // echo "ini show $id";                        #
        #----------------------------------------------#

        // find patient data from DB  by id 
        $showPatient = Patients::find($id);

        // result patient data by id 
        if ($showPatient) {
            $data = [
                'message' => 'get patient data by name => '.$showPatient->name,
                'data' => $showPatient
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'patient data by id '. $id .' is not found'
            ];

            return response()->json($data, 200);
        }

    }

    public function update(Request $request, $id){
        #----------------------------------------------#
        // test-end-point                              #
        // echo "ini update $id";                      #
        #----------------------------------------------#

        // find patient data from DB by id
        $patientData = Patients::find($id);

        // data updating process
        if ($patientData) {
            // if data finded
            $updateInput = [
                'name' => $request->name  ?? $patientData->name,
                'phone' => $request->phone  ?? $patientData->phone,
                'address' => $request->address  ?? $patientData->address,
                'status' => $request->status  ?? $patientData->status,
                'in_date_at' => $request->in_date_at  ?? $patientData->in_date_at,
                'out_date_at' => $request->out_date_at  ?? $patientData->out_date_at
            ];

            $patientData->update($updateInput);

            $data = [
                'message' => 'patient data successfully updated',
                'data updated' => $patientData
            ];

            // json output displayed
            return response()->json($data, 200);


        } else {
            // if patient not found
            $data = [
                'message' => 'patient data by id ' . $id . ' is not found'
            ];

            // json output displayed
            return response()->json($data, 404);
        }
    }

    public function destroy($id){
        #----------------------------------------------#
        // test-end-point                              #
        // echo "ini destroy $id";                     #
        #----------------------------------------------#

        // find patient by id from DB by id
        $findPatient = Patients::find($id);

        // process of deleting patient data
        if ($findPatient){
            $findPatient->delete();

            $data = [
                'message' => 'patient by id $id is successfully deleted'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'patient by id ' . $id . ' is not found'
            ];
            return response()->json($data, 404  );
        }
    }

    public function search($name){
        #----------------------------------------------#
        // test-end-point                              #
        // echo "ini search $nama";                    #
        #----------------------------------------------#

        $findNamePatient = Patients::where('name', $name)->get();

        if ($findNamePatient){
            $data = [
                'message' => 'Get searched resource',
                'data' => $findNamePatient
            ];
            return response()->json($data, 200);
        } else {
            return ['message ' => 'coba tidak bisa'];
        }



    }

    public function positive($status){
        // // test-end-point
        // echo "ini positive";

        $findPositive = Patients::where('status', $status)->get();
        return response()->json($findPositive, 200);
        
    }
    
    public function recovered($status){
        // test-end-point
        // echo "ini recovered";

        $findPositive = Patients::where('status', $status)->get();
        return response()->json($findPositive, 200);
    }

    public function dead($status){
        // test-end-point
        // echo "ini dead";

        $findPositive = Patients::where('status', $status)->get();
        return response()->json($findPositive, 200);
    }

}
