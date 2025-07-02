@extends('layouts.admin_layout')

@section('title', 'Create podcast')


@section('content')
    <div class="container">
        <h1>Create podcast</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.podcast.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180 }'>{{ old('content') }}</textarea>
                <!--<textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>-->
            </div>


            <p></p>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
