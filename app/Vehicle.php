<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'owner_name', 'owner_surname', 'owner_contact_no', 'owner_email_address', 
    	'manufacturer', 'type', 'year', 'colour', 'mileage'
	];
}
