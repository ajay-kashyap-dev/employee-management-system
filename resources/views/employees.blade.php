@extends('layouts.master')

@section('content')
<!-- All Employees Start -->
<div class="container-fluid main-content pt-4 px-4 mb-3">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Employees List</h6>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger text-start">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><i class="fa fa-exclamation-circle me-2"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-success text-start">{{ Session::get('success')}}</div>
        @elseif(Session::has('error'))
        <div class="alert alert-danger text-start"><i class="fa fa-exclamation-circle me-2"></i> {{ Session::get('error')}}</div>
        @endif
        <div class="filter-tools">
            <form action="{{ route('employees.list') }}" id="searchList">
                <div class="input-group mb-3">
                    <input type="hidden" id="page" name="page">
                    <input type="text" name="searchText" value="{{ $searchText }}" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                    <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0 emp_datatable">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Date of Joining</th>
                        <th scope="col">EMP. ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
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
                        <td>
                            <button class="btn btn-sm btn-primary edit-btn" data-id="{{ $emp->id }}"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $emp->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">{{ __('No data found.') }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-end pt-2">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>
<!-- All Employees End -->

<!-- Edit Modal Start -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit employee details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('employee.update') }}">
            @csrf
            @method('PATCH')
            <div class="d-flex gap-3 flex-nowrap">
                <div class="form-floating mb-3 w-45">
                    <input type="hidden" id="record_id" name="id">
                    <input type="text" id="empid" name="empid" placeholder="EMP654321" class="form-control">
                    <label for="empid">{{ __('Employee ID') }}</label>
                </div>
            </div>
            <div class="d-flex gap-3 flex-nowrap">
                <div class="form-floating mb-3 w-100">
                    <input type="text" id="emp_name" name="emp_name" placeholder="Ashok Malhotra" class="form-control">
                    <label for="emp_name">{{ __('Name') }}</label>
                </div>
                <div class="form-floating mb-3 w-100">
                    <input type="text" id="emp_designation" name="emp_designation" placeholder="Sr. Software Developer" class="form-control">
                    <label for="emp_designation">{{ __('Designation') }}</label>
                </div>
            </div>
            <div class="d-flex gap-3 flex-nowrap">
                <div class="form-floating mb-3 w-100">
                    <input type="date" id="emp_date_of_join" name="emp_date_of_join" placeholder="2022-01-01" class="form-control">
                    <label for="emp_date_of_join">{{ __('Date of Joining') }}</label>
                </div>
                <div class="form-floating mb-3 w-100">
                    <select name="emp_gender" id="emp_gender" class="form-control">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <label for="emp_gender">{{ __('Gender') }}</label>
                </div>
            </div>
            <div class="d-flex gap-3 flex-nowrap">
                <div class="form-floating mb-3 w-100">
                    <textarea rows="2" cols="200" type="text" id="emp_address" name="emp_address" placeholder="Start writing your address..." class="form-control"></textarea>
                    <label for="emp_address">{{ __('Address') }}</label>
                </div>
            </div>
            <div class="form-group mb-3 float-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal End -->

<!-- Edit Modal Start -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete confirmation?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>Are you sure want to delete this employee details?</p>
        <form method="POST" action="{{ route('employee.delete') }}">
            @csrf
            @method('DELETE')
            <input type="hidden" id="delete_id" name="id">
            <div class="form-group mb-3 float-end">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal End -->
@endsection

@section('js')
<script>
    // Edit Employee details
    $('.edit-btn').click(function(){
        let id = $(this).data('id');
        let action_url = "{{ route('employee.show', ':id') }}";
        action_url = action_url.replace(':id', id);
        $.ajax({
            type: "GET",
            url: action_url,
            dataType: "json",
            success: function(result){
                $('#editModal').find('#record_id').val(result.id);
                $('#editModal').find('#empid').val(result.empid);
                $('#editModal').find('#emp_name').val(result.emp_name);
                $('#editModal').find('#emp_designation').val(result.emp_designation);
                $('#editModal').find('#emp_date_of_join').val(result.emp_date_of_join);
                $('#editModal').find('#emp_gender').val(result.emp_gender);
                $('#editModal').find('#emp_address').val(result.emp_address);
                $('#editModal').modal('show');
    
            }
        });
    });

    // Delete Employee
    $('.delete-btn').click(function(){
        let id = $(this).data('id');
        $('#deleteModal').find('#delete_id').val(id);
        $('#deleteModal').modal('show');
    });

    // Search Pagination
    $('ul.pagination li a').click(function (e) {
        e.preventDefault();            
        let link = $(this).get(0).href;            
        let url = new URL(link);
        let page = url.searchParams.get("page");
        $("#searchList").find('#page').val(page);
        $("#searchList").submit();
    });
</script>
@endsection