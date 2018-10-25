@if (app('router')->currentRouteName() !== 'app.contact.thanks')
    <footer id="app-footer">
        <div class="container">
            <div class="contact-us maw-lg-80 mx-auto">
                <h2 class="section-title section-title--sm text-center mb-10">
                    <revealer :params="{direction: 'rl'}">
                        @lang('forms.contact-us.title')
                    </revealer>
                </h2>

                <div class="grid">
                    <div class="w-md-6/12">
                        <h4 class="mb-8">
                            <revealer item="div" :params="{bgcolor: '#fff'}" class="inline-flex">
                                Impression Bureau
                            </revealer>
                        </h4>
                        <p class="mb-2">
                            <a class="underline" href="mailto:info@impressionbureau.pro">info@impressionbureau.pro</a>
                        </p>
                        <p class="mb-8">
                            <a href="tel:+380688624063" class="underline">
                                +380 68 862 4063
                            </a>
                        </p>
                        {{--<p class="flex">--}}
                            {{--@foreach(\App\Models\App::$SOCIAL as $key => $item)--}}
                                {{--<a href="{{ $item }}" class="{{ !$loop->last ? 'mr-3' : '' }}">--}}
                                    {{--<svg width="20" height="20"--}}
                                         {{--style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;fill: #fff;">--}}
                                        {{--<use xlink:href="#icon-{{ $key }}"></use>--}}
                                    {{--</svg>--}}
                                {{--</a>--}}
                            {{--@endforeach--}}
                        {{--</p>--}}
                    </div>

                    <div class="w-md-6/12">
                        <h4 class="mb-8">
                            <revealer>
                                @lang('page.footer.write_to_us')
                            </revealer>
                        </h4>

                        <form action="{{ route('app.contact.send') }}" method="post">
                            @csrf
                            <div class="control{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control__label">
                                    <span class="control__name">@lang('forms.contact-us.fields.name')</span>
                                    <input type="text" name="name" class="control__input" required>
                                </label>
                            </div>

                            <div class="control{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control__label">
                                    <span class="control__name">@lang('forms.contact-us.fields.email')</span>
                                    <input type="email" name="email" class="control__input" required>
                                </label>
                            </div>

                            <div class="control{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label class="control__label">
                                    <span class="control__name">@lang('forms.contact-us.fields.phone')</span>
                                    <input type="tel" name="phone" class="control__input" required>
                                </label>
                            </div>

                            <button class="button button--primary">
                                @lang('buttons.send')
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                &copy; {{ date('Y') }} <a href="{{ route('app.home') }}" class="underline">Impression.Bureau</a>
            </div>
        </div>
    </footer>
@endif
