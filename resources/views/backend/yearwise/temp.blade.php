<x-backend.layouts.master>
    <div class="container mt-5">
        <label for="year">Year: </label>
        <select type="string" name="year" class="form-control" id="year">
            @foreach (yearDropDown(4) as $year)
            <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
        </select>
        <br>
        <div style="width: 100%; border: 1px solid black;" class="mb-2">
        <a href="{{ route('first-year.a-section', ['course_year'=>'1st', 'year'=>'2022']) }}" style="text-decoration:none; color:black;"><h2 class="mb-3 ps-2">1st Year</h2></a>
       {{--<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="location = this.value;">
            <option selected>Select Section</option>
            <option value="{{ route('first-year.a-section', ['course_year'=>'1st', 'year'=>'2022']) }}">A section</option>
            
        </select>--}}
        </div>

        <div style="width: 100%; border: 1px solid black;" class="mb-2">
        <a href="{{ route('first-year.a-section', ['course_year'=>'2nd', 'year'=>'2022']) }}" style="text-decoration:none; color:black;"><h2 class="mb-3 ps-2">2nd Year</h2></a>
       {{--<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="location = this.value;">
            <option selected>Select Section</option>
            <option value="{{ route('first-year.a-section', ['course_year'=>'1st']) }}">A section</option>
            
        </select>--}}
        </div>

        <div style="width: 100%; border: 1px solid black;" class="mb-2">
        <a href="{{ route('first-year.a-section', ['course_year'=>'3rd', 'year'=>'2022']) }}" style="text-decoration:none; color:black;"><h2 class="mb-3 ps-2">3rd Year</h2></a>
       {{--<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="location = this.value;">
            <option selected>Select Section</option>
            <option value="{{ route('first-year.a-section', ['course_year'=>'1st']) }}">A section</option>
            
        </select>--}}
        </div>
    </div>

    <script>
        $("#year").on('change', ()=> {
            alert(this.val);
        })
    </script>
</x-backend.layouts.master>