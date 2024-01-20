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
    <title>User Profile</title>

    <!-- New Design 15/12/2023 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('new_design/base.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/cover.css') }}">
    {{-- No Profile User Css File Because I Used Tailwind Css --}}

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
            <h1>{{ __('translate.User Profile') }}</h1>
            <ol>
                <li>
                    <a href="/">{{ __('translate.Home') }}</a>
                </li>
                <li>
                    /
                </li>
                <li>
                    {{ __('translate.User Profile') }}
                </li>
            </ol>
        </div>
    </section>

    <div class="my-container bg-king text-white">
        <h1
            class="relative w-fit mx-auto text-center text-2xl md:text-4xl mb-10 md:mb-20 font-bold after:w-1/2 after:h-0.5 after:md:h-1 after:mx-auto after:bg-white after:absolute after:-bottom-2.5 after:left-1/2 after:translate-x-[-50%]">
            {{ __('translate.profile-text') }}
        </h1>

        <div
            class="flex flex-col md:flex-row items-center md:items-start gap-4 md:gap-8 bg-white/5 px-4 py-6 md:px-6 md:py-8 rounded-md hover:bg-white/10 transition-all duration-300 ease-in-out">
            <div
                class="w-24 h-24 md:w-36 md:h-36 border-2 flex justify-center items-center rounded-full overflow-hidden bg-white/10">
                <i class="fa fa-user text-7xl md:text-9xl text-white mt-6 md:mt-10"></i>
            </div>

            <form action="{{ route('users/update') }}" method="POST" role="form" enctype="multipart/form-data"
                class="flex-1">
                @csrf
                <div class="flex flex-wrap flex-col gap-4">
                    <div class="flex flex-wrap items-center gap-2 text-base md:text-lg">
                        <h4 class="font-bold">
                            <i class="fa fa-caret-right me-1"></i>
                            {{ __('translate.Your name') }}:
                        </h4>
                        <input
                            class="flex-1 border-b-2 border-white/10 bg-transparent p-0.5 focus:outline-none text-sm md:text-base"
                            type="text" name ="name"
                            value="{{ GoogleTranslate::trans($user->name, app()->getLocale()) }}"
                            placeholder="{{ __('translate.Your name') }}">
                    </div>

                    <div class="flex flex-wrap items-center gap-2 text-base md:text-lg">
                        <h4 class="font-bold">
                            <i class="fa fa-caret-right me-1"></i>
                            {{ __('translate.Your email') }}:
                        </h4>
                        <input
                            class="flex-1 border-b-2 border-white/10 bg-transparent p-0.5 focus:outline-none text-sm md:text-base"
                            type="email" name ="email" value="{{ $user->email }}"
                            placeholder="{{ __('translate.Your email') }}">
                    </div>

                    <div class="flex flex-wrap items-center gap-2 text-base md:text-lg">
                        <h4 class="font-bold">
                            <i class="fa fa-caret-right me-1"></i>
                            {{ __('translate.Your old password') }}:
                        </h4>
                        <input
                            class="flex-1 border-b-2 border-white/10 bg-transparent p-0.5 focus:outline-none text-sm md:text-base"
                            type="password" name ="oldpassword" placeholder="{{ __('translate.Your old password') }}">
                    </div>

                    <div class="flex flex-wrap items-center gap-2 text-base md:text-lg">
                        <h4 class="font-bold">
                            <i class="fa fa-caret-right me-1"></i>
                            {{ __('translate.Your new password') }}:
                        </h4>
                        <input
                            class="flex-1 border-b-2 border-white/10 bg-transparent p-0.5 focus:outline-none text-sm md:text-base"
                            type="password" name ="newpassword" placeholder="{{ __('translate.Your new password') }}">
                    </div>

                    <div class="flex flex-wrap justify-between items-center gap-2 mt-4">
                        <button type="submit"
                            class="flex justify-center items-center gap-2 text-xs md:text-sm px-4 md:px-6 py-2 md:py-3 border-2 border-white rounded-full hover:border-king hover:text-king hover:bg-white transition-all duration-300 ease-in-out">
                            {{ __('translate.Save Updates') }}
                        </button>
                        <button type="button" onclick="submitLogoutForm()"
                            class="flex justify-center items-center gap-2 text-xs md:text-sm px-4 md:px-6 py-1 md:py-2 border-2 border-white rounded-full hover:border-king hover:text-king hover:bg-white transition-all duration-300 ease-in-out">
                            {{ __('translate.Logout') }}
                            <span class="text-lg md:text-xl">
                                @if (session()->get('locale') == 'ar')
                                    <i class="fa fa-arrow-left"></i>
                                @else
                                    <i class="fa fa-arrow-right"></i>
                                @endif
                            </span>
                        </button>
                    </div>
                </div>
            </form>

            <form id="logoutForm" action="{{ route('logout') }}" method="POST" role="form"
                enctype="multipart/form-data">
                @csrf
            </form>
        </div>
    </div>

    @include('components.Footer')

    <script>
        function submitLogoutForm() {
            document.getElementById('logoutForm').submit();
        }
    </script>

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
