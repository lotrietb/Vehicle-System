<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vehicle;

class VehicleController extends Controller
{	
    public function save(Request $request) 
    {
    	$this->validate_fields($request);
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
	    return redirect('/home');
    }

    public function edit($id) 
    {    	
    	$vehicle = Vehicle::find($id);

    	if (!empty($vehicle)) {
    		return view('vehicle.edit', compact('vehicle'));
    	} else {
    		return redirect('home');
    	}
    }

    public function update($id, Request $request) 
    {    	
    	$this->validate_fields($request);

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

		    $response = "success";
    		return view('vehicle.edit', compact('vehicle','response'));
    	} else {
    		$response = "error";
    		return redirect('home');
    	}
    }

    public function remove($id) 
    {    	
    	$vehicle = Vehicle::find($id);

    	if (!empty($vehicle)) {
    		$vehicle->delete();
    	}
    	$success = "removed";

    	return redirect('home');
    }

    private function validate_fields($request)
    {
    	$this->validate($request, [
	        'name' => 'required',
	        'surname' => 'required',
	        'contact_no' => 'required|size:10',
	        'email_address' => 'required|email',
	        'manufacturer' => 'required',
	        'type' => 'required',
	        'year' => 'required|numeric|min:1910|max:' . date('Y'),
	        'colour' => 'required',
	        'mileage' => 'required|numeric',
	    ]);
    }
}
