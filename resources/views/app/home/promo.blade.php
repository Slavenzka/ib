<section id="promo" class="flex flex-column justify-center rellax">
    <div class="container text-center">
        <h1 class="section-title">
            <revealer class="inline-flex" :params="{direction: 'rl'}">
                @lang('page.home.promo.title')
            </revealer>
        </h1>

        <h2 class="section-title--sm">
            <revealer class="text-light" :params="{direction: 'lr', bgcolor: '#353535'}">
                @lang('page.home.promo.subtitle')
            </revealer>
        </h2>

        <div class="mt-10">
            <revealer :params="{direction: 'bt'}">
                <a href="{{ route('app.brief.index') }}" class="button button--primary">
                    @lang('buttons.discuss')
                </a>
            </revealer>
        </div>
    </div>
</section>
