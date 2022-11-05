<x-backend.layouts.master>
    @php $date = date('Y'); @endphp
    
    

    <x-slot name="pageTitle">
        Current Courses
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Course Registration </x-slot>

            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Course Registration</li>

        </x-backend.layouts.elements.breadcrumb>

    </x-slot>
    

    <div class="row ps-2 pe-2">
            <div class="col-md-8" id="table-spreid">
                <table class="table table-dark table-striped" id="table-spreid">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Course Teacher</th>
                            <th scope="col">Year</th>
                            <th scope="col">Course Year</th>
                            @if(isset($yearWiseInfo) && $yearWiseInfo->registration_done == 0)
                            <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="tableD">
                        @php $i = 1; @endphp
                        @foreach($courses as $course)
                            <tr>
                                <td scope="row">{{$i++}}</td>
                                <td>{{ $course->mycurrentcourse->course->course_name }}</td>
                                <td>{{ $course->mycurrentcourse->teacher->name }}</td>
                                <td>{{ $course->year }}</td>
                                <td>{{ $course->course_year }}</td>
                                @if(isset($yearWiseInfo) && $yearWiseInfo->registration_done == 0)
                                <td>
                                    <a href="{{ route('course-registration-delete', ['course_id'=> $course->currentcourse_id, 'student_id'=>auth()->user()->id]) }}" class="btn btn-danger btn-sm">Delete</a> 
                                </td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(isset($yearWiseInfo) && $yearWiseInfo->registration_done == 0)
                    <div class="w-100 d-flex justify-content-end">
                        <a href="{{ route('course-registration-save') }}" onclick="return confirm('You can not change once you have saved')" class="btn btn-info">Save</a>
                    </div>
                @endif
            </div>
            @if(isset($yearWiseInfo) && $yearWiseInfo->registration_done == 0)
                @php 
                    $coursesTakenArray = $courses->pluck('currentcourse_id')->toArray();
                @endphp                    
                <div class="col-md-4" id="listdiv">            
                    <ul class="list-group">                
                    @foreach($currentcourseslist as $currentcourse)
                        <li class="list-group-item"><div class="d-flex justify-content-between">
                            <div>{{ $currentcourse->course->course_name }} (Teacher: {{ $currentcourse->teacher->name }})</div> 
                            <div>
                            @if(in_array($currentcourse->id, $coursesTakenArray)) 
                                <button class="btn btn-success btn-sm">Added</button> 
                            @else 
                                <a href="{{ route('course-registration-store', ['course_id'=> $currentcourse->id, 'student_id'=>auth()->user()->id ]) }}" class="btn btn-primary btn-sm">ADD</a> 
                            @endif 
                            </div>
                        </li> 
                    @endforeach
                </ul>
                </div>
            @else
                <p>Course Registration Done</p>
            @endif

        </div>

        <script>
            $(document).ready(function(){
            $("#year").datepicker({
                format: "yyyy",
                viewMode: "years", 
                minViewMode: "years",
                autoclose:true
            });   
            })      
        </script>
</x-backend.layouts.master>