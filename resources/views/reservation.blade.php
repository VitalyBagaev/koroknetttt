<!DOCTYPE html>
<html lang="en">

<x-head />

<body>

    <x-header />
    <div class="container">
        <form action="{{ Route('application', [$course->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Дата начала обучения</label>
                <input type="date" class="form-control" id="exampleInputEmail1" name="date">
            </div>

            @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Способ оплаты</label>
                <select class="form-select" id="inputGroupSelect01" name="payment">
                    <option value="Наличными">Наличными</option>
                    <option value="Перевод по номеру телефона">Перевод по номеру телефона</option>
                </select>
            </div>
            @error('payment')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
        
    </div>
{{-- <img src="{{ asset('storage/image.png')}}" alt="Логотип" class="overflow-hidden rounded"
            style="height: 250px;"> --}}
    <x-script />
</body>

</html>