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
    <title>Course Details</title>

    <!-- New Design 15/12/2023 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('new_design/base.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/cover.css') }}">
    {{-- No Course Details Css File Because I Used Tailwind Css --}}

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

    <section class="cover cover-1">
        <div class="content">
            <h1>{{ __('translate.Course Details') }}</h1>
            <ol>
                <li>
                    <a href="/">{{ __('translate.Home') }}</a>
                </li>
                <li>
                    /
                </li>
                <li>
                    <a href="/courses">{{ __('translate.Courses') }}</a>
                </li>
                <li>
                    /
                </li>
                <li>
                    {{ __('translate.Course Details') }}
                </li>
            </ol>
        </div>
    </section>

    <div class="my-container bg-king text-white">
        <h1
            class="relative w-fit mx-auto text-center text-2xl md:text-4xl mb-10 md:mb-20 font-bold after:w-1/2 after:h-0.5 after:md:h-1 after:mx-auto after:bg-white after:absolute after:-bottom-2.5 after:left-1/2 after:translate-x-[-50%]">
            @if ($course->name !== null)
                {{-- {{ $course->name }} --}}
                {{ GoogleTranslate::trans($course->name, app()->getLocale()) }}
            @else
                {{ __('translate.No Data Found') }}
            @endif
        </h1>

        <div
            class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-4 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out mb-5 md:mb-10">
            <span class="text-4xl md:text-6xl">
                <i class="fa fa-stethoscope"></i>
            </span>
            <p class="text-base md:text-lg text-center md:text-start">
                @if ($course->description !== null)
                    {{-- {{ $course->description }} --}}
                    {{ GoogleTranslate::trans($course->description, app()->getLocale()) }}
                @else
                    {{ __('translate.No Data Found') }}
                @endif
            </p>
        </div>

        <div
            class="flex flex-col md:flex-row items-center md:items-start gap-4 md:gap-6 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out">
            <div class="md:w-1/3 md:pe-5 md:border-e-2 border-white/10">
                <p class="text-sm md:text-base text-center md:text-start md:hidden">
                    <span class="font-bold me-1">
                        <i class="fa fa-caret-right me-1"></i>
                        {{ __('translate.Doctors') }}:
                    </span>
                </p>
                @foreach ($course->doctors as $doctor)
                    <div class="flex flex-wrap justify-center md:justify-start items-center gap-4 mb-6 md:mb-3">
                        <div class="rounded-full w-20 h-20 md:w-16 md:h-16 overflow-hidden border">
                            <img class="max-w-full" src="{{ asset($doctor->image) }}" />
                        </div>
                        <form action="{{ route('doctors/show') }}" method="post" role="form">
                            @csrf
                            <button type="submit"
                                class="flex justify-center items-center gap-2 text-xs md:text-sm px-4 md:px-6 py-1 md:py-2 border-2 border-white rounded-full hover:border-king hover:text-king hover:bg-white transition-all duration-300 ease-in-out">
                                {{-- {{ $doctor->name }} --}}
                                {{ GoogleTranslate::trans($doctor->name, app()->getLocale()) }}
                                <span class="text-lg md:text-xl">
                                    @if (session()->get('locale') == 'ar')
                                        <i class="fa fa-arrow-left"></i>
                                    @else
                                        <i class="fa fa-arrow-right"></i>
                                    @endif
                                </span>
                            </button>
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="flex flex-col gap-2 md:gap-4 items-center md:items-start">
                <p class="text-sm md:text-base text-center md:text-start">
                    <span class="font-bold me-1">
                        <i class="fa fa-caret-right me-1"></i>
                        {{ __('translate.Specialization') }}:
                    </span>
                    <span class="block md:inline my-1 md:my-0">
                        {{-- {{ $course->section->name }} --}}
                        {{ GoogleTranslate::trans($course->section->name, app()->getLocale()) }}
                    </span>
                </p>
                <p class="text-sm md:text-base text-center md:text-start">
                    <span class="font-bold me-1">
                        <i class="fa fa-caret-right me-1"></i>
                        {{ __('translate.Price') }}:
                    </span>
                    {{ $course->price }} $ <!-- {{ $course->currency }} -->
                </p>
                <p class="text-sm md:text-base text-center md:text-start">
                    <span class="font-bold me-1">
                        <i class="fa fa-caret-right me-1"></i>
                        {{ __('translate.Rate') }}:
                    </span>
                    {{ $course->rate }}/10
                </p>
                <p class="text-sm md:text-base text-center md:text-start">
                    <span class="font-bold me-1">
                        <i class="fa fa-caret-right me-1"></i>
                        {{ __('translate.Date') }}:
                    </span>
                    {{ $course->date }}
                </p>
                <form action="{{ route('checkout') }}" method="post" role="form">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <button type="submit"
                        class="mt-5 md:mt-0 flex justify-center items-center gap-2 text-xs md:text-sm px-4 md:px-6 py-1 md:py-2 border-2 border-white rounded-full hover:border-king hover:text-king hover:bg-white transition-all duration-300 ease-in-out">
                        {{ __('translate.Show All Videos') }}
                        <span class="text-lg md:text-xl">
                            @if (session()->get('locale') == 'ar')
                                <i class="fa fa-arrow-left"></i>
                            @else
                                <i class="fa fa-arrow-right"></i>
                            @endif
                        </span>
                    </button>
                </form>
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
