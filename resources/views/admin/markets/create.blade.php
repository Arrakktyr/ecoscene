@extends('layouts.admin_layout')

@section('title', 'Create product')


@section('content')
    <div class="container">
        <h1>Create product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.market.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageInput = document.getElementById('images');
        const previewArea = document.getElementById('image-preview-area');
        const mainImageIndexInput = document.getElementById('main_image_index');

        let fileList = [];

        // Обновить превью
        function renderPreviews() {
            previewArea.innerHTML = '';

            fileList.forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const wrapper = document.createElement('div');
                    wrapper.classList.add('image-box');
                    wrapper.setAttribute('data-index', index);

                    wrapper.innerHTML = `
                        <div class="image-wrapper ${index == mainImageIndexInput.value ? 'main-selected' : ''}">
                            <img src="${e.target.result}" style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                        <div class="d-flex justify-content-between mt-1">
                            <input type="radio" name="main_image_radio" value="${index}" ${index == mainImageIndexInput.value ? 'checked' : ''}>
                            <button type="button" class="btn btn-sm btn-danger remove-btn" data-index="${index}">&times;</button>
                        </div>
                    `;

                    // Выбор главной
                    wrapper.querySelector('input[type="radio"]').addEventListener('change', function () {
                        mainImageIndexInput.value = fileList.indexOf(file).toString();
                        renderPreviews(); // обновим рамки
                    });

                    // Удаление
                    wrapper.querySelector('.remove-btn').addEventListener('click', function () {
                        const removeIndex = parseInt(this.getAttribute('data-index'));
                        fileList.splice(removeIndex, 1);

                        // если удалили главную — сбросить
                        if (mainImageIndexInput.value == removeIndex) {
                            mainImageIndexInput.value = 0;
                        }

                        renderPreviews();
                    });

                    previewArea.appendChild(wrapper);
                };

                reader.readAsDataURL(file);
            });
        }

        // Когда выбрали файлы
        imageInput.addEventListener('change', function () {
            fileList = Array.from(this.files);
            renderPreviews();
        });

        // Сортировка drag-n-drop
        Sortable.create(previewArea, {
            animation: 150,
            onEnd: function (evt) {
                const oldIndex = evt.oldIndex;
                const newIndex = evt.newIndex;

                // Меняем местами файлы в массиве
                const movedItem = fileList.splice(oldIndex, 1)[0];
                fileList.splice(newIndex, 0, movedItem);

                // Обновляем индекс главной, если нужно
                if (mainImageIndexInput.value == oldIndex) {
                    mainImageIndexInput.value = newIndex;
                } else if (
                    mainImageIndexInput.value > oldIndex &&
                    mainImageIndexInput.value <= newIndex
                ) {
                    mainImageIndexInput.value = parseInt(mainImageIndexInput.value) - 1;
                } else if (
                    mainImageIndexInput.value < oldIndex &&
                    mainImageIndexInput.value >= newIndex
                ) {
                    mainImageIndexInput.value = parseInt(mainImageIndexInput.value) + 1;
                }

                renderPreviews();
            }
        });

        // При сабмите — пересоздаем input с нужными файлами
        document.querySelector('form').addEventListener('submit', function (e) {
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'images[]';
            input.multiple = true;
            input.style.display = 'none';

            const dataTransfer = new DataTransfer();
            fileList.forEach(file => dataTransfer.items.add(file));
            input.files = dataTransfer.files;

            this.appendChild(input);
        });
    });
</script>

<style>
    .image-box {
        position: relative;
        margin: 10px;
        text-align: center;
    }

    .image-wrapper {
        border: 2px solid #ccc;
        border-radius: 8px;
        padding: 4px;
        transition: border-color 0.2s;
    }

    .image-wrapper.main-selected {
        border-color: #28a745;
        box-shadow: 0 0 5px #28a745;
    }

    .remove-btn {
        margin-left: 5px;
        line-height: 1;
        font-size: 16px;
        padding: 2px 8px;
    }
</style>

@endsection
