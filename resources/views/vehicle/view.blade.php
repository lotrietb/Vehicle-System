@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Vehicle/Owner Information
                    <button href="javascript:void(0)" onclick="window.print()" class="btn btn-sm btn-primary pull-right">
                    	Print
                    </button>
                    <a id="homebutton" href="/" class="btn btn-sm btn-success pull-right">
                    	Home
                    </a>
                </div>

                <div class="panel-body" id="vehicle-section">
                	<div class="well">
                		<div class="col-xs-6"><strong>Owner</strong></div>
                		<div class="col-xs-6">{{ $vehicle['owner_name'] . ' ' . $vehicle['owner_surname'] }}</div>

                		<div class="col-xs-6"><strong>Contact Number</strong></div>
                		<div class="col-xs-6">{{ $vehicle['owner_contact_no'] }}</div>

                		<div class="col-xs-6"><strong>Email Address</strong></div>
                		<div class="col-xs-6">{{ $vehicle['owner_email_address'] }}</div>

                		<div class="col-xs-6"><strong>Vehicle</strong></div>
                		<div class="col-xs-6">{{ $vehicle['manufacturer']. ' ' .$vehicle['type'] }}</div>

                		<div class="col-xs-6"><strong>Colour</strong></div>
                		<div class="col-xs-6">{{ $vehicle['colour'] }}</div>

                		<div class="col-xs-6"><strong>Mileage</strong></div>
                		<div class="col-xs-6">{{ $vehicle['mileage'] }}</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_css')
<style type="text/css">
	.well{
		min-height: 300px;
	}
	.well>div{
		margin: 10px 0;
	}

	#homebutton {
		margin-right: 8px;
	}

	@media print {
		body * {
		   visibility: hidden;
		}
		#vehicle-section, #vehicle-section * {
		   visibility: visible;
		}
		#vehicle-section {
		   position: absolute;
		   left: 0;
		   top: 0;
		   width: 100%;
		}
	}
</style>
@endsection