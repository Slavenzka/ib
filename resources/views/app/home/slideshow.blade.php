<section class="rellax">
    <div class="slideshow">
        <div class="slideshow__deco"></div>

        @foreach($works as $work)
            <div class="slide">
                <div class="slide__img-wrap">
                    <a href="{{ route('app.work.show', $work) }}" class="slide__link"></a>
                    <div class="slide__img" style="background-image: url({{ $work->image_medium }});"></div>
                </div>
                <div class="slide__side">{{ $work->type->title }}</div>
                <div class="slide__title-wrap">
                    <span class="slide__number">{{ $loop->iteration }}</span>
                    <h3 class="slide__title">{{ $work->title }}</h3>
                    <h4 class="slide__subtitle mb-0">{{ $work->description }}</h4>
                </div>
            </div>
        @endforeach

        <button class="slideshow-nav slideshow-nav--prev">
            <svg class="icon icon--navarrow-prev">
                <use xlink:href="#icon-navarrow"></use>
            </svg>
        </button>
        <button class="slideshow-nav slideshow-nav--next">
            <svg class="icon icon--navarrow-next">
                <use xlink:href="#icon-navarrow"></use>
            </svg>
        </button>
    </div>

    <div class="mt-8 text-center">
        <revealer :params="{direction: 'tb'}">
            <a href="{{ route('app.work.index') }}" class="button button--primary">
                @lang('buttons.all_works')
            </a>
        </revealer>
    </div>
</section>
