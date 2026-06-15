@extends('layouts.master')

@section('content')
<!-- Add Employee Start -->
<div class="container-fluid main-content pt-4 px-4 mb-3">
    <div class="bg-light text-center rounded p-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Add New Employee</h6>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success text-start">{{ Session::get('success')}}</div>
            @elseif(Session::has('error'))
            <div class="alert alert-danger text-start"><i class="fa fa-exclamation-circle me-2"></i> {{ Session::get('error')}}</div>
            @endif
            <form method="POST" action="{{ route('employee.save') }}">
                @csrf
                <div class="d-sm-flex gap-3 flex-nowrap">
                    <div class="form-floating mb-3 w-45">
                        <input type="text" id="empid" placeholder="EMP654321" class="form-control @error('empid') is-invalid @enderror" name="empid" value="{{ old('empid') }}">
                        <label for="empid">{{ __('Employee ID') }}</label>
                        @error('empid')
                            <span class="invalid-feedback text-start" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="d-sm-flex gap-3 flex-nowrap">
                    <div class="form-floating mb-3 w-100">
                        <input type="text" id="emp_name" placeholder="Ashok Malhotra" class="form-control @error('emp_name') is-invalid @enderror" name="emp_name" value="{{ old('emp_name') }}">
                        <label for="emp_name">{{ __('Name') }}</label>
                        @error('emp_name')
                            <span class="invalid-feedback text-start" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <input type="text" id="emp_designation" placeholder="Sr. Software Developer" class="form-control @error('emp_designation') is-invalid @enderror" name="emp_designation" value="{{ old('emp_designation') }}">
                        <label for="emp_designation">{{ __('Designation') }}</label>
                        @error('emp_designation')
                            <span class="invalid-feedback text-start" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="d-sm-flex gap-3 flex-nowrap">
                    <div class="form-floating mb-3 w-100">
                        <input type="date" id="emp_date_of_join" placeholder="2022-01-01" class="form-control @error('emp_date_of_join') is-invalid @enderror" name="emp_date_of_join" value="{{ old('emp_date_of_join') }}">
                        <label for="emp_date_of_join">{{ __('Date of Joining') }}</label>
                        @error('emp_date_of_join')
                            <span class="invalid-feedback text-start" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <select name="emp_gender" id="emp_gender" class="form-control @error('emp_gender') is-invalid @enderror" name="emp_gender" value="{{ old('emp_gender') }}">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <label for="emp_gender">{{ __('Gender') }}</label>
                        @error('emp_date_of_join')
                            <span class="invalid-feedback text-start" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="d-sm-flex gap-3 flex-nowrap">
                    <div class="form-floating mb-3 w-100">
                        <textarea rows="2" cols="200" type="text" id="emp_address" placeholder="Start writing your address..." class="form-control @error('emp_address') is-invalid @enderror" name="emp_address" value="{{ old('emp_address') }}"></textarea>
                        <label for="emp_address">{{ __('Address') }}</label>
                        @error('emp_address')
                            <span class="invalid-feedback text-start" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 float-end">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Employee End -->
@endsection
