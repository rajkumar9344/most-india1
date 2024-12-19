@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Holiday</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-black mb-5">
                <i class="fas fa-home"></i> Home
            </a>
        </div>

        <div class="card">
            <h4>Holiday Details</h4>
            <div class="float-right">

                <a href="{{ route('holiday.create') }}" class="btn btn-primary mb-3 mr-2 float-right">Create</a>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="card-body">
                <!-- Table to display holidays -->
                <div class="table-responsive"> <!-- Make the table responsive on small screens -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Holiday Name</th>
                                <th>Holiday Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($holidays as $holiday)
                                <tr>
                                    <td>{{ $holiday->id }}</td>
                                    <td>{{ $holiday->holiday_name }}</td>
                                    <td>{{ $holiday->holiday_date }}</td>
                                    <td>
                                        <!-- View Button -->
                                        <a href="#" class="btn btn-info btn-sm"
                                            style="margin-right: 5px; padding: 8px 12px;">View</a>

                                        <!-- Edit Button -->
                                        <a href="#" class="btn btn-warning btn-sm"
                                            style="margin-right: 5px; padding: 8px 12px;">Edit</a>

                                        <!-- Delete Button -->
                                        <form action="#" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                style="margin-right: 5px; padding: 8px 12px;"
                                                onclick="return confirm('Are you sure you want to delete this holiday?')">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    @endsection
