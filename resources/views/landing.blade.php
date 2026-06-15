@extends('layouts.app')

@section('content')
<!-- Recently Joined Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="text-primary"><i class="fa fa-hashtag me-2"></i>{{ __('Employees List') }}</h5>
            <a href="{{ route('home') }}">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Date of Joining</th>
                        <th scope="col">EMP. ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                @if (!empty($employees))
                    @foreach ($employees as $emp)
                    <tr>
                        <td>{{ $emp->emp_date_of_join }}</td>
                        <td>{{ $emp->empid }}</td>
                        <td>{{ ucwords($emp->emp_name) }}</td>
                        <td>{{ $emp->emp_designation }}</td>
                        <td>{{ ucwords($emp->emp_gender) }}</td>
                        <td>{{ $emp->emp_address }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">{{ __('No data found.') }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recently Joined End -->
@endsection
