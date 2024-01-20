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
    <title>About Us</title>

    <!-- New Design 15/12/2023 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('new_design/base.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/cover.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/about/about.css') }}">

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
            <h1>{{ __('translate.How We Are') }}</h1>
            <ol>
                <li>
                    <a href="/">{{ __('translate.Home') }}</a>
                </li>
                <li>
                    /
                </li>
                <li>
                    {{ __('translate.How We Are') }}
                </li>
            </ol>
        </div>
    </section>

    <section class="how-we-are">
        <div class="part part-1">
            <div>
                <div>
                    <h1>{{ __('translate.Overview') }}</h1>
                    <p>{{ __('translate.overview-1') }}</p>
                </div>
                <div>
                    <h2>{{ __('translate.Medical Fields') }}</h2>
                    <p>
                        {{ __('translate.medical-1') }}
                        <br><br>
                        {{ __('translate.medical-2') }}
                        <br><br>
                        {{ __('translate.medical-3') }}
                        <br><br>
                        {{ __('translate.medical-4') }}
                        <br><br>
                        {{ __('translate.medical-5') }}
                    </p>
                </div>
            </div>
            <div>
                <img src="{{ asset('new_images/about-1.jpg') }}" />
            </div>
        </div>

        <div class="part part-2">
            <div>
                <img src="{{ asset('new_images/about-2.jpg') }}" />
            </div>
            <div>
                <h2>{{ __('translate.Strategic Plan') }}</h2>
                <p>
                    {{ __('translate.strategic-1') }}
                    <br><br>
                    {{ __('translate.strategic-2') }}
                    <br><br>
                    {{ __('translate.strategic-3') }}
                </p>
            </div>
        </div>

        <div class="part part-3">
            <div>
                <h2>{{ __('translate.Non-Medical Fields') }}</h2>
                <p>{{ __('translate.non-medical-1') }}</p>
            </div>
            <div>
                <img src="{{ asset('new_images/about-3.jpg') }}" />
            </div>
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
</body>

</html>
