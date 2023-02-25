<div class="slider multipost">
    <div class="owl-carousel owl-theme" id="post-slider-multipost">

        @php
            $sliders = DB::table('sliders')
                ->select('sliders.*')
                ->get();
        @endphp

        @forelse ($sliders as $slider)
            <a href="{{ $slider->productUrl }}">
                <div class="item">
                    <div class="image">
                        <div class="img" style="background-image:url({{ asset($slider->productFile) }});"></div>
                    </div>
                    <div class="content">
                        <div class="title">
                            <span>{{ $slider->title ?? '' }}</span>
                        </div>
                    </div>
                </div>
            </a>
        @empty
        @endforelse



        {{-- <div class="owl-nav">
            <div class="owl-prev"><img src="{{ asset('newFrontEnd/arrow-left-white.svg') }}" alt="arrow"></div>
            <div class="owl-next"><img src="{{asset('newFrontEnd/arrow-right-white.svg')}}" alt="arrow"></div>
        </div> --}}



    </div>
</div>
