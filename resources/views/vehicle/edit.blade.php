@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit vehicle
                    <a id="homebutton" href="/" class="btn btn-sm btn-success pull-right">
                      Home
                    </a>
                </div>

                <div class="panel-body">
                    <form id="vehicle_form" name="vehicle_form" method="POST" action="/vehicle/update/{{ $vehicle['id'] }}" class="form-horizontal">
                        <fieldset>
                        {{ csrf_field() }}

                        <!-- Form Name -->
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @elseif(!empty($response) && $response == "success")
                        	<div class="alert alert-success">Record updated successfully</div>
                        @elseif(!empty($response))
                        	<div class="alert alert-error">An error occured trying to update the record. Please try again. </div>
                        @endif
                        <legend>Owner Details</legend>

                        <!-- Text input -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="name">Name</label>  
                          <div class="col-md-8">
                          <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" value="{{ $vehicle['owner_name'] }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="surname">Surname</label>  
                          <div class="col-md-8">
                          <input id="surname" name="surname" type="text" placeholder="Surname" class="form-control input-md" value="{{ $vehicle['owner_surname'] }}">
                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="contact_no">Contact Number</label>  
                          <div class="col-md-8">
                          <input id="contact_no" name="contact_no" type="text" placeholder="Contact Number" class="form-control input-md" value="{{ $vehicle['owner_contact_no'] }}" required>
                                @if ($errors->has('contact_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="email_address">Email Address</label>  
                          <div class="col-md-8">
                          <input id="email_address" name="email_address" type="text" placeholder="Email Address" class="form-control input-md" value="{{ $vehicle['owner_email_address'] }}" required>
                                @if ($errors->has('email_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_address') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>

                        <legend>Vehicle Details</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="manufacturer">Manufacturer (e.g. Volkswagon)</label>  
                          <div class="col-md-8">
                          <input id="manufacturer" name="manufacturer" type="text" placeholder="Manufacturer" class="form-control input-md" value="{{ $vehicle['manufacturer'] }}" required>
                                @if ($errors->has('manufacturer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manufacturer') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="type">Type (e.g. Polo)</label>  
                          <div class="col-md-8">
                          <input id="type" name="type" type="text" placeholder="Enter vehicle type" class="form-control input-md" value="{{ $vehicle['type'] }}" required>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="Year">Year</label>  
                          <div class="col-md-8">
                          <input id="year" name="year" type="text" placeholder="Year" class="form-control input-md" value="{{ $vehicle['year'] }}" required>
                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="Colour">Colour</label>  
                          <div class="col-md-8">
                          <input id="colour" name="colour" type="text" placeholder="Colour" class="form-control input-md" value="{{ $vehicle['colour'] }}" required>
                                @if ($errors->has('colour'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('colour') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="mileage">Mileage</label>  
                          <div class="col-md-8">
                          <input id="mileage" name="mileage" type="text" placeholder="mileage" class="form-control input-md" value="{{ $vehicle['mileage'] }}" required>
                                @if ($errors->has('mileage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mileage') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>

                        <legend></legend>
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="button1id"> </label>
                          <div class="col-md-8">
                            <button id="save"  class="btn btn-success pull-right">Update</button>
                          </div>
                        </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
