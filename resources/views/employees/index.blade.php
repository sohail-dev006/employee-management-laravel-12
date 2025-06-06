@extends('layouts.app')

@section('title')
    Employees
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="my-3">
            Employees ({{ $employees->count() }})
        </h3>
        <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <hr>
    <div class="row my-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div
                        class="table-responsive"
                    >
                        <table
                            class="table dataTable table-bordered table-striped table-hover"
                        >
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Date of birth</th>
                                    <th scope="col">Hire Date</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $key => $employee)
                                    <tr>
                                        <td scope="col">{{ $key += 1 }}</td>
                                        <td scope="col">
                                            {{ $employee->first_name }} {{ $employee->last_name }}
                                        </td>
                                        <td scope="col">
                                            {{ $employee->email }}
                                        </td>
                                        <td scope="col">{{ $employee->phone }}</td>
                                        <td scope="col">{{ $employee->address }}</td>
                                        <td scope="col">{{ $employee->date_of_birth }}</td>
                                        <td scope="col">{{ $employee->hire_date }}</td>
                                        <td scope="col">{{ $employee->salary }}</td>
                                        <td scope="col">
                                            <img 
                                                src="{{ asset('images/'.$employee->image) }}"
                                                class="img-fluid rounded"
                                                alt="{{ $employee->first_name }}" 
                                                with="50"
                                                height="50"    
                                            >
                                        </td>
                                        <td scope="col">{{ $employee->department->name }}</td>
                                        <td scope="col">{{ $employee->position->title }}</td>
                                        <td scope="col">
                                            @if ($employee->status)
                                                <span class="badge bg-success">
                                                    Active
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td scope="col">
                                            <a href="{{ route('employees.show',$employee->id) }}" 
                                                class="btn btn-dark btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('employees.edit',$employee->id) }}" 
                                                class="btn btn-warning btn-sm my-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('employees.destroy',$employee->id) }}" 
                                                method="post"
                                                onsubmit="return confirm('Are you sure you want to delete this employee?')"
                                                >
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection