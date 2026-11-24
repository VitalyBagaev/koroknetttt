<!DOCTYPE html>
<html lang="en">

<x-head />

<body>
    <x-header />
    <main class="container ">
        @if (Auth::user()->role == 'admin')
            <h1 class="mb-4">Все доступные курсы</h1>
            <div class="container pb-5">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                    <a class="btn btn-primary mt-auto" href="{{ Route('courseform') }}">Добавить курс</a>
                </div>
                <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-4">
                    @foreach ($courses as $course)
                        <div class="col">
                            <div class="card" style="width: 300px;">
                                <img src="{{ asset($course->photo) }}" class="card-img-top w-100 object-fit-cover"
                                    style="height: 220px" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->course_name }}</h5>
                                    <p class="card-text">{{ $course->description }}</p>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Действие
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ Route('delete', [$course->id]) }}"
                                                    class="dropdown-item">Удалить</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{ Route('courseeditform', [$course->id]) }}">Редактировать</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </main>
    <x-script />
</body>

</html>