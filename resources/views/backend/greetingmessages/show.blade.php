<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Details
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
            Greeting Messages Details <a class="btn btn-sm btn-info" href="{{ route('greetingmessages.index') }}">List</a>
        </div>
        <div class="card-body">

            <p>Message By: {{ $greetingmessage->first()->message_by }}</p>
            {{-- <p>PDF: <a href="{{ asset('storage/greeting/' . $greetingmessage->first()->img) }}" target="_blank">
                    <i class="fas fa-file-img"></i>
                    {{ $greetingmessage->first()->img }}
                </a></p> --}}

            <p>Image: <img src="{{ asset('storage/greeting/' . $greetingmessage->first()->img) }}" alt="image"
                    style="width: 100px; height: 100px;"></p>

                

            <p>Message: {{ $greetingmessage->first()->greeting_messages }}</p>
            <p>Name: {{ $greetingmessage->first()->name }}</p>
        </div>
    </div>

</x-backend.layouts.master>
