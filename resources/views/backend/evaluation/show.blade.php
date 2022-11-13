<x-backend.layouts.master>
    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Teacher Evaluation </x-slot>

            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Teacher Evaluation</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>
    <x-backend.layouts.elements.errors :errors="$errors" />
    @php $sl = 0; @endphp
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Course</th>
                <th scope="col">Teacher</th>
                <th scope="col">Course Code</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coursesTaken as $singleCourseTeken)
                <tr>
                    <th scope="row">{{ ++$sl }}</th>
                    <td>{{ $singleCourseTeken->mycurrentcourse->course->course_name }}</td>
                    <td>{{ $singleCourseTeken->mycurrentcourse->teacher->name }}</td>
                    <td>{{ $singleCourseTeken->mycurrentcourse->course->course_code }}</td>
                    <td>
                        @if (App\Models\Evaluation::where('id', $singleCourseTeken->mycurrentcourse->id)->where('teacher_id', $singleCourseTeken->mycurrentcourse->teacher->id)->where('student_id', auth()->user()->id)->where('year', date('Y'))->exists())
                            
                            <a href="#" class="btn btn-info">Evaluated</a>
                            
                        @else
                             <a href="{{ route('teacher.evaluation.create', ['currentcourse_id' => $singleCourseTeken->mycurrentcourse->id, 'student_id' => auth()->user()->id, 'year' => date('Y')]) }}"
                                class="btn btn-primary">Evaluate</a>
                            
                           
                        @endif

                </tr>
            @endforeach

        </tbody>
    </table>

</x-backend.layouts.master>
