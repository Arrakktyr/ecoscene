@extends('layouts.admin_layout')

@section('title', 'Create Meet')


@section('content')
    <h1>Создать Google Meet встречу</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('meet.store') }}" method="POST">
    @csrf

    <label>Название встречи:</label><br>
    <input type="text" name="summary" value="{{ old('summary') }}" required><br><br>

    <label>Дата и время начала:</label><br>
    <input type="datetime-local" name="start_time" value="{{ old('start_time') }}" required><br><br>

    <label>Дата и время окончания:</label><br>
    <input type="datetime-local" name="end_time" value="{{ old('end_time') }}" required><br><br>

    <label>Тип встречи:</label><br>
    <select name="meeting_type" required>
        <option value="online" {{ old('meeting_type') == 'online' ? 'selected' : '' }}>Онлайн</option>
        <option value="offline" {{ old('meeting_type') == 'offline' ? 'selected' : '' }}>Офлайн</option>
    </select><br><br>

    <button type="submit">Создать</button>
</form>
@endsection
    
