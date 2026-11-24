<!DOCTYPE html>
<html lang="en">

<x-head />

<body>

    <x-header />


    <div class="container pb-5">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ asset('storage/image15.jpg') }}" class="d-block w-100"
                        style="height: 400px; object-fit: cover">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('storage/image16.jpg') }}" class="d-block w-100"
                        style="height: 400px; object-fit: cover" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/image17.jpeg') }}" class="d-block w-100"
                        style="height: 400px; object-fit: cover" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/image18.webp') }}" class="d-block w-100"
                        style="height: 400px; object-fit: cover" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h1 class="mb-1">Доступные курсы</h1>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md- row-cols-xl-4 g-4">
            @foreach ($courses as $course)
                <div class="col">
                    <div class="card" style="width: 320px;">
                        <img src="{{ asset($course->photo) }}" class="card-img-top w-100 object-fit-cover"
                            style="height: 220px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->course_name }}</h5>
                            <p class="card-text">{{ $course->description }}</p>
                            <a class="btn btn-primary mt-auto @guest disabled @endguest"
                                href="{{ Route('reservation', [$course->id]) }}">Подать заявку</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <x-script />
</body>

</html>
