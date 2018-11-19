@extends('layouts.app', ['app_title' => trans('page.title.brief')])

@section('content')

    <section id="brief">
        <div class="container content">

            <div class="maw-lg-80 mx-auto">
                <form action="{{ route('app.brief.store') }}" method="post">
                    @csrf

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.contact.title')</revealer>
                        </h4>
                        <div class="control{{ $errors->has('contact.name') ? ' has-errors' : '' }}">
                            <label class="control__label-static" for="#f1">@lang('page.brief.contact.f1')</label>
                            <input id="f1" type="text" name="contact[f1]" class="control__input" required>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f2">@lang('page.brief.contact.f2')</label>
                            <input id="f2" type="text" name="contact[f2]" class="control__input">
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f3">@lang('page.brief.contact.f3')</label>
                            <input id="f3" type="text" name="contact[f3]" class="control__input">
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f4">@lang('page.brief.contact.f4')</label>
                            <input id="f4" type="text" name="contact[f4]" class="control__input" required>
                        </div>

                        <div class="control{{ $errors->has('contact.employer_phone') ? ' has-errors' : '' }}">
                            <label class="control__label-static" for="#f5">@lang('page.brief.contact.f5')</label>
                            <input id="f5" type="text" name="contact[f5]" class="control__input" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.company.title')</revealer>
                        </h4>
                        <div class="control">
                            <label class="control__label-static" for="#f6">@lang('page.brief.company.f1')</label>
                            <textarea id="f6" name="company[f1]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f7">@lang('page.brief.company.f2')</label>
                            <textarea id="f7" name="company[f2]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f8">@lang('page.brief.company.f3')</label>
                            <textarea id="f8" name="company[f3]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f9">@lang('page.brief.company.f4')</label>
                            <textarea id="f9" name="company[f4]" rows="4" class="control__input"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.target.title')</revealer>
                        </h4>
                        <div class="control">
                            <label class="control__label-static" for="#f10">@lang('page.brief.target.f1')</label>
                            <textarea id="f10" name="target[f1]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f11">@lang('page.brief.target.f2')</label>
                            <textarea id="f11" name="target[f2]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f12">@lang('page.brief.target.f3')</label>
                            <textarea id="f12" name="target[f3]" rows="4" class="control__input"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.group.title')</revealer>
                        </h4>
                        <div class="control">
                            <label class="control__label-static" for="#f13">@lang('page.brief.group.f1')</label>
                            <input id="f13" type="text" name="group[f1]" class="control__input">
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f14">@lang('page.brief.group.f2')</label>
                            <input id="f14" type="text" name="group[f2]" class="control__input">
                        </div>

                        <div class="control">
                            <label class="control__label-static" for="#f15">@lang('page.brief.group.f3')</label>
                            <input id="f15" type="text" name="group[f3]" class="control__input">
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.functional.title')</revealer>
                        </h4>

                        <div class="control">
                            <label class="control__label-static" for="#f16">@lang('page.brief.functional.f1')</label>
                            <textarea id="f16" name="functional[f1]" rows="10" class="control__input"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>
                            <revealer>@lang('page.brief.design.title')</revealer>
                        </h4>

                        <div class="control">
                            <label class="control__label-static" for="#f17">@lang('page.brief.design.f1')</label>
                            <textarea id="f17" name="design[f1]" rows="4" class="control__input"></textarea>
                        </div>

                        <div class="control">
                            <div class="control__label-static">@lang('page.brief.design.f2')</div>
                            <div class="grid">
                                <div class="c">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" name="design[f2]"
                                               class="custom-control-input" id="df2p"
                                               value="@lang('page.brief.variants.yes')">
                                        <label class="custom-control-label" for="df2p">
                                            @lang('page.brief.variants.yes')
                                        </label>
                                    </div>
                                </div>
                                <div class="c">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" name="design[f2]"
                                               class="custom-control-input" id="df2n"
                                               value="@lang('page.brief.variants.no')">
                                        <label class="custom-control-label" for="df2n">
                                            @lang('page.brief.variants.no')
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="control">
                            <div class="control__label-static">@lang('page.brief.design.f3')</div>
                            <div class="grid">
                                <div class="c">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" name="design[f3]"
                                               class="custom-control-input" id="df3p"
                                               value="@lang('page.brief.variants.yes')">
                                        <label class="custom-control-label" for="df3p">
                                            @lang('page.brief.variants.yes')
                                        </label>
                                    </div>
                                </div>
                                <div class="c">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" name="design[f3]"
                                               class="custom-control-input" id="df3n"
                                               value="@lang('page.brief.variants.no')">
                                        <label class="custom-control-label" for="df3n">
                                            @lang('page.brief.variants.no')
                                        </label>
                                    </div>
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
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" name="hosting[f1.label]"
                                               class="custom-control-input" id="hf1p"
                                               value="@lang('page.brief.hosting.f1.yes')">
                                        <label class="custom-control-label" for="hf1p">
                                            @lang('page.brief.hosting.f1.yes')
                                        </label>
                                    </div>
                                </div>
                                <div class="c">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" name="hosting[f1.label]"
                                               class="custom-control-input" id="hf1n"
                                               value="@lang('page.brief.hosting.f1.no')">
                                        <label class="custom-control-label" for="hf1n">
                                            @lang('page.brief.hosting.f1.no')
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="control">
                                <label class="control__label-static" for="#f18">@lang('page.brief.hosting.f2')</label>
                                <input id="f18" type="text" name="hosting[f2]" class="control__input">
                            </div>

                            {{--<div class="control">--}}
                                {{--<label class="control__label-static" for="#f19">@lang('page.brief.hosting.f3')</label>--}}
                                {{--<div class="grid">--}}
                                    {{--<div class="c">--}}
                                        {{--<label>--}}
                                            {{--<input type="radio" name="hosting[f3]" class="control__input mr-2"--}}
                                                   {{--value="@lang('page.brief.variants.yes')">--}}
                                            {{--@lang('page.brief.variants.yes')--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="c">--}}
                                        {{--<label>--}}
                                            {{--<input type="radio" name="hosting[f3]" class="control__input mr-2"--}}
                                                   {{--value="@lang('page.brief.variants.no')">--}}
                                            {{--@lang('page.brief.variants.no')--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="control">
                                <label class="control__label-static" for="#f20">@lang('page.brief.hosting.f4')</label>
                                <textarea id="f20" name="hosting[f4]" rows="4" class="control__input"></textarea>
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
