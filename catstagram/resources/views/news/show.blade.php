@extends('layouts.app')

@section('content')
    <h1>{{ $news->title }}</h1>
    <p>{{ $news->content }}</p>
    @if ($news->cover_image)
        <img src="{{ asset('storage/' . $news->cover_image) }}" alt="Cover Image" style="max-width: 500px;">
    @endif
    <p><strong>Published on:</strong> {{ $news->publish_date->format('d M Y') }}</p>
    <a href="{{ route('news.index') }}" class="btn btn-secondary">Back to News</a>
@endsection