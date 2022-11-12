<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Greeting Messages
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Greeting Messages </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('greetingmessages.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Greeting Messages</li>

        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Greeting Messages

            {{-- @can('create-category') --}}
            {{-- <a class="btn btn-sm btn-info" href="{{ route('greetingmessages.create') }}">Add New</a> --}}
            {{-- @endcan --}}

        </div>
        <div class="card-body">

            <x-backend.layouts.elements.message :fmessage="session('message')" />

            <!-- <table id="datatablesSimple"> -->
            {{-- <form method="GET" action="{{ route('greetingmessages.index') }}">
                <x-backend.form.input style="width: 200px;" name='search' />

            </form> --}}
            <table class="table" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Message By</th>
                        <th>Image</th>
                        <th>Message</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach ($greetingmessages as $greetingmessages)
                        <tr>
                            <td>{{ ++$sl }}</td>
                            <td>{{ $greetingmessages->message_by }}</td>
                            <td>

                                <img src="{{ asset('storage/greeting/' . $greetingmessages->img) }}" alt="image"
                                    style="width: 100px; height: 100px;">
                                {{-- <a href="{{ asset('storage/greeting/' . $greetingmessages->img) }}" target="_blank">
                                </a> --}}
                            </td>
                            <td>{{ $greetingmessages->greeting_messages }}</td>
                            <td>{{ $greetingmessages->name }}</td>
                            <td>
                                <a class="btn btn-info btn-sm"
                                    href="{{ route('greetingmessages.show', ['greetingmessage' => $greetingmessages->id]) }}">Show</a>

                                <a class="btn btn-warning btn-sm"
                                    href="{{ route('greetingmessages.edit', ['greetingmessage' => $greetingmessages->id]) }}">Edit</a>

                                {{-- <form style="display:inline"
                                    action="{{ route('greetingmessages.destroy', ['greetingmessage' => $greetingmessages->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')

                                    <button onclick="return confirm('Are you sure want to delete ?')"
                                        class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form> --}}

                                {{-- <!-- <a href="{{ route('greetingmessages.destroy', ['greetingmessages' => $greetingmessages->id]) }}" >Delete</a> --> --}}


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- {{ $greetingmessages->links() }} --}}
        </div>
    </div>

</x-backend.layouts.master>
