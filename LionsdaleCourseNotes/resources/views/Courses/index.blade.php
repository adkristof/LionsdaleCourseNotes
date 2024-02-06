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
                                            <div class="col">
                                                <?php $was=false;?>
                                                @for ($j = 0; $j < count(Auth::user()->courses); $j++)
                                                <?php $asd=Auth::user();?>
                                                @if ($asd->courses[$j]->id ==$courses[$i]->id)
                                                    @if($asd->courses[$j]->pivot->seen == 0 && $was==false)
                                                        @for ($a=0; $a < count($courses[$i]->users) ; $a++)
                                                            <?php
                                                                $courseuser1 = $courses[$i]->users[$a]->pivot; 
                                                            ?>
                                                        @endfor
                                                            @for ($a=0; $a < count($courseusers) ; $a++)  
                                                                @if($courseusers[$a]->user_id ==$courseuser1->user_id && $courseusers[$a]->course_id ==$courseuser1->course_id &&$was==false)
                                                                <?php $was=true;?> 
                                                                
                                                                <form action="{{ route('courseuser.update', $courseusers[$a]) }}" method="POST"
                                                                   enctype="multipart/form-data">
                                                                   @csrf
                                                                   @method('PUT')
                                                                   <input type="hidden" name="seen" id="seen" value="1">
                                                                   <input type="hidden" name="completed" id="completed" value="0">
                                                                   <button type="submit" class="btn btn-success">Join</button>
                                                                   </form> 
                                                                @endif
                                                                @endfor
                                                                
                                                        
                                                             
                                                        
                                                        @elseif($asd->courses[$j]->pivot->seen == 1 && $was==false)
                                                        @endif
                                                        <?php $was=true?>
                                                            @endif
                                                        
                                            @endfor
                                            @if ($was)
                                            @else  
                                            <form action="{{ route('courseuser.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="completed" id="completed" value="0">
                                                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                        <input type="hidden" name="course_id" id="course_id" value="{{$courses[$i]->id}}">
                                                        <button type="submit" class="btn btn-success">Join</button>
                                                        </form>  
                                            @endif
                                                
                                                
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