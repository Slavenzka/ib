<section id="promo" class="flex flex-column justify-center">
    <video src="{{ asset('videos/promo.mp4') }}" id="lights" loop autoplay muted></video>
    <div class="container text-center">
        <h1 class="section-title">
            <revealer class="inline-flex" :params="{direction: 'rl'}">
                {{ __('page.home.promo.title') }}
            </revealer>
        </h1>

        <h2 class="section-title--sm">
            <revealer class="text-light" :params="{direction: 'lr', bgcolor: '#353535'}">
                {{ __('page.home.promo.subtitle') }}
            </revealer>
        </h2>

        <div class="mt-8 flex justify-center">
            <div class="mx-4 my-2">
                <a href="{{ route('app.brief.index') }}" class="button button--primary button--xl">
                    {{ __('buttons.fill_brief') }}
                </a>
            </div>
            <div class="mx-4 my-2">
                <button v-scroll-to="'contact-us'" class="button button--primary button--xl">
                    {{ __('buttons.discuss') }}
                </button>
            </div>
        </div>
    </div>
</section>
