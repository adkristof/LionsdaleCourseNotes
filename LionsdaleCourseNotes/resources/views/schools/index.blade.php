@extends('layouts.app')
@section('content')
    <div class="container" >
        <div class="row">
            <div class="col">
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
                            @for ($i = 0; $i < count($schools); $i++)
                            <tr class="table-secondary">
                                <td scope="row">{{ $schools[$i]->name }}</td>
                                <td class="text-break">{{ $schools[$i]->address }}</td>
                                <td class="text-break">{{ $schools[$i]->contactName }}</td>
                                <td class="text-break">{{ $schools[$i]->contactEmail }}</td>
                            
                                    <td>
                                        @can('view', \App\Models\Course::class)
                                        <div class="row w-40">
                                            <div class="col">
                                                <form action="{{ route('schools.show', $schools[$i]) }}" method="GET">
                                                    <button type="submit" class="btn btn-primary">Show</button>
                                                </form>
                                            </div>
                                                @endcan
                                        
                                                @can('update', \App\Models\Course::class)
                                                <div class="col">
                                                    <form action="{{ route('schools.edit', $schools[$i]) }}" method="GET">
                                                        <button type="submit" class="btn btn-warning">Edit</button>
                                                    </form>
                                                </div>    
                                                @endcan
                                                @can('delete', \App\Models\Course::class)
                                                <div class="col">
                                                    <form action="{{ route('schools.destroy', $schools[$i]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                                @endcan
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection