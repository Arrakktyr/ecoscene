@extends('layouts.admin_layout')

@section('title', 'Edit Meet')


@section('content')
    <div class="container">
        <h1>Edit Meet</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('meet.update', $event->getId()) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Название встречи:</label><br>
            <input type="text" name="summary" value="{{ $event->getSummary() }}" required><br><br>

            <label>Дата и время начала:</label><br>
            <input type="datetime-local" name="start_time"
                value="{{ \Carbon\Carbon::parse($event->getStart()->getDateTime())->format('Y-m-d\TH:i') }}"
                required><br><br>

            <label>Дата и время окончания:</label><br>
            <input type="datetime-local" name="end_time"
                value="{{ \Carbon\Carbon::parse($event->getEnd()->getDateTime())->format('Y-m-d\TH:i') }}"
                required><br><br>

            <label>Тип встречи:</label><br>
            <select name="meeting_type" required>
                <option value="online" {{ $event->meeting_type == 'online' ? 'selected' : '' }}>Онлайн</option>
                <option value="offline" {{ $event->meeting_type == 'offline' ? 'selected' : '' }}>Офлайн</option>
            </select><br><br>

            <button type="submit">Сохранить</button>
        </form>
    </div>
@endsection
