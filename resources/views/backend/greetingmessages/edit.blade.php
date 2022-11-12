<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Form
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Greeting Messages </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('greetingmessages.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit File <a class="btn btn-sm btn-info" href="{{ route('greetingmessages.index') }}">List</a>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('greetingmessages.update', ['greetingmessage' => $greetingmessage->first()->id]) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                {{-- <x-backend.form.input name="title" :value="$greetingmessages->first()->title" />  --}}
                <label for="message_by">Select Document Type</label>
                <select name="message_by" id="message_by" class="form-control">
                    <option value="">Select message_by</option>
                    <option value="COO" {{ $greetingmessage->first()->message_by == 'COO' ? 'selected' : '' }}>COO
                    </option>
                    <option value="President" {{ $greetingmessage->first()->message_by == 'President' ? 'selected' : '' }}>
                        President</option>
                    <option value="VICEPRINCIPAL" {{ $greetingmessage->first()->message_by == 'VICEPRINCIPAL' ? 'selected' : '' }}>
                        VICE PRINCIPAL</option>
                </select>


                <x-backend.form.input name="img" type="file" :value="$greetingmessage->first()->image" />

                <x-backend.form.textarea name="greeting_messages">
                    {{ $greetingmessage->first()->greeting_messages }}
                </x-backend.form.textarea>

                <x-backend.form.input name="name" :value="$greetingmessage->first()->name" />

                <x-backend.form.button>Update</x-backend.form.button>

            </form>
        </div>
    </div>


</x-backend.layouts.master>
