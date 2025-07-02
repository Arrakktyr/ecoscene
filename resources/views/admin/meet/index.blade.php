@extends('layouts.admin_layout')

@section('title', 'News')


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
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Create news</a>
            </div>
            <p></p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">News</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-responsive-md mb-0">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($news))
                                @foreach($news as $n)


                                    <tr>
                                       
                                        <td>{{ $event->getSummary() }}</strong><br>
            🕓 {{ \Carbon\Carbon::parse($event->getStart()->getDateTime())->format('d.m.Y H:i') }}
            - {{ \Carbon\Carbon::parse($event->getEnd()->getDateTime())->format('H:i') }}</td>
                                        <td> @if(str_contains($event->getDescription(), 'онлайн'))
                                                Онлайн
                                            @else
                                                Офлайн
                                            @endif
                                        </td>
                                        <td class="actions" style="display:flex">
                                            <a href="{{ route('admin.news.edit', $n->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('admin.news.destroy', ['id' => $n->id]) }}" method="POST">
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
