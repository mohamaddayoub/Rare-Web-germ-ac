<!DOCTYPE html>

@if (session()->get('locale') == 'ar')
    <html dir="rtl">
@else
    <html dir="ltr">
@endif

<head>
    <title>Laravel 9 Google Translate Package Example - NiceSnippets.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Laravel Google Translate Example - NiceSnippets.com</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <strong>Select Language: </strong>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select changeLang">
                            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English
                            </option>
                            <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic
                            </option>
                            <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>Spanish
                            </option>
                        </select>
                    </div>
                </div>
                <h3>{{ GoogleTranslate::trans($section->name, app()->getLocale()) }}</h3>
                <h3>{{ GoogleTranslate::trans('Hello World', app()->getLocale()) }}</h3>
            </div>
        </div>
    </div>

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
