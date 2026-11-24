<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
    <x-header />
    <div class="d-flex justify-content-center w-100 my-5">
        <div>
            
        </div>

        <div class="card shadow p-4" style="width: 100%; max-width: 450px;">
            <form action="{{ Route('auth') }}" method="POST">
                @csrf
                <h3 class="text-center mb-4">Авторизация</h3>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Логин</label>
                    <input type="text" class="form-control" placeholder="Логин" value="{{ old('login') }}"
                        name="login">
                </div>
                @error('login')
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
                <div class="text-center nt-10"><button type="submit" class="btn btn-primary">Войти</button></div>
                
                <div class="text-center nt-10">Нет аккаунта? <a href="{{ Route('regpage') }}">Регистрация</a></div>

            </form>
        </div>

    </div>

    <x-script />
</body>

</html>
