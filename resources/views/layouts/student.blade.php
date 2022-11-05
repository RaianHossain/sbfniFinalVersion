<x-backend.layouts.master>
<x-slot name="pageTitle">
        Student Portal
    </x-slot>

    {{-- <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Welcome, {{ auth()->user()->name }} </x-slot>
            
        </x-backend.layouts.elements.breadcrumb>
    </x-slot> --}}

    <div class="container">
    <div class="main-body">
  <div class="row gutters-sm">
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-column align-items-center text-center">
            @php
             $profile=\App\Models\Profile::where('user_id',auth()->user()->id)->first();
            //  @dd($profile);
            @endphp
            @if ($profile->image)
              <img src="{{ asset('storage/profiles/'.$profile->image ) }}" alt="{{$profile->name }}"class="rounded-circle" width="150">
            @else
              "No Image"
            @endif
            
            <div class="mt-3">
              <h4>{{ auth()->user()->name }}</h4>
              <p class="text-secondary mb-1">{{ auth()->user()->role_id }}</p>
              <p class="text-muted font-size-sm">{{ auth()->user()->email }}</p>
              {{-- <button class="btn btn-outline-primary">Message</button> --}}
              {{-- <a href="{{ route('profile.edit', auth()->user()->id) }}" class="btn btn-outline-primary">Edit</a> --}}
              

            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-8">
      <div class="card mb-3">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Full Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->full_name ?? 'Edit Profile' }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ auth()->user()->email }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Phone</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->phone ?? 'Edit Profile'}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Father Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->father_name ?? 'Edit Profile'}}
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Mother Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->mother_name ?? 'Edit Profile'}}
            </div>
          </div>
      {{--    <hr>

           <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Address</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->address }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">NID</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->nid }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0"> Date of Birth</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->dob }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0"> Gender</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->gender }}
            </div>
          </div>
          <hr> --}}
          <div class="row">
            <div class="col-sm-12">
              <a class="btn btn-info " target="__blank" href="{{ route('profiles.edit', ['profile' =>$profile->id]) }}">Edit</a>
            </div>
          </div>
        </div>
      </div>

      {{-- <div class="row gutters-sm">
        <div class="col-sm-6 mb-3">
          <div class="card h-100">
            <div class="card-body">
              <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Sales Status</h6>
              <small>Sales</small>
              <div class="progress mb-3" style="height: 5px">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-sm-6 mb-3">
          <div class="card h-100">
            <div class="card-body">
              <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Order Status</h6>
              <small>Total Order</small>
              <div class="progress mb-3" style="height: 5px">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}



    </div>
    <div class="col-md-12">
      <div class="card mb-3">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Address</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->address ?? 'Edit Profile' }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">NID</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->nid ?? 'Edit Profile' }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0"> Date of Birth</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->dob ?? 'Edit Profile'}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0"> Gender</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->gender ?? 'Edit Profile' }}
            </div>
          </div>
          <hr>
          <div class="row">
           <div class="col-sm-3">
              <h6 class="mb-0">Blood Group</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->blood_group ?? 'Edit Profile'}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Marital Status</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->marital_status ?? 'Edit Profile'}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Father Phone</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->father_phone ?? 'Edit Profile'}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Parent Address</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->parent_address ?? 'Edit Profile'}}
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Current Year</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $profile->current_year ?? 'Edit Profile'}}
            </div>
          </div>
          {{-- <hr> --}}
        </div>
      </div>

      {{-- <div class="row gutters-sm">
        <div class="col-sm-6 mb-3">
          <div class="card h-100">
            <div class="card-body">
              <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Sales Status</h6>
              <small>Sales</small>
              <div class="progress mb-3" style="height: 5px">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-sm-6 mb-3">
          <div class="card h-100">
            <div class="card-body">
              <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Order Status</h6>
              <small>Total Order</small>
              <div class="progress mb-3" style="height: 5px">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}



    </div>
  </div>

</div>
</div>

<style>

body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

  </style>

</x-backend.layouts.master>