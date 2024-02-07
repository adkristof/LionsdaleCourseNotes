@extends('layouts.app')

@section('content')
<?php $courses = \App\Models\Course::all();
    $currentuser = Auth::user();
?>
<div class="container">
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
                            <th>Completed</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @for ($i = 0; $i < count($currentuser->courses); $i++)
                        @if ($currentuser->courses[$i]->pivot->seen==1) 
                            <tr class="table-secondary">
                                <td scope="row">{{ $currentuser->courses[$i]->name }}</td>
                                <td class="text-break">{{ $currentuser->courses[$i]->level }}</td>
                                <td class="text-break">

                                    @if ($currentuser->courses[$i]->pivot->completed==1)
                                    Completed
                                    @else
                                    <div class="col">
                                        
                                        <form action="{{ route('courses.quiz', $courses[$i]) }}" method="GET">
                                            <button type="submit" class="btn btn-warning">Do Quizzes</button>
                                        </form>
                                    </div> 
                                    @endif

                                </td>
                            </tr>
                            @endif
                        @endfor
                    </tbody>
                </table>
</div>
@endsection