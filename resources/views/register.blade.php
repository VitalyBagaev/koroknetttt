<!DOCTYPE html>
<html lang="en">

<x-head />

<body>
    <x-header />
    <div class="d-flex justify-content-center w-100 my-5">

        <div class="card shadow p-4" style="width: 100%; max-width: 450px;">
            <form action="{{ Route('register') }}" method="POST">
                @csrf
                <h3 class="text-center mb-4">Регистрация</h3>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label ">Логин</label>
                    <input type="text" class="form-control" placeholder="Логин" value="{{ old('login') }}"
                        name="login">
                </div>
                @error('login')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ФИО</label>
                    <input type="text" class="form-control" placeholder="ФИО" value="{{ old('fullname') }}"
                        name="fullname">
                </div>
                @error('fullname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Адрес электронной почты</label>
                    <input type="text" class="form-control" placeholder="Email" value="{{ old('email') }}"
                        name="email">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Телефон</label>
                    <input type="text" class="form-control" placeholder="89009009009" value="{{ old('phone') }}"
                        name="phone">
                </div>
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" class="form-control" placeholder="Пароль" value="{{ old('password') }}"
                        name="password">
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <div class="text-center nt-10"><button type="submit" class="btn btn-primary ">Зарегистрироваться</button></div>

                <div class="text-center nt-10">Уже есть аккаунт? <a href="{{ Route('authpage') }}">Вход</a></div>
            </form>
        </div>

    </div>

    <x-script />
</body>

</html>
