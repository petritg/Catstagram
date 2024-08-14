@extends('layouts.app')

@section('content')
    <h1>Edit News</h1>
    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $news->title) }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control">{{ old('content', $news->content) }}</textarea>
        </div>
        <div class="form-group">
            <label for="cover_image">Cover Image</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control-file">
            @if ($news->cover_image)
                <img src="{{ asset('storage/' . $news->cover_image) }}" alt="Cover Image" style="max-width: 200px;">
            @endif
        </div>
        <div class="form-group">
            <label for="publish_date">Publish Date</label>
            <input type="date" name="publish_date" id="publish_date" class="form-control" value="{{ old('publish_date', $news->publish_date->format('Y-m-d')) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection