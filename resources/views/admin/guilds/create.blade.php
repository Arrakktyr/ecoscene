@extends('layouts.admin_layout')

@section('title', 'Create guild')


@section('content')
    <div class="container">
        <h1>Create guild</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.guild.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="sstm">Say somethings to community members</label>
                <input type="text" class="form-control" id="sstm" name="sstm" value="{{ old('sstm') }}">
            </div>
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180 }'>{{ old('content') }}</textarea>
                <!--<textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>-->
            </div>

            <div class="form-group">
                <label for="topic_id">Topic</label>
                <select class="form-control" id="topic_id" name="topic_id">
                    @if(isset($topics))
                        @foreach($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                        @endforeach
                    @endif;
                </select>
            </div>
            <!-- Upload Input -->
            <div class="form-group">
                <label for="images">Upload Images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
            </div>

            <!-- Preview + main selection -->
            <div id="image-preview-area" class="d-flex flex-wrap gap-3 mt-3"></div>

            <!-- Hidden input for tracking main image -->
            <input type="hidden" name="main_image_index" id="main_image_index" value="0">
            
            <p></p>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
