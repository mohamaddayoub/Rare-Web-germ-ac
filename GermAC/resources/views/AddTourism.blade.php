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
    <title>Book Tourism</title>

    <!-- New Design 15/12/2023 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('new_design/base.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/cover.css') }}">
    {{-- No Book Tourism Css File Because I Used Tailwind Css --}}

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

    <section class="cover cover-3">
        <div class="content">
            <h1>{{ __('translate.Book Tourism') }}</h1>
            <ol>
                <li>
                    <a href="/">{{ __('translate.Home') }}</a>
                </li>
                <li>
                    /
                </li>
                <li>
                    <a href="/medicalTourism">{{ __('translate.Medical Tourism') }}</a>
                </li>
                <li>
                    /
                </li>
                <li>
                    {{ __('translate.Book Tourism') }}
                </li>
            </ol>
        </div>
    </section>

    <div class="my-container bg-king text-white">
        <h1
            class="relative w-fit mx-auto text-center text-2xl md:text-4xl mb-10 md:mb-20 font-bold after:w-1/2 after:h-0.5 after:md:h-1 after:mx-auto after:bg-white after:absolute after:-bottom-2.5 after:left-1/2 after:translate-x-[-50%]">
            {{ __('translate.book-tourism-head') }}
        </h1>

        <div
            class="flex flex-col md:flex-row items-center md:items-start gap-4 md:gap-8 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out">
            <div
                class="w-24 h-24 md:w-36 md:h-36 border-2 flex justify-center items-center rounded-full overflow-hidden bg-white/10">
                <i class="fa fa-suitcase-rolling text-6xl md:text-8xl text-white mt-2 md:mt-4"></i>
            </div>

            <form action="{{ route('tourisms/store') }}" method="POST" role="form">
                @csrf
                <div class="flex flex-wrap flex-col gap-4">
                    <div class="flex flex-wrap justify-between items-center gap-2 text-base md:text-lg">
                        <h4 class="font-bold">
                            <i class="fa fa-caret-right me-1"></i>
                            {{ __('translate.Your name') }}:
                        </h4>
                        <input
                            class="border-b-2 border-white/10 bg-transparent p-0.5 focus:outline-none text-sm md:text-base"
                            type="text" name ="name" placeholder="{{ __('translate.Your name') }}" required>
                    </div>
                    <div class="flex flex-wrap justify-between items-center gap-2 text-base md:text-lg">
                        <h4 class="font-bold">
                            <i class="fa fa-caret-right me-1"></i>
                            {{ __('translate.Your phone') }}:
                        </h4>
                        <input
                            class="border-b-2 border-white/10 bg-transparent p-0.5 focus:outline-none text-sm md:text-base"
                            type="text" name ="phone" placeholder="{{ __('translate.Your phone') }}" required>
                    </div>
                    <div class="flex flex-wrap justify-between items-center gap-2 text-base md:text-lg">
                        <h4 class="font-bold">
                            <i class="fa fa-caret-right me-1"></i>
                            {{ __('translate.Your country') }}:
                        </h4>
                        <input
                            class="border-b-2 border-white/10 bg-transparent p-0.5 focus:outline-none text-sm md:text-base"
                            type="text" name ="country" placeholder="{{ __('translate.Your country') }}" required>
                    </div>
                    <div class="flex flex-wrap justify-between items-center gap-2 text-base md:text-lg">
                        <h4 class="font-bold">
                            <i class="fa fa-caret-right me-1"></i>
                            {{ __('translate.Your destination') }}:
                        </h4>
                        <input
                            class="border-b-2 border-white/10 bg-transparent p-0.5 focus:outline-none text-sm md:text-base"
                            type="text" name ="destination" placeholder="{{ __('translate.Your destination') }}"
                            required>
                    </div>
                    <div class="flex flex-wrap justify-between items-center gap-2 text-base md:text-lg">
                        <h4 class="font-bold">
                            <i class="fa fa-caret-right me-1"></i>
                            {{ __('translate.Your specialities') }}:
                        </h4>
                        <input
                            class="border-b-2 border-white/10 bg-transparent p-0.5 focus:outline-none text-sm md:text-base"
                            type="text" name ="specialities" placeholder="{{ __('translate.Your specialities') }}"
                            required>
                    </div>
                    <div class="flex flex-wrap justify-between items-center gap-2 text-base md:text-lg">
                        <h4 class="font-bold">
                            <i class="fa fa-caret-right me-1"></i>
                            {{ __('translate.Your message') }}:
                        </h4>
                        <input
                            class="border-b-2 border-white/10 bg-transparent p-0.5 focus:outline-none text-sm md:text-base"
                            type="text" name ="message" placeholder="{{ __('translate.Your message') }}" required>
                    </div>
                    <button type="submit"
                        class="w-fit flex justify-center items-center gap-2 text-xs md:text-sm px-4 md:px-6 py-1 md:py-2 border-2 border-white rounded-full hover:border-king hover:text-king hover:bg-white transition-all duration-300 ease-in-out">
                        {{ __('translate.Send Request') }}
                        <span class="text-lg md:text-xl">
                            @if (session()->get('locale') == 'ar')
                                <i class="fa fa-arrow-left"></i>
                            @else
                                <i class="fa fa-arrow-right"></i>
                            @endif
                        </span>
                    </button>
                </div>
            </form>
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
