@extends('layouts.general_layout')

@section('title', "Ecoscen's library")

@section('content')



    <div class="container">
         <div class="items" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
            @if(!empty($podcasts))
            @foreach($podcasts as $result)
                <div class="item" style="width: 30%;">

                    <p>
                        <img style="width: 200px;" src="{{ asset('storage/' . $result['img']) }}" alt="Podcast Image">
                    </p>
                    <a href="{{ $result['link'] }}" target="_blanc"><strong>{{ $result['title']}}</strong></a><br>
                    <p>{!! Str::limit($result['content'], 150) !!}</p> <!-- Ограничиваем контент для удобства -->
                    
                    <hr>
                </div>
            @endforeach

        @else
            <p>No results found.</p>
        @endif
    </div>
      </div>


@endsection



