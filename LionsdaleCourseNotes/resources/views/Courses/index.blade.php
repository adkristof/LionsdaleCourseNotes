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
                                <th>Course name</th>
                                <th>Level</th>
                                <th>Student count</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @for ($i = 0; $i < count($courses); $i++)
                            {{$count=0}}
                                <tr class="table-secondary">
                                    <td scope="row">{{ $courses[$i]->name }}</td>
                                    <td class="text-break">{{ $courses[$i]->level }}</td>
                                    @for ($j = 0; $j < count($courses[$i]->users); $j++)
                                        @if ($courses[$i]->users[$j]->pivot->seen)
                                            {{$count++}}
                                        @endif
                                    @endfor
                                    <td>{{$count}}</td>
                                    <td>
                                        @can('view', \App\Models\Course::class)
                                        <div class="row w-40">
                                            <div class="col">
                                                <form action="{{ route('courses.show', $courses[$i]) }}" method="GET">
                                                    <button type="submit" class="btn btn-primary">Show</button>
                                                </form>
                                            </div>
                                        @endcan
                                            @can('update', \App\Models\Course::class)
                                            <div class="col">
                                                <form action="{{ route('courses.edit', $courses[$i]) }}" method="GET">
                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                                </form>
                                            </div>    
                                            @endcan
                                            @can('delete', \App\Models\Course::class)
                                            <div class="col">
                                                <form action="{{ route('courses.destroy', $courses[$i]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                            @endcan
                                        </div>
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