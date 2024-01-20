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
    <title>Courses</title>

    <!-- New Design 15/12/2023 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('new_design/base.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/cover.css') }}">
    {{-- No Courses Css File Because I Used Tailwind Css --}}

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

    <section class="cover cover-5">
        <div class="content">
            <h1>{{ __('translate.Courses') }}</h1>
            <ol>
                <li>
                    <a href="/">{{ __('translate.Home') }}</a>
                </li>
                <li>
                    /
                </li>
                <li>
                    {{ __('translate.Courses') }}
                </li>
            </ol>
        </div>
    </section>

    <div class="my-container bg-king text-white">
        <h1
            class="relative w-fit mx-auto text-2xl md:text-4xl mb-5 md:mb-10 font-bold after:w-1/2 after:h-0.5 after:md:h-1 after:mx-auto after:bg-white after:absolute after:-bottom-2.5 after:left-1/2 after:translate-x-[-50%]">
            {{ __('translate.courses-head') }}
        </h1>
        <p class="text-lg md:text-xl text-center mb-5 md:mb-10">
            {{ __('translate.courses-text') }}
        </p>

        @if ($courses !== null)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-4 lg:gap-6 text-center pt-5">
                @foreach ($courses as $course)
                    <form action="{{ route('courses/show') }}" method="post" role="form">
                        @csrf
                        <div
                            class="cover cover-section overflow-y-auto rounded-md shadow-md shadow-black/15 before:bg-black/5 before:hover:bg-black/30 before:transition-all before:duration-300 before:ease-in-out">
                            <button type="submit" class="content cursor-pointer text-xl">
                                {{-- {{ $course->name }} --}}
                                {{ GoogleTranslate::trans($course->name, app()->getLocale()) }}
                            </button>
                        </div>
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                    </form>
                @endforeach
            </div>
        @else
            <div
                class="text-2xl flex justify-center items-center cover cover-section max-w-80 mx-auto rounded-md shadow-md shadow-black/15 before:bg-black/5 before:hover:bg-black/30 before:transition-all before:duration-300 before:ease-in-out">
                {{ __('translate.No Data Found') }}
            </div>
        @endif
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
