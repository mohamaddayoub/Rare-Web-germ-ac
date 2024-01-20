<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>

    <link rel="stylesheet" href="{{ asset('new_design/header.css') }}">
</head>

<body>
    <section class="header">
        <div class="logo">
            <a href="{{ route('home') }}" class="brand"><img src="{{ asset('new_images/logo.png') }}"
                    alt="logo" /></a>
            <span>{{ __('translate.logo') }}</span>
        </div>
        <div class="nav">
            <button class="nav-toggle" aria-expanded="false" type="button">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="nav-wrapper">
                <li class="nav-item pb-2 border-b border-white/10 lg:pb-0 lg:border-0">
                    <a href="/home">
                        {{ __('translate.link-0') }}
                    </a>
                </li>
                <li class="nav-item pb-2 border-b border-white/10 lg:pb-0 lg:border-0">
                    <a href="/about">
                        {{ __('translate.link-1') }}
                    </a>
                </li>
                <li class="nav-item lg:relative group pb-2 border-b border-white/10 lg:pb-0 lg:border-0">
                    <a class="lg:cursor-pointer">
                        {{ __('translate.link-2') }}<span class="lg:hidden ms-1">:</span>
                    </a>
                    <div
                        class="lg:opacity-0 lg:group-hover:opacity-100 lg:absolute lg:top-[35px] lg:-start-2 w-max bg-king rounded-md p-1.5 lg:px-2.5 mt-1 ">
                        <a href="/sections/onlineCosulution"
                            class="block pb-1 border-b border-white/10 hover:ps-1 transition-all duration-200 ease-in-out">
                            {{ __('translate.serv-1') }}
                        </a>
                        <a href="/courses"
                            class="block py-1 border-b border-white/10 hover:ps-1 transition-all duration-200 ease-in-out">
                            {{ __('translate.serv-2') }}
                        </a>
                        <a href="/medicalTourism"
                            class="block py-1 border-b border-white/10 hover:ps-1 transition-all duration-200 ease-in-out">
                            {{ __('translate.serv-3') }}
                        </a>
                        <a href="/developingAndSupporting"
                            class="block pt-1 hover:ps-1 transition-all duration-200 ease-in-out">
                            {{ __('translate.serv-4') }}
                        </a>
                    </div>
                </li>
                <li class="nav-item pb-2 border-b border-white/10 lg:pb-0 lg:border-0">
                    <a href="/sections">
                        {{ __('translate.link-3') }}
                    </a>
                </li>
                <li class="nav-item pb-2 border-b border-white/10 lg:pb-0 lg:border-0">
                    <a href="/humanSide">
                        {{ __('translate.link-4') }}
                    </a>
                </li>
                <li class="nav-item pb-2 border-b border-white/10 lg:pb-0 lg:border-0">
                    <a href="/contact">
                        {{ __('translate.link-5') }}
                    </a>
                </li>

                <li class="nav-item lang">
                    <a href="#" class="lang-toggle">
                        {{ __('translate.Lang') }}
                        <i class="fa-solid fa-angle-down ms-1"></i></a>
                    <div class="lang-wrapper">
                        <div class="lang-en" onclick="changeLanguage('en')">
                            {{ __('translate.lang-1') }}
                            <img class="lang-flag" src="{{ asset('new_images/us-flag.gif') }}" alt="us flag" />
                        </div>
                        <div class="lang-ar" onclick="changeLanguage('ar')">
                            {{ __('translate.lang-2') }}
                            <img class="lang-flag" src="{{ asset('new_images/ae-flag.gif') }}" alt="ae flag" />
                        </div>
                    </div>
                </li>

                @if (Auth::user() != null)
                    @if (Auth::user()->role_id == 1)
                        <li class="nav-item nav-btn">
                            <a href="{{ url('/admin/login') }}">
                                {{ __('translate.Dashboard') }}
                                <i class="fa fa-chart-bar ms-1"></i>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role_id !== 1)
                        <li class="nav-item nav-btn">
                            <a href="{{ route('dash.homePage') }}">
                                {{ __('translate.Profile') }}
                                <i class="fa fa-home ms-1"></i>
                            </a>
                        </li>
                    @endif
                @endif
                @if (Auth::user() == null)
                    <li class="nav-item nav-btn">
                        <a href="{{ route('register') }}">
                            {{ __('translate.Register') }}
                            <i class="fa fa-user-plus ms-1"></i>
                        </a>
                    </li>
                @endif

                <div class="social real">
                    <ul class="social-wrapper">
                        <li class="social-item"><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="social-item"><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="social-item"><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                    </ul>
                </div>
            </ul>
        </div>
        <div class="social alt">
            <ul class="social-wrapper">
                <li class="social-item"><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li class="social-item"><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li class="social-item"><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
            </ul>
        </div>
    </section>

    <script src="{{ asset('new_design/header.js') }}"></script>
</body>

</html>
