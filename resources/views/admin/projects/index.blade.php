@extends('layouts.admin')

@section('content')
    <div class="text-center py-3">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Add new project</a>
    </div>
    <div class="ms_container">
        @foreach ($projects as $project)
        <a class="project-link" href="{{ route('admin.projects.show', $project) }}">
            <div class="project-card mb-4  d-flex">
                <div class="type">
                    @if ($project->type?->type === 'HTML/CSS' )
                        <img src="https://www.seekpng.com/png/detail/141-1415455_clip-black-and-white-library-collection-of-free.png"
                            alt="">
                    @elseif($project->type?->type === 'PHP')
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png"
                            alt="">
                    @elseif($project->type?->type === 'Laravel')
                        <img src="https://www.coine.it/wp-content/uploads/2022/03/laravel-featured.png" alt="">
                    @elseif($project->type?->type ==='VueJs')
                        <img src="https://avatars.githubusercontent.com/u/6128107?s=200&v=4" alt="">
                    @elseif($project->type?->type === 'Js')
                        <img src="https://w7.pngwing.com/pngs/172/554/png-transparent-javascript-html-computer-software-web-browser-watermark-angle-text-rectangle.png"
                            alt="">
                    @elseif($project->type?->type ==='Vite')
                        <img src="https://vitejs.dev/logo-with-shadow.png" alt="">
                    @endif
                </div>
                <div class="details text-start">
                    <div class="project-description">
                        <h6>{{ $project->type?->type . ' - ' . $project->title }}</h6>
                        <p>{{ $project->description }}</p>
                    </div>
                    <ul class="tags">
                        <span>tags:</span>
                        @foreach ($project->technologies as $technology)
                            <li class="tags-links">{{ $technology->name }}{{ $loop->last ? "" : "," }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </a>
        @endforeach
    </div>
@endsection
