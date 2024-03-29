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
                            <th>Course name</th>
                            <th class="w-50">level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($course as $item)
                            <tr class="table-secondary">
                                <td scope="row">{{ $item->name }}</td>
                                <td class="text-break">{{ $item->level }}</td>
                                <td>
                                    <div class="row w-40">
                                        
                                        <div class="col text-center">
                                            <form action="{{ route('courses.restore', $item) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-info">Restore Course</button>
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
