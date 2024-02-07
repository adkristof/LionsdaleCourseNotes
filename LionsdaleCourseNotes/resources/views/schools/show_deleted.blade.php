@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-white">Deleted Courses</h1>

            @if (Session::has('message'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Holy guacamole!</strong> {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="table-responsive">
                <table
                    class="table table-striped
                table-hover	
                table-borderless
                table-secondary
                align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>School Name</th>
                                <th>Address</th>
                                <th>Contact Name</th>
                                <th>Contact Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($school as $item)
                            <tr class="table-secondary">
                                <td scope="row">{{ $item->name }}</td>
                                <td class="text-break">{{ $item->address }}</td>
                                <td class="text-break">{{ $item->contactName }}</td>
                                <td class="text-break">{{ $item->contactEmail }}</td>
                                <td>
                                    <div class="row w-40">
                                        
                                        <div class="col text-center">
                                            <form action="{{ route('schools.restore', $item) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-info">Restore School</button>
                                            </form>
                                        </div>   
                                                                         
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
