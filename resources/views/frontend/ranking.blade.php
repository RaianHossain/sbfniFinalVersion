<x-frontend.layouts.master>
    <section class="section breadcrumb-modern context-dark parallax-container text-center"
        data-parallax-img="{{ asset('ui/frontend/images/slider/bannar.png') }}">
        <div class="parallax-content section-30 section-sm-70">
            <div class="shell">
                <h2 class="veil reveal-sm-block">Ranking</h2>
                <div class="offset-sm-top-35">
                    <ul class="list-inline list-inline-lg list-inline-dashed p">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="text-white">Ranking&nbsp;</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Ranking Section --}}
    <section class=" pb-5 bg-catskill" style="padding-top:80px;">
        <div class="shell isotope-wrap">
            <h1 class="main text-center" style="color:#002833;"><b>Our Ranking</b></h1>
            <p class="text-grey mb-5 text-center">See our Institution's Ranking</p>
            <hr class="divider bg-madison" />
            <div class="container">
                <div class="row">
                    @forelse ($rankings as $ranking)
                        <div class="col-lg-3 col-md-3 col-sm-12 py-2 d-flex justify-content-center"
                            style="padding-top:8px;">
                            <div class="card" style="width: 25rem;">
                                <img src="{{ asset('storage/ranking/' . $ranking->img) }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="text-center" style="color:#999999">Ranking By: {{ $ranking->rank_name }}
                                    </h5>
                                    <h5 class="text-center" style="color:#5F9EA0">Our Position:
                                        {{ $ranking->rank_position }}</h5>
                                    <h6 class="text-center" style="color:#5F9EA0">Ranking Year:
                                        {{ $ranking->rank_year }}</h6>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center"> No Ranking </p>
                    @endforelse

                </div>
            </div>
        </div>
    </section>
</x-frontend.layouts.master>
