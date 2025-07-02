@extends('layouts.admin_layout')

@section('title', 'Edit news')


@section('content')
    <div class="container">
        <h1>Edit news</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.news.update', ['id' => $news->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180 }'>{{ $news->content }}</textarea>

            </div>

            <div class="form-group">
                <label for="topic_id">Topic</label>
                <select class="form-control" id="topic_id" name="topic_id">
                    @if(isset($topics))
                        @foreach($topics as $topic)
                            @if($topic->id == $news->topic_id)
                                <option selected value="{{ $topic->id }}">{{ $topic->title }}</option>
                            @else
                                <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                            @endif
                        @endforeach
                    @endif;
                </select>
            </div>
            <p></p>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
