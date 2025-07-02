@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Person or Company</label>
                            <div class="col-md-6">
                                <select name="pandc" class="form-control">
                                    <option>Person</option>
                                    <option>Company</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">Country</label>
                            <div class="col-md-6" style="position: relative;">
                                <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required autocomplete="off">
                                <div id="country-list"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    $(document).ready(function() {
        $('#country').on('input', function() {
            var query = $(this).val();
            if (query.length > 1) {
                $.ajax({
                    url: '/api/countries',
                    data: { search: query },
                    success: function(data) {
                        $('#country-list').empty();
                        if (data.length > 0) {
                            data.forEach(function(country) {
                                $('#country-list').append('<div class="country-item">' + country.title_en + '</div>');
                            });

                            // Показать список, если есть результаты
                            $('#country-list').show();

                            // Добавить событие клика на элементы списка
                            $('.country-item').on('click', function() {
                                $('#country').val($(this).text());
                                $('#country-list').empty().hide();
                            });
                        } else {
                            // Скрыть список, если нет результатов
                            $('#country-list').hide();
                        }
                    }
                });
            } else {
                // Скрыть список, если введено менее 3 символов
                $('#country-list').empty().hide();
            }
        });
    });
</script>

<style>
    #country-list {
        display: none; /* Скрыт по умолчанию */
        border: 1px solid #dee2e6;
        max-height: 150px;
        overflow-y: auto;
        position: absolute;
        background: #f8fafc;
        width: calc(100% - 24px);
    }
    .country-item {
        padding: 5px 10px;
        cursor: pointer;
    }
    .country-item:hover {
        background-color: #f0f0f0;
    }
</style>
@endsection
