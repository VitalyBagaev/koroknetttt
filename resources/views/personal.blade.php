<!DOCTYPE html>
<html lang="en">

<x-head />

<body>
    <x-header />
    <main class="container ">
        @if (Auth::user()->role == 'admin')
            <h1 class="mb-4">Все заявки</h1>
        @else
            <h1 class="mb-4">Мои заявки</h1>
        @endif
        <table class="table align-middle">
            <thead>
                <tr>
                    <th class="text-nowrap w-15">Номер заявки</th>
                    <th class="text-nowrap w-15">Название курса</th>
                    <th>Дата</th>
                    <th>Оплата</th>
                    <th class="text-nowrap w-15">Статус заявки</th>
                    @if (Auth::user()->role == 'admin')
                        <th class="text-nowrap">Изменить статус</th>
                    @endif
                    @if (Auth::user()->role == 'user')
                        <th class="text-nowrap">Оставить отзыв</th>
                    @endif
                    <th>Отзывы</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $app)
                    <tr>
                        <td class="text-nowrap w-15">№ {{ $loop->count - $loop->index}}</td>
                        <td class="text-nowrap w-15">{{ $app->course->course_name }}</td>
                        <td class="text-nowrap w-15">{{ $app->date->format('d.m.Y') }}</td>
                        <td class="text-nowrap w-15">{{ $app->payment }}</td>
                        <td class="text-nowrap w-15">{{ $app->status }}</td>
                        @if (Auth::user()->role == 'admin')
                            <td class="text-nowrap w-15">
                                <form action="{{ Route('changeStatus', $app) }}" method="POST">
                                    @csrf
                                    <select name="status" class="form-select form-select-sm mb-1">
                                        <option value="Новая" @selected($app->status == 'Новая')>Новая</option>
                                        <option value="Идет обучение" @selected($app->status == 'Идет обучение')>
                                            Идет обучение</option>
                                        <option value="Обучение завершено" @selected($app->status == 'Обучение завершено')>Обучение завершено</option>
                                    </select>
                                    <button class="btn btn-sm btn-primary w-100" type="submit">Сохранить</button>
                                </form>
                            </td>
                        @endif
                        @if (Auth::user()->role == 'user')
                            <td class="w-25">
                                @if ($app->status == 'Обучение завершено')
                                    <form action="{{ Route('commentadd', $app) }}" method="POST">
                                        @csrf
                                        <input name="comment" class="form-control form-control-sm mb-1" rows="1"></input>
                                        <button class="btn btn-sm btn-primary w-100 " type="submit " {{ $app->comments->isEmpty() ?: 'disabled' }}>Добавить</button>
                                    </form>
                                @endif
                            </td>
                        @endif
                        <td class="w-25">
                            @if ($app->status == 'Обучение завершено')
                                @foreach ($app->comments as $comment)
                                    <p class="mb-1 small text-break">{{ $comment->comment }}</p>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <x-script />
</body>

</html>