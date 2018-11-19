<section id="technologies" class="rellax" data-rellax-speed="2">
    <div class="container">
        <h2 class="text-center section-title section-title--sm mb-2">
            <revealer :params="{direction: 'rl'}">
                @lang('page.home.tech.title')
            </revealer>
        </h2>
        <p class="text-center">
            <revealer :params="{direction: 'lr', bgcolor: '#353535'}">
                @lang('page.home.tech.subtitle')
            </revealer>
        </p>

        <div class="flex align-center justify-center">
            @foreach(\App\Models\App::$TECHS as $key => $tech)
                @php
                $dir = array_random(['lr', 'rl', 'bt', 'tb']);
                @endphp
                <revealer class="tech-item flex align-center justify-center m-4" :params="{direction: {{ "'$dir'" }}}">
                    <div class="mb-2 squire-50"><img src="{{ asset('images/icons/'.$key.'.svg') }}" alt="{{ $tech }}" title="{{ $tech }}"></div>
                    <small class="lh-1">{{ ucfirst($tech) }}</small>
                </revealer>
            @endforeach
        </div>

        <div class="maw-lg-80 mx-auto">
            <div class="grid mt-8 capabilities text-center">
                @foreach(trans('page.home.tech.capabilities') as $item)
                    <div class="w-md-6/12 capability">
                        <span class="capability__number mb-2">{{ $loop->iteration }}</span>
                        <h4>
                            <revealer :params="{bgcolor: '#353535', direction: 'rl'}">
                                {{ $item['title'] }}
                            </revealer>
                        </h4>
                        <p class="mb-0">{{ $item['body'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
