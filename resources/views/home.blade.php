@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Welcome {{ Auth::user()->name . ' ' .Auth::user()->surname }}
                    <a href="/vehicle/add" type="button" class="btn btn-primary btn-sm pull-right">Add Vehicle</a>
                </div>

                <div class="panel-body">
                    @if (!!count($vehicles))
                          <legend>Vehicles</legend>
                            <div class="col-md-12">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Owner</th>
                                    <th>Manufacturer and type</th>
                                    <th>Date Registered</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                @foreach ($vehicles as $vehicle)
                                    <tr>
                                        <td>{{ $vehicle->owner_name. ' ' .$vehicle->owner_surname }}</td>
                                        <td>{{ $vehicle->manufacturer. ' ' .$vehicle->type }}</td>
                                        <td>{{ date('d F Y', strtotime($vehicle->created_at)) }}</td>
                                        <td class="text-center">
                                            <a class='btn btn-success btn-xs view_vehicle' href="/vehicle/view/{{ $vehicle->id }}"> View</a>
                                            <a class='btn btn-info btn-xs edit_vehicle' href="/vehicle/edit/{{ $vehicle->id }}"> Edit</a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-xs remove_vehicle" data-vehicle="{{ $vehicle->id }}" data-vehicle-name="{{ $vehicle->manufacturer. ' ' .$vehicle->type }}" data-owner-name="{{ $vehicle->owner_name. ' ' .$vehicle->owner_surname }}" data-toggle="modal" data-target="#confirmDeletion" > Del</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            </div>

                        {{ $vehicles->links() }}
                    @else
                        <div class="alert alert-info">No vehicles found. Start by addding some!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- line modal -->
<div class="modal fade" id="confirmDeletion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="lineModalLabel">Are you sure?</h3>
        </div>
        <div class="modal-body">
            
            <h4>Are you sure you want to delete <span id="owner_name"></span>'s <span id="vehicle_name"></span>? </h4>
        </div>
        <div class="modal-footer">
            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                <div class="btn-group" role="group">
                    <a><button type="button" id="removeButton" class="btn btn-success" role="button">Yes</button></a>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default btn-hover-green" data-dismiss="modal"  role="button">Cancel</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@section('custom_css')
<style type="text/css">
    #vehicle_name, #owner_name {
        font-weight: 700;
    }
</style>
@endsection

@section('custom_js')
<script type="text/javascript">
    $(function(){
        $('.remove_vehicle').click(function(){
            var vehicle_id = $(this).data('vehicle');

            $('#owner_name').html($(this).data('owner-name'));
            $('#vehicle_name').html('"' + $(this).data('vehicle-name') + '"');

            $('#removeButton').closest('a').prop('href', '/vehicle/remove/'+ vehicle_id);
        });
    });
</script>
@endsection
