@extends('layouts.admin_layout')

@section('title', 'Edit podcast')


@section('content')
    <div class="container">
        <h1>Edit podcast</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.podcast.update', ['id' => $podcast->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $podcast->title }}">
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" class="form-control" id="link" name="link" value="{{ $podcast->link }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180 }'>{{ $podcast->content }}</textarea>

            </div>

            <!-- Поле для загрузки изображения -->
            @if ($podcast->img)
                <div class="form-group">
                    <label>Current Image:</label>
                    <div>
                        <img src="{{ asset('storage/' . $podcast->img) }}" alt="Podcast Image" style="max-width: 200px;">
                    </div>
                </div>
            @endif
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>


            <p></p>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
