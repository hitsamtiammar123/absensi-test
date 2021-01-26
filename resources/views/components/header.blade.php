@php
    $user = Auth::user();
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <div class="d-inline-flex justify-content-center">
            <a class="navbar-brand d-inline-flex" href="{{route('index')}}">
                <strong>Absensi</strong>
            </a>
        </div>
        <ul class="navbar-nav">
            @auth
                @if ($user->isAdmin())
                    <li class="nav-item dropdown me-4">
                        <a class=" dropdown-toggle heading" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        CRUD
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('pegawai.list')}}">Pegawai</a></li>
                        <li><a class="dropdown-item" href="{{route('divisi.list')}}">Divisi</a></li>
                        </ul>
                    </li>
                @endif
                <li class="navbar-item">
                    <a class="heading" href="{{route('logout')}}">
                        logout
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
<style>
    .heading{
        color: white;
        font-weight: bold;
        text-decoration: none;
    }
    .header{
        flex: 1,
    }
    .greetings{
        color:white;
        font-size: 14px;
    }
</style>
