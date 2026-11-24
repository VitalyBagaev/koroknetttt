<!DOCTYPE html>
<html lang="en">

<x-head />

<body>

    <x-header />
    <div class="container pb-5" style="max-width: 760px;">
        <h1 class="mb-4">
            @isset($course)
                Редактировать
            @else
                Добавить
            @endisset курс
        </h1>
        <form
            action="@isset($course) {{ Route('courseedit', [$course->id]) }}@else {{ Route('courseadd') }}@endisset"
            method="POST" class="card card-body shadow-sm" enctype="multipart/form-data">@csrf
            <div class="mb-3"><label for="name" class="form-label">Название курса</label><input class="form-control"
                    id="name" name="course_name"
                    @isset($course) value="{{ $course->course_name }}" @endisset
                    value=" {{ old('course_name') }}">
                @error('course_name')
                    <div class="alert alert-danger">{{ $message }}
                    </div>
                @enderror
            </div><br>
            <div class="mb-3"><label for="name" class="form-label">Описание</label><input class="form-control"
                    id="name" name="description"
                    @isset($course) value="{{ $course->description }}" @endisset
                    value=" {{ old('description') }}">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}
                    </div>
                @enderror
            </div><br>
            <div class="mb-3">
                <label for="formFile" class="form-label">Выберите изображение</label>
                <input class="form-control" type="file" name="photo">
            </div>
            @error('photo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            @isset($course)
                <img src="{{ asset($course->photo) }}" class="overflow-hidden rounded" style="height: 250px;"
                    alt="...">
            @endisset
            <div class="d-flex gap-2"><button class="btn btn-primary" type="submit">Сохранить курс</button><a
                    class="btn btn-outline-secondary" href="{{ Route('index') }}">Отмена</a></div>
        </form>
    </div>


    <x-script />
</body>

</html>
