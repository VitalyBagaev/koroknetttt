<div class="container card p-1 mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center me-5" href="{{ Route('index') }}">
                <img src="{{ asset('storage/image02.jpg')}}" alt="Логотип" width="50" height="50" class="rounded-circle">
                Корочки.есть
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                </ul>
                
                @auth
                    <form class="d-flex align-items-center" role="search">
                        @if (Auth::user()->role == 'user')
                        <span class="navbar-text me-3">
                            <a href="{{ Route('perpage') }}" class="text-decoration-none">Личный кабинет</a>
                        </span>
                        @endif
                        @if (Auth::user()->role == 'admin')
                        <span class="navbar-text me-3">
                            <a href="{{ Route('admincourse') }}" class="btn">Курсы</a>
                            <a href="{{ Route('perpage') }}" class="btn">Заявки</a>
                        </span>
                        @endif
                        <a href="{{ Route('logout') }}" class="btn btn-outline-danger ms-1">Выход</a>
                    </form>
                @else
                    <form class="d-flex" role="search">
                        <a href="{{ Route('authpage') }}" class="btn btn-outline-secondary me-1">Вход</a>
                        <a href="{{ Route('regpage') }}" class="btn btn-outline-dark ms-1">Регистрация</a>
                    </form>
                @endauth
            </div>
        </div>
    </nav>
</div>
