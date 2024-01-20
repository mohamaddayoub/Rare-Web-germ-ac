<!doctype html>

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
    <title>Developing and Supporting</title>

    <!-- New Design 15/12/2023 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('new_design/base.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/cover.css') }}">
    {{-- No Developing and Supporting Css File Because I Used Tailwind Css --}}

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

    <section class="cover cover-2">
        <div class="content">
            <h1>{{ __('translate.Developing and Supporting') }}</h1>
            <ol>
                <li>
                    <a href="/">{{ __('translate.Home') }}</a>
                </li>
                <li>
                    /
                </li>
                <li>
                    {{ __('translate.Developing and Supporting') }}
                </li>
            </ol>
        </div>
    </section>

    <div class="my-container bg-king text-white">
        <h1
            class="relative w-fit mx-auto text-center text-2xl md:text-4xl mb-5 md:mb-10 font-bold after:w-1/2 after:h-0.5 after:md:h-1 after:mx-auto after:bg-white after:absolute after:-bottom-2.5 after:left-1/2 after:translate-x-[-50%]">
            {{ __('translate.developing-head') }}
        </h1>

        <div class="pt-10 flex flex-col gap-4 md:gap-6">
            <div
                class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out">
                <span class="text-4xl md:text-6xl">
                    <i class="fa fa-shield-alt"></i>
                </span>
                <p class="text-sm md:text-base text-center md:text-justify">
                    {{ __('translate.developing-1') }}
                </p>
            </div>
            <div
                class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out">
                <span class="text-4xl md:text-6xl">
                    <i class="fa fa-shield-alt"></i>
                </span>
                <p class="text-sm md:text-base text-center md:text-justify">
                    {{ __('translate.developing-2') }}
                </p>
            </div>
            <div
                class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out">
                <span class="text-4xl md:text-6xl">
                    <i class="fa fa-shield-alt"></i>
                </span>
                <p class="text-sm md:text-base text-center md:text-justify">
                    {{ __('translate.developing-3') }}
                </p>
            </div>
            <div
                class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out">
                <span class="text-4xl md:text-6xl">
                    <i class="fa fa-shield-alt"></i>
                </span>
                <p class="text-sm md:text-base text-center md:text-justify">
                    {{ __('translate.developing-4') }}
                </p>
            </div>
            <div
                class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out">
                <span class="text-4xl md:text-6xl">
                    <i class="fa fa-shield-alt"></i>
                </span>
                <p class="text-sm md:text-base text-center md:text-justify">
                    {{ __('translate.developing-5') }}
                </p>
            </div>
            <div
                class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out">
                <span class="text-4xl md:text-6xl">
                    <i class="fa fa-shield-alt"></i>
                </span>
                <p class="text-sm md:text-base text-center md:text-justify">
                    {{ __('translate.developing-6') }}
                </p>
            </div>
            <div
                class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out">
                <span class="text-4xl md:text-6xl">
                    <i class="fa fa-shield-alt"></i>
                </span>
                <p class="text-sm md:text-base text-center md:text-justify">
                    {{ __('translate.developing-7') }}
                </p>
            </div>
            <div
                class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out">
                <span class="text-4xl md:text-6xl">
                    <i class="fa fa-shield-alt"></i>
                </span>
                <p class="text-sm md:text-base text-center md:text-justify">
                    {{ __('translate.developing-7') }}
                </p>
            </div>
        </div>
    </div>

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
</body>

</html>
