<!DOCTYPE html>

@if (session()->get('locale') == 'ar')
    <html dir="rtl">
@else
    <html dir="ltr">
@endif

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="copyright" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>

    <!-- New Design 15/12/2023 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('new_design/base.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/index/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/index/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/index/about.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/index/services.css') }}">

    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "king": "#243253",
                        "queen": "#eb5405",
                        "dark": "#121c2d",
                        "light": "#f6f6f6",
                        "danger": "#d90429",
                        "success": "#008000",
                        "warning": "#f7b801",
                        "info": "#2e3192",
                    }
                }
            }
        }
    </script>
</head>

<body>
    @include('components.Header')

    <section class="slider">
        <div class="full one"></div>
        <div class="full two"></div>
        <div class="full three"></div>
        <div class="full four"></div>
        <i class="fa fa-angle-left change left"></i>
        <i class="fa fa-angle-right change right"></i>
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </section>

    <section class="gallery">
        <div class="items">
            <div class="item">
                <img src="{{ asset('new_images/logo-1.jpg') }}" alt="logo-1" />
            </div>
            <div class="item">
                <img src="{{ asset('new_images/logo-2.jpg') }}" alt="logo-2" />
            </div>
            <div class="item">
                <img src="{{ asset('new_images/logo-3.jpg') }}" alt="logo-3" />
            </div>
            <div class="item">
                <img src="{{ asset('new_images/logo-4.jpg') }}" alt="logo-4" />
            </div>
            <div class="item">
                <img src="{{ asset('new_images/logo-5.jpg') }}" alt="logo-5" />
            </div>
            <div class="item">
                <img src="{{ asset('new_images/logo-6.jpg') }}" alt="logo-6" />
            </div>
            <div class="item">
                <img src="{{ asset('new_images/logo-7.jpg') }}" alt="logo-7" />
            </div>
            <div class="item">
                <img src="{{ asset('new_images/logo-8.jpg') }}" alt="logo-8" />
            </div>
            <div class="item">
                <img src="{{ asset('new_images/logo-9.jpg') }}" alt="logo-9" />
            </div>
            <div class="item">
                <img src="{{ asset('new_images/logo-10.jpg') }}" alt="logo-10" />
            </div>
            <div class="item">
                <img src="{{ asset('new_images/logo-11.jpg') }}" alt="logo-11" />
            </div>
            <div class="item">
                <img src="{{ asset('new_images/logo-12.jpg') }}" alt="logo-12" />
            </div>
        </div>
        <div class="pagination"></div>
    </section>

    <section class="my-container about">
        <div class="border-t mb-[50px] lg:mb-[100px]">
        </div>
        <h1>{{ __('translate.Our Vision') }}:</h1>
        <p>{{ __('translate.about-1') }}</p>
        <p>{{ __('translate.about-2') }}</p>
        <p>{{ __('translate.about-3') }}</p>
        <a href="about" class=" hover:opacity-75 transition-opacity duration-250 ease-in-out mx-auto lg:mx-0">
            {{ __('translate.Discover More') }}
            @if (session()->get('locale') == 'ar')
                <i class="fa fa-arrow-left ms-1"></i>
            @else
                <i class="fa fa-arrow-right ms-1"></i>
            @endif
        </a>
        <div class="counter">
            <div>
                <h2>+75</h2>
                <h3>{{ __('translate.count-1') }}</h3>
            </div>
            <div>
                <h2>+100</h2>
                <h3>{{ __('translate.count-2') }}</h3>
            </div>
            <div>
                <h2>+50</h2>
                <h3>{{ __('translate.count-3') }}</h3>
            </div>
        </div>
    </section>

    <section class="services" id=services>
        <div class="image-container">
            <img src="{{ asset('new_images/service-1.jpg') }}" alt="Image 2">
            <div class="overlay"></div>
            <a class="caption" href="/sections/onlineCosulution">{{ __('translate.serv-1') }}</a>
        </div>
        <div class="image-container">
            <img src="{{ asset('new_images/service-2.jpg') }}" alt="Image 5">
            <div class="overlay"></div>
            <a class="caption" href="/courses">{{ __('translate.serv-2') }}</a>
        </div>
        <div class="image-container">
            <img src="{{ asset('new_images/service-3.jpg') }}" alt="Image 4">
            <div class="overlay"></div>
            <a class="caption" href="/medicalTourism">{{ __('translate.serv-3') }}</a>
        </div>
        <div class="image-container">
            <img src="{{ asset('new_images/service-4.jpg') }}" alt="Image 4">
            <div class="overlay"></div>
            <a class="caption" href="/developingAndSupporting">{{ __('translate.serv-4') }}</a>
        </div>
    </section>

    @include('components.Footer')

    <script>
        function changeLanguage(language) {
            var url = "{{ route('changeLang') }}";
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send the AJAX request using fetch
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-Token': csrfToken
                    },
                    body: 'lang=' + encodeURIComponent(language)
                })
                .then(response => {
                    if (response.ok) {
                        // Reload the page
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>

    <!-- New Design 15/12/2023 -->
    <script src="{{ asset('new_design/index/slider.js') }}"></script>
    <script src="{{ asset('new_design/index/banner.js') }}"></script>
</body>

</html>
