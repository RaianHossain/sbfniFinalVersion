<x-frontend.layouts.master>
<section class="section breadcrumb-modern context-dark parallax-container text-center" data-parallax-img="{{ asset('ui/frontend/images/slider/bannar.png') }}">
        <div class="parallax-content section-30 section-sm-70">
            <div class="shell">
                <h2 class="veil reveal-sm-block" style="color:yellow;">Messages</h2>
                <div class="offset-sm-top-35">
                    <ul class="list-inline list-inline-lg list-inline-dashed p">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li style="color:yellow;">Message&nbsp;</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@php
  $President = App\Models\GreetingMessage::where('message_by', 'President')->first();
@endphp
{{--Principal,CEO &  Chairman Section--}}
<section class="#" style=" padding-top:20px; padding-bottom:20px; background-color: #FFF8EF; ">
    <div class="row">
      <div class="col">
        <div class="d-flex justify-content-between">
          <div class="media block-6 d-block text-center">
            <a href="#">
              <div class="box  d-flex justify-content-center align-items-center mt-5 mb-3">
                <img src="{{ asset('storage/greeting/' . $President->img ?? '') }}" class="d-block  mx-auto mt-2 " alt="..." style=" width:150px; height:150px;  border-radius:50%; border:2px solid #e2b75a">
              </div>
            </a>
            <div class="title media-body p-2 mt-3">
              <h3 class="heading  mt-3" style="margin:0 auto; ">President</h3>
              <p class="mb-0" style="margin:0 auto; font-size: 14px; color: #000000; font-weight: 500;">{{ $President->name ?? '' }}</p>
              <p class="">{{ $President->greeting_messages ?? '' }} </p>
            </div>
          </div>
          <div class="vertical"></div>
        </div>
      </div>
    </div>
    </div>
  </section>


</x-frontend.layouts.master>