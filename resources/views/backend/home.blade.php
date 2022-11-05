@if(auth()->user()->role->name == "Admin") 
@include('layouts.admin');
@elseif(auth()->user()->role->name == "Student")
@include('layouts.student');
@else
@include('layouts.teacher');
<script>
      // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

    $('#reservation').daterangepicker()

  //   Date picker JS
</script>
@endif