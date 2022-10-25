<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Short URL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <main>
            @yield('content')
        </main>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 1989–2022 John Company</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a target="_blank"
                                                href="https://www.youtube.com/watch?v=y48ZwmVF-2M&list=RDy48ZwmVF-2M&start_radio=1">Privacy</a>
                </li>
                <li class="list-inline-item"><a target="_blank"
                                                href="https://www.youtube.com/watch?v=i2JF4EW_X68&list=RDy48ZwmVF-2M&index=3">Terms</a>
                </li>
                <li class="list-inline-item"><a target="_blank"
                                                href="https://www.youtube.com/watch?v=T9hhDEfV4uo&list=RDy48ZwmVF-2M&index=6">Support</a>
                </li>
            </ul>
        </footer>
    </div>
</div>
</body>
</html>
