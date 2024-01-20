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
    <title>Human Side</title>

    <!-- New Design 15/12/2023 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('new_design/base.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/cover.css') }}">
    {{-- No Human Side Css File Because I Used Tailwind Css --}}

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
            <h1>{{ __('translate.Human Side') }}</h1>
            <ol>
                <li>
                    <a href="/">{{ __('translate.Home') }}</a>
                </li>
                <li>
                    /
                </li>
                <li>
                    {{ __('translate.Human Side') }}
                </li>
            </ol>
        </div>
    </section>

    <div class="my-container bg-king text-white">
        <h1
            class="relative w-fit mx-auto text-2xl md:text-4xl mb-5 md:mb-10 font-bold after:w-1/2 after:h-0.5 after:md:h-1 after:mx-auto after:bg-white after:absolute after:-bottom-2.5 after:left-1/2 after:translate-x-[-50%]">
            {{ __('translate.Why Choose our team ?') }}
        </h1>
        <p class="text-lg md:text-xl text-center mb-5 md:mb-10">{{ __('translate.why-text') }}</p>
        <div class="flex flex-col md:flex-row justify-center flex-wrap gap-4 md:gap-6 mb-10 md:mb-20">
            <div
                class=" bg-white/5 max-w-full md:max-w-60 px-4 py-6 rounded-md text-center hover:bg-white/10 transition-all duration-300 ease-in-out">
                <h2 class="mb-5 text-lg md:text-xl font-bold">{{ __('translate.First') }}:</h2>
                <p class="text-sm md:text-base text-gray-300">{{ __('translate.why-1') }}</p>
            </div>
            <div
                class=" bg-white/5 max-w-full md:max-w-60 px-4 py-6 rounded-md text-center hover:bg-white/10 transition-all duration-300 ease-in-out">
                <h2 class="mb-5 text-lg md:text-xl font-bold">{{ __('translate.Second') }}:</h2>
                <p class="text-sm md:text-base text-gray-300">{{ __('translate.why-2') }}</p>
            </div>
            <div
                class=" bg-white/5 max-w-full md:max-w-60 px-4 py-6 rounded-md text-center hover:bg-white/10 transition-all duration-300 ease-in-out">
                <h2 class="mb-5 text-lg md:text-xl font-bold">{{ __('translate.Third') }}:</h2>
                <p class="text-sm md:text-base text-gray-300">{{ __('translate.why-3') }}</p>
            </div>
        </div>
        <div class="flex flex-wrap gap-8 md:gap-12">
            <div class="w-full md:max-w-[400px] md:mt-2.5">
                <img class="w-full rounded-md" src="{{ asset('new_images/human.jpg') }}" />
            </div>
            <div class="flex-1 min-w-[200px] text-center md:text-start">
                <h2 class="text-2xl md:text-4xl mb-5 md:mb-10 font-bold">
                    {{ __('translate.Guarantee mechanism') }}:
                </h2>
                <p class="text-lg md:text-xl mb-5 md:mb-10">{{ __('translate.mechanism-text') }}</p>
                <div class="flex flex-col justify-center gap-4 md:gap-6">
                    <div>
                        <h3 class="text-lg md:text-xl mb-2 md:mb-4 font-bold">
                            <div
                                class="relative inline-block -mb-1 md:-mb-2.5 mr-1 md:mr-2 text-sm md:text-2xl w-5 md:w-10 h-5 md:h-10 border rounded-full bg-white/5 hover:bg-white/10 transition-all duration-300 ease-in-out">
                                <i
                                    class="fa fa-check  absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]"></i>
                            </div>
                            {{ __('translate.First') }}:
                        </h3>
                        <p class="text-xs md:text-base text-gray-300">{{ __('translate.mechanism-1') }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg md:text-xl mb-2 md:mb-4 font-bold">
                            <div
                                class="relative inline-block -mb-1 md:-mb-2.5 mr-1 md:mr-2 text-sm md:text-2xl w-5 md:w-10 h-5 md:h-10 border rounded-full bg-white/5 hover:bg-white/10 transition-all duration-300 ease-in-out">
                                <i
                                    class="fa fa-check  absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]"></i>
                            </div>
                            {{ __('translate.Second') }}:
                        </h3>
                        <p class="text-xs md:text-base text-gray-300">{{ __('translate.mechanism-2') }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg md:text-xl mb-2 md:mb-4 font-bold">
                            <div
                                class="relative inline-block -mb-1 md:-mb-2.5 mr-1 md:mr-2 text-sm md:text-2xl w-5 md:w-10 h-5 md:h-10 border rounded-full bg-white/5 hover:bg-white/10 transition-all duration-300 ease-in-out">
                                <i
                                    class="fa fa-check  absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]"></i>
                            </div>
                            {{ __('translate.Third') }}:
                        </h3>
                        <p class="text-xs md:text-base text-gray-300">{{ __('translate.mechanism-3') }}</p>
                    </div>
                                        <div>
                        <h3 class="text-lg md:text-xl mb-2 md:mb-4 font-bold">
                            <div
                                class="relative inline-block -mb-1 md:-mb-2.5 mr-1 md:mr-2 text-sm md:text-2xl w-5 md:w-10 h-5 md:h-10 border rounded-full bg-white/5 hover:bg-white/10 transition-all duration-300 ease-in-out">
                                <i
                                    class="fa fa-check  absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]"></i>
                            </div>
                            {{ __('translate.Fourth') }}:
                        </h3>
                        <p class="text-xs md:text-base text-gray-300">{{ __('translate.mechanism-4') }}</p>
                    </div>
                                        <div>
                        <h3 class="text-lg md:text-xl mb-2 md:mb-4 font-bold">
                            <div
                                class="relative inline-block -mb-1 md:-mb-2.5 mr-1 md:mr-2 text-sm md:text-2xl w-5 md:w-10 h-5 md:h-10 border rounded-full bg-white/5 hover:bg-white/10 transition-all duration-300 ease-in-out">
                                <i
                                    class="fa fa-check  absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]"></i>
                            </div>
                            {{ __('translate.Fifth') }}:
                        </h3>
                        <p class="text-xs md:text-base text-gray-300">{{ __('translate.mechanism-5') }}</p>
                    </div>
                </div>
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
