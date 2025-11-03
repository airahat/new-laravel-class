<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />




</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/about">About </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/users/">Users </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/trainees/">Trainee </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/products">Products </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- User Photo --}}
                        @if (Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User Photo"
                                class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover;">
                        @else
                            <img src="https://placehold.co/100x100" alt="Default Avatar" class="rounded-circle me-2"
                                style="width: 35px; height: 35px; object-fit: cover;">
                        @endif

                        {{-- User Name --}}
                        <span>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fa-solid fa-user me-2"></i> My Profile
                            </a>
                        </li>


                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>

            <ul class="dropdown-menu">
                <li class="dropdown-item">
                    <a class="nav-link " href="#">

                    </a>
                </li>


            </ul>



        </div>
    </nav>
    @yield('content')

    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>
