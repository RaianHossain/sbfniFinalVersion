<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Add Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Greeting Messages </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('greetingmessages.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Greeting Messages <a class="btn btn-sm btn-info" href="{{ route('greetingmessages.index') }}">List</a>
        </div>
        <div class="card-body">

            <x-backend.layouts.elements.errors :errors="$errors" />

            <form action="{{ route('greetingmessages.store') }}" enctype="multipart/form-data" method="post">
                @csrf

                <label for="message_by">Select Designation</label>
                <select name="message_by" id="message_by" class="form-control">
                    <option value="">Select message_by</option>
                    <option value="COO">COO</option>
                    <option value="President">President</option>
                    <option value="VICEPRINCIPAL">VICE PRINCIPAL</option>
                </select>
                <br>

                <x-backend.form.input name="img" type="file" required />

                <x-backend.form.textarea name="greeting_messages" />

                <x-backend.form.input name="name" />

                <x-backend.form.button>Save</x-backend.form.button>
            </form>
        </div>
    </div>


</x-backend.layouts.master>
