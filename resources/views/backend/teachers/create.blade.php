<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Teachers </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('teachers.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Teacher ID <a class="btn btn-sm btn-info" href="{{ route('teachers.index') }}">List</a>
        </div>
        <div class="card-body">

           <x-backend.layouts.elements.errors :errors="$errors"/>

            <form action="{{ route('teachers.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <x-backend.form.input name="name"/> 
                <x-backend.form.input name="initial"/> 
                <x-backend.form.input name="designation"/>
                <x-backend.form.input name="qualification"/>
                <x-backend.form.textarea name="description" />
                <x-backend.form.input name="email"/>
                <x-backend.form.input name="phone"/>
                <x-backend.form.input name="knowledge" type="number"/>
                <x-backend.form.input name="experience" type="number"/>
                <x-backend.form.input name="communication" type="number"/>
                <x-backend.form.input name="leadership" type="number"/>
                <input name="img" type="file"/>
                <x-backend.form.input name="password" type="password"/>
                
                
                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>