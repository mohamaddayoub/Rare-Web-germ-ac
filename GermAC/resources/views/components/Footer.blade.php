<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Footer</title>

    <link rel="stylesheet" href="{{ asset('new_design/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/contact.css') }}">
</head>

<body>
    <section class="footer">
        <div class="padding-top"></div>
        <div class="contact">
            <div class="show-logo">
                <a href="{{ route('home') }}" class="brand"><img
                        src="{{ asset('new_images/logo.png') }}"alt="logo" /></a>
                <span>{{ __('translate.logo') }}</span>
            </div>
            <div class="office">
                <h2>{{ __('translate.Office') }}</h2>
                <p>{{ __('translate.address') }}
                </p>
                <h3>info@germ-ac.com</h3>
                <h3>+00971559610205</h3>
                <h3>+00966530604870</h3>
                <h2>{{ __('translate.Get in Touch') }}</h2>
                <ul>
                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                </ul>
            </div>
            <div class="links">
                <h2>{{ __('translate.Useful Links') }}</h2>
                <ul>
                    <li
                        class="lg:w-fit pb-1 border-b border-transparent hover:border-white/25 transition-all duration-200 ease-in-out">
                        <a href="/home">{{ __('translate.q-link-0') }}</a>
                    </li>
                    <li
                        class="lg:w-fit pb-1 border-b border-transparent hover:border-white/25 transition-all duration-200 ease-in-out">
                        <a href="/about">{{ __('translate.q-link-1') }}</a>
                    </li>
                    <li
                        class="lg:w-fit pb-1 border-b border-transparent hover:border-white/25 transition-all duration-200 ease-in-out">
                        <a href="/sections/onlineCosulution">{{ __('translate.q-link-2') }}</a>
                    </li>
                    <li
                        class="lg:w-fit pb-1 border-b border-transparent hover:border-white/25 transition-all duration-200 ease-in-out">
                        <a href="/courses">{{ __('translate.q-link-3') }}</a>
                    </li>
                    <li
                        class="lg:w-fit pb-1 border-b border-transparent hover:border-white/25 transition-all duration-200 ease-in-out">
                        <a href="/medicalTourism">{{ __('translate.q-link-4') }}</a>
                    </li>
                    <li
                        class="lg:w-fit pb-1 border-b border-transparent hover:border-white/25 transition-all duration-200 ease-in-out">
                        <a href="/developingAndSupporting">{{ __('translate.q-link-5') }}</a>
                    </li>
                    <li
                        class="lg:w-fit pb-1 border-b border-transparent hover:border-white/25 transition-all duration-200 ease-in-out">
                        <a href="/sections">{{ __('translate.q-link-6') }}</a>
                    </li>
                    <li
                        class="lg:w-fit pb-1 border-b border-transparent hover:border-white/25 transition-all duration-200 ease-in-out">
                        <a href="/humanSide">{{ __('translate.q-link-7') }}</a>
                    </li>
                    <li
                        class="lg:w-fit pb-1 border-b border-transparent hover:border-white/25 transition-all duration-200 ease-in-out">
                        <a href="/contact">{{ __('translate.q-link-8') }}</a>
                    </li>
                </ul>
            </div>
            <div class="contact-us">
                <h2>{{ __('translate.Contact Us') }}</h2>
                <form>
                    <input type="text" name="name" placeholder={{ __('translate.Name') }} required />
                    <input type="text" name="email" placeholder="{{ __('translate.Email') }}" required />
                    <input type="text" name="message" placeholder={{ __('translate.Message') }} required />
                    <button type="submit" class="hover:opacity-80 transition-all duration-200 ease-out">
                        <i class="fa fa-paper-plane me-1"></i>
                        {{ __('translate.Submit') }}
                    </button>
                </form>
            </div>
        </div>
        <div class="padding-bottom">
            {{ __('translate.All Rights Reserved') }},
            <a class="ms-1 hover:opacity-75 transition-opacity duration-200 ease-in-out" href="https://rare-web.com" target="_blank">rare-web.com © 2024</a>
        </div>
        <button class="scroll-top-btn" id="scrollTopBtn">
            <i class="fas fa-arrow-up"></i>
        </button>
    </section>

    <script src="{{ asset('new_design/footer.js') }}"></script>
</body>

</html>
