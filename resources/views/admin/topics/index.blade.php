@extends('layouts.admin_layout')

@section('title', 'Topics')


@section('content')
    <div class="container">
        <h1>@yield('title')</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.topic.create') }}" class="btn btn-primary">Create topic</a>
            </div>
            <p></p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">Topics</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-responsive-md mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Level</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($topics))
                            @foreach($topics as $topic)


                            <tr>
                                <td>{{$topic->id}}</td>
                                <td>{{$topic->title}}</td>
                                <td></td>
                                <td class="actions" style="display:flex">
                                    <a href="{{ route('admin.topic.edit', $topic->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('admin.topic.destroy', ['id' => $topic->id]) }}" method="POST">
                                        @csrf
                                        <button style="border:none; background: none" type="submit" class="delete-row"><i class="far fa-trash-alt"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                                @endif


                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
