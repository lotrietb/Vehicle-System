<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vehicle;
use Illuminate\Support\Facades\Validator;
use SoapBox\Formatter\Formatter;

class ApiController extends Controller
{
	private $response_format = 'json';

	public function __construct(Request $request){
		$format = $request->get('format');
		$this->response_format = (isset($format) && in_array($format, ['json', 'xml']))? $format: 'json';
	}

	public function vehicles() {
		$this->generate_response(Vehicle::all()->toArray());
	}

	public function vehicle($id)
    {    	
    	$vehicle = Vehicle::find($id);

    	if (!empty($vehicle)) {
    		$this->generate_response($vehicle->toArray());
    	} else {
    		$this->generate_response([
    			'status' => 'error',
    			'code' => 'VEHICLE_NOT_FOUND'
    		]);
    	}
    }

    public function add($id) 
    {    	
    	$vehicle = Vehicle::find($id)->toArray();

    	if (!empty($vehicle)) {
    		$this->generate_response($vehicle->toArray());
    	} else {
    		$this->generate_response([
    			'status' => 'error',
    			'code' => 'VEHICLE_NOT_FOUND'
    		]);
    	}
    }

    public function update($id, Request $request) 
    {    	
    	$validation_results = $this->validate_fields($request->all());

    	if($validation_results !== true) $this->generate_response($validation_results);

    	$vehicle = Vehicle::find($id);
    	if (!empty($vehicle)) {
	    	$vehicle->owner_name = $request->name;
		    $vehicle->owner_surname = $request->surname;
		    $vehicle->owner_contact_no = $request->contact_no;
		    $vehicle->owner_email_address = $request->email_address;
		    $vehicle->manufacturer = $request->manufacturer;
		    $vehicle->type = $request->type;
		    $vehicle->year = $request->year;
		    $vehicle->colour = $request->colour;
		    $vehicle->mileage = $request->mileage;
		    $vehicle->save();

		    $this->generate_response([
    			'status' => 'success',
    			'code' => 'VEHICLE_UPDATED'
    		]);
    	} else {
    		$this->generate_response([
    			'status' => 'error',
    			'code' => 'VEHICLE_NOT_FOUND'
    		]);
    	}
    }


    public function save(Request $request){
    	$validation_results = $this->validate_fields($request->all());

    	if($validation_results !== true) $this->generate_response($validation_results);

    	$vehicle = new Vehicle([
    		'owner_name' => $request->name,
	        'owner_surname' => $request->surname,
	        'owner_contact_no' => $request->contact_no,
	        'owner_email_address' => $request->email_address,
	        'manufacturer' => $request->manufacturer,
	        'type' => $request->type,
	        'year' => $request->year,
	        'colour' => $request->colour,
	        'mileage' => $request->mileage,
    	]);
    	
    	$vehicle->save();
    	$this->generate_response([
			'status' => 'success',
			'code' => 'VEHICLE_ADDED'
    	]);
    }

    public function remove($id) 
    {    	
    	$vehicle = Vehicle::find($id);
    	if (!empty($vehicle)) {
	    	$vehicle->delete();

		    $this->generate_response([
    			'status' => 'success',
    			'code' => 'VEHICLE_DELETED'
    		]);
    	} else {
    		$this->generate_response([
    			'status' => 'error',
    			'code' => 'VEHICLE_NOT_FOUND'
    		]);
    	}
    }

    private function validate_fields($request)
    {
        $validator = Validator::make($request, [
            'name' => 'required',
            'surname' => 'required',
            'contact_no' => 'required|size:10',
            'email_address' => 'required|email',
            'manufacturer' => 'required',
            'type' => 'required',
            'year' => 'required|numeric|min:1910|max:' . date('Y'),
            'colour' => 'required',
            'mileage' => 'required|numeric',
        	]
        );

        if ($validator->fails()) {
    		return [
    			'status' => 'error',
    			'code' => 'VALIDATION_FAILED',
    			'messages' => $validator->messages()
    		];
    	}

    	return true;
    }

    private function generate_response($resp_value) {
    	if ($this->response_format == 'json') {
    		header('Content-Type: application/json');
			echo json_encode($resp_value);
    	} else {
    		$xml = Formatter::make($resp_value, Formatter::XML);
    		header('Content-Type: application/xml');
    		echo $xml->toXml();
    	}
    	exit();
    }
}