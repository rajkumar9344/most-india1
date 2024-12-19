@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Onsite Details</h2>
        <a href="{{ route('onsite.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <!-- Form for Viewing Onsite Details -->
    <div class="card mt-4">
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="employeeName">Employee Name</label>
                    <input type="text" id="employeeName" class="form-control" value="{{ $onsite->employee_name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="workOrderNumber">Work Order No</label>
                    <input type="text" id="workOrderNumber" class="form-control" value="{{ $onsite->work_order_number }}" readonly>
                </div>
                <div class="form-group">
                    <label for="customerName">Customer Name</label>
                    <input type="text" id="customerName" class="form-control" value="{{ $onsite->customer_name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="contactPersonName">Contact Person Name</label>
                    <input type="text" id="contactPersonName" class="form-control" value="{{ $onsite->contact_person_name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="contactNumber">Contact No</label>
                    <input type="text" id="contactNumber" class="form-control" value="{{ $onsite->contact_number }}" readonly>
                </div>
                <div class="form-group">
                    <label for="onsiteDate">Date</label>
                    <input type="date" id="onsiteDate" class="form-control" value="{{ $onsite->onsite_date }}" readonly>
                </div>
                <div class="form-group">
                    <label for="fromTime">From Time</label>
                    <input type="time" id="fromTime" class="form-control" value="{{ $onsite->from_time }}" readonly>
                </div>
                <div class="form-group">
                    <label for="toTime">To Time</label>
                    <input type="time" id="toTime" class="form-control" value="{{ $onsite->to_time }}" readonly>
                </div>
               
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea id="comments" class="form-control" rows="3" readonly>{{ $onsite->comments }}</textarea>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
