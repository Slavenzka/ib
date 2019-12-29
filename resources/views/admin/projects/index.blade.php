@extends('layouts.admin', ['title' => 'Проекты'])

@section('content')

    <div class="d-flex mb-4">
        <h1 class="h3 mb-0">Проекты</h1>
        <div class="ml-auto">
            <a href="{{ route('admin.crm.projects.create') }}" class="btn btn-primary">
                <svg width="14" height="14" fill="currentColor">
                    <use xlink:href="#add"></use>
                </svg>
                <span class="ml-2">Добавить проект</span>
            </a>
        </div>
    </div>

    <div class="timeline" v-dragscroll>
        @foreach($projects as $project)
            <div class="project">
                <header class="project__header">
                    <div class="row mb-2 align-items-center">
                        <h5 class="col mb-0 d-flex">
                            <div class="dot dot--{{ $project->status }}"></div>
                            <a href="{{ route('admin.crm.projects.show', $project->id) }}">{{ $project->title }}</a>
                        </h5>
                        <div class="col-auto">
                            <dropdown inline-template>
                                <div class="position-relative">
                                    <a href="#" class="btn btn-none btn-sm" role="button" @click.prevent="toggle">
                                        <svg width="12" height="12" fill="currentColor">
                                            <use xlink:href="#menu"></use>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" v-show="expanded">
                                        <a class="dropdown-item"
                                           href="{{ route('admin.crm.projects.edit', $project->id) }}">
                                            Изменить
                                        </a>
                                        <a class="dropdown-item"
                                           href="{{ route('admin.crm.projects.destroy', $project->id) }}">
                                            Удалить
                                        </a>
                                    </div>
                                </div>
                            </dropdown>
                        </div>
                    </div>

                    <div class="d-flex mb-2 small">
                        <div class="flex-1">
                            @foreach($project->tags as $tag)
                                <a href="{{ route('admin.crm.projects.index', \App\Http\Helper::makeFilter('tags', $tag->id)) }}"
                                   class="{{ request('tags') && in_array($tag->id, request('tags')) ? 'text-danger' : '' }}">
                                    #{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <svg width="9" height="9" fill="currentColor">
                                <use xlink:href="#chat"></use>
                            </svg>

                            <span class="ml-1">{{ $project->comments_count }}</span>
                        </div>
                    </div>

                    <text-collapsed>
                        {!! $project->description !!}
                    </text-collapsed>
                </header>
                <div class="project__body"></div>
                <div class="project__stages">
                    @foreach($project->stages as $stage)
                        <div class="stage mb-2">
                            <h6 class="d-flex">
                                <div class="dot dot--{{ $stage->status }}"></div>
                                <a href="{{ route('admin.crm.stages.edit', [$project->id, $stage->id]) }}">
                                    {{ $stage->title }}
                                </a>
                            </h6>

                            <text-collapsed class="mb-0">
                                {!! $stage->description !!}
                            </text-collapsed>

                            <div class="d-flex small mt-2">
                                <div class="mr-3 h6 mb-0">
                                    <strong>{{ $stage->price }}</strong>
                                </div>
                                <div class="ml-auto d-flex align-items-center">
                                    <svg width="9" height="9" fill="currentColor">
                                        <use xlink:href="#chat"></use>
                                    </svg>

                                    <span class="ml-1">{{ $stage->comments_count }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <a href="{{ route('admin.crm.stages.create', $project->id) }}" class="stage stage--button">
                        <svg width="12" height="12" fill="currentColor">
                            <use xlink:href="#add"></use>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    {{ $projects->appends(request()->except('page'))->links() }}

@endsection
