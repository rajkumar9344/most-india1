@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2> Holiday</h2>
            <a href="{{ route('holiday.index') }}" class="btn btn-black"><i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <!-- Card for Holiday Form -->
            <div class="card " style="width: 700px;">
               
                <div class="card-body">
                    <!-- Holiday Form -->
                    <form action="{{ route('holiday.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="holiday_date"> Date</label>
                            <input type="date" id="holiday_date" name="holiday_date"
                                class="form-control @error('holiday_date') is-invalid @enderror"
                                value="{{ old('holiday_date') }}" required>
                            @error('holiday_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="holiday_name">Leave name</label>
                            <input type="text" id="holiday_name" name="holiday_name"
                                class="form-control @error('holiday_name') is-invalid @enderror"
                                value="{{ old('holiday_name') }}" required>
                            @error('holiday_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea id="comment" name="comment" class="form-control @error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group  text-center">
                            <button type="submit" class="btn btn-success">Add Holiday</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
