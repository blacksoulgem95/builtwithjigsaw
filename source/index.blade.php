@extends('_layouts.master')

@section('body')
<h1 class="mb-4">Built with Jigsaw</h1>

@foreach ($sites->sortByDesc('added')->groupBy('added') as $date => $sites)
    <h3 class="mt-6 mb-2">Added {{ Datetime::createFromFormat('U', $date)->format('M d, Y') }}:</h3>
    <ul>
        @foreach ($sites->sortBy('title') as $site)
        <li class="mb-2">
            <a href="{{ $site->url }}">{{ $site->title }}</a> (by {{ implode($site->authors, ', ') }})
            @if ($site->repo)
            <small> ---- OPEN SOURCE: <a href="{{ $site->repo }}">{{ $site->repo }}</a></small>
            @endif
        </li>
        @endforeach
    </ul>
@endforeach

<h1 class="mt-8 mb-4">Articles about Jigsaw</h1>

<ul>
@foreach ($articles as $article)
    <li class="mb-2">
        <a href="{{ $article->url }}">{{ $article->title }}</a><br>
        <span class="text-grey-darker">by {{ $article->author }} on {{ DateTime::createFromFormat('U', $article->published)->format('M d, Y') }}</span>
    </li>
@endforeach
</ul>
@endsection
