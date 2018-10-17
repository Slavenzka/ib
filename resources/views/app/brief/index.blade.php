@extends('layouts.app', ['app_title' => trans('page.title.brief')])

@section('content')

    <section id="brief" class="content">
        <div class="container">

            <div class="maw-lg-80 mx-auto">
                <form action="{{ route('app.brief.store') }}" method="post">
                    @csrf

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.contact.title')</revealer>
                        </h4>
                        <div class="control{{ $errors->has('contact.name') ? ' has-errors' : '' }}">
                            <label class="control__label-static" for="#f1">@lang('page.brief.contact.f1')</label>
                            <input id="f1" type="text" name="contact[name]" class="control__input" required>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f2">@lang('page.brief.contact.f2')</label>
                            <input id="f2" type="text" name="contact[site]" class="control__input">
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f3">@lang('page.brief.contact.f3')</label>
                            <input id="f3" type="text" name="contact[address]" class="control__input">
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f4">@lang('page.brief.contact.f4')</label>
                            <input id="f4" type="text" name="contact[employer_name]" class="control__input" required>
                        </div>

                        <div class="control{{ $errors->has('contact.employer_phone') ? ' has-errors' : '' }}">
                            <label class="control__label-static" for="#f5">@lang('page.brief.contact.f5')</label>
                            <input id="f5" type="text" name="contact[employer_phone]" class="control__input" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.contact.title')</revealer>
                        </h4>
                        <div class="control">
                            <label class="control__label-static" for="#f6">@lang('page.brief.company.f1')</label>
                            <textarea id="f6" name="company[description]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f7">@lang('page.brief.company.f2')</label>
                            <textarea id="f7" name="company[products]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f8">@lang('page.brief.company.f3')</label>
                            <textarea id="f8" name="company[competitors]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f9">@lang('page.brief.company.f4')</label>
                            <textarea id="f9" name="company[advantages]" rows="4" class="control__input"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.target.title')</revealer>
                        </h4>
                        <div class="control">
                            <label class="control__label-static" for="#f10">@lang('page.brief.target.f1')</label>
                            <textarea id="f10" name="target[target]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f11">@lang('page.brief.target.f2')</label>
                            <textarea id="f11" name="target[channels]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f12">@lang('page.brief.target.f3')</label>
                            <textarea id="f12" name="target[situations]" rows="4" class="control__input"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.group.title')</revealer>
                        </h4>
                        <div class="control">
                            <label class="control__label-static" for="#f13">@lang('page.brief.group.f1')</label>
                            <input id="f13" type="text" name="group[1]" class="control__input">
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f14">@lang('page.brief.group.f2')</label>
                            <input id="f14" type="text" name="group[2]" class="control__input">
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f15">@lang('page.brief.group.f3')</label>
                            <input id="f15" type="text" name="group[3]" class="control__input">
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.functional.title')</revealer>
                        </h4>

                        <div class="control">
                            <label class="control__label-static" for="#f16">@lang('page.brief.functional.f1')</label>
                            <textarea id="f16" name="functional[0]" rows="10" class="control__input"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.design.title')</revealer>
                        </h4>

                        <div class="control">
                            <label class="control__label-static" for="#f17">@lang('page.brief.design.f1')</label>
                            <textarea id="f17" name="design[examples]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <div class="control__label-static">@lang('page.brief.design.f2')</div>
                            <div class="grid">
                                <div class="c">
                                    <label>
                                        <input type="radio" name="design[style]" class="control__input mr-2" value="1">
                                        @lang('page.brief.variants.yes')
                                    </label>
                                </div>
                                <div class="c">
                                    <label>
                                        <input type="radio" name="design[style]" class="control__input mr-2" value="0">
                                        @lang('page.brief.variants.no')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="control">
                            <div class="control__label-static">@lang('page.brief.design.f3')</div>
                            <div class="grid">
                                <div class="c">
                                    <label>
                                        <input type="radio" name="design[materials]" class="control__input mr-2" value="1">
                                        @lang('page.brief.variants.yes')
                                    </label>
                                </div>
                                <div class="c">
                                    <label>
                                        <input type="radio" name="design[materials]" class="control__input mr-2" value="0">
                                        @lang('page.brief.variants.no')
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.hosting.title')</revealer>
                        </h4>

                        <div class="control">
                            <div class="control__label-static">@lang('page.brief.hosting.f1.label')</div>
                            <div class="grid">
                                <div class="c">
                                    <label>
                                        <input type="radio" name="hosting[needle]" class="control__input mr-2" value="1">
                                        @lang('page.brief.hosting.f1.yes')
                                    </label>
                                </div>
                                <div class="c">
                                    <label>
                                        <input type="radio" name="hosting[needle]" class="control__input mr-2" value="0">
                                        @lang('page.brief.hosting.f1.no')
                                    </label>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="control">
                                <label class="control__label-static" for="#f18">@lang('page.brief.hosting.f2')</label>
                                <input id="f18" type="text" name="hosting[domain]" class="control__input">
                            </div>

                            <div class="control">
                                <label class="control__label-static" for="#f19">Требуется ли хостинг</label>
                                <div class="grid">
                                    <div class="c">
                                        <label>
                                            <input type="radio" name="hosting[hosting]" class="control__input mr-2" value="1">
                                            @lang('page.brief.variants.yes')
                                        </label>
                                    </div>
                                    <div class="c">
                                        <label>
                                            <input type="radio" name="hosting[hosting]" class="control__input mr-2" value="0">
                                            @lang('page.brief.variants.no')
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="control">
                                <label class="control__label-static" for="#f20">@lang('page.brief.hosting.f3')</label>
                                <textarea id="f20" name="hosting[params]" rows="4" class="control__input"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button class="button button--primary">
                            @lang('buttons.send')
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

@endsection
