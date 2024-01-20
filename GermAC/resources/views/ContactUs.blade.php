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
    <title>Contact Us</title>

    <!-- New Design 15/12/2023 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('new_design/base.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/cover.css') }}">
    <link rel="stylesheet" href="{{ asset('new_design/contact/contact.css') }}">

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
            <h1>{{ __('translate.Contact Us') }}</h1>
            <ol>
                <li>
                    <a href="/">{{ __('translate.Home') }}</a>
                </li>
                <li>
                    /
                </li>
                <li>
                    {{ __('translate.Contact Us') }}
                </li>
            </ol>
        </div>
    </section>

    <section class="my-container contacting-us">
        <form class="form">
            <h2>{{ __('translate.contact-text') }}</h2>
            <div class="form-col">
                <div class="form-row">
                    <input placeholder={{ __('translate.Name') }} required />
                    <input type="email" placeholder="{{ __('translate.Email') }}" required />
                </div>
                <div class="form-row">
                    <input placeholder={{ __('translate.Phone') }} required />
                    <input placeholder={{ __('translate.Subject') }} required />
                </div>
                <div class="form-row">
                    <input placeholder="{{ __('translate.How We Can Help You?') }}" required />
                </div>
                <div class="form-row">
                    <div><input type="checkbox" class=" me-2" />{{ __('translate.contact-1') }}</div>
                </div>
            </div>
            <button type="submit" class="hover:opacity-80 transition-opacity duration-150 ease-in-out"><i
                    class="fa fa-paper-plane me-1"></i> {{ __('translate.Submit') }}</button>
        </form>
        <h4>{{ __('translate.contact-2') }}</h4>
        <div class="info">
            <div>
                <h2>{{ __('translate.Location') }}</h2>
                <h3>{{ __('translate.address') }}</h3>
            </div>
            <div>
                <h2>{{ __('translate.Phone') }}</h2>
                <h3>+00971559610205</h3>
                <h3>+00966530604870</h3>
            </div>
            <div>
                <h2>{{ __('translate.Email') }}</h2>
                <h3>info@germ-ac.com</h3>
            </div>
        </div>
    </section>

    <div>
        <iframe style="border:0; width: 100%; height: 350px;"
            src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d14525.930414255088!2d54.33888108465574!3d24.468730000000022!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDI4JzA3LjQiTiA1NMKwMjAnMjAuMSJF!5e0!3m2!1sen!2sus!4v1703613212895!5m2!1sen!2sus"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
