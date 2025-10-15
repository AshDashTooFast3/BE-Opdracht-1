@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <body class="">
        <header class="">
            @if (Route::has('login'))
                <nav class="">
                    <button type="button"><a href="/allergeen" style="color: white;" class="btn btn-primary">Allergeen</a></button>
                    <button type="button"><a href="/leverancier" style="color: white;" class="btn btn-primary">Leverancier</a></button>
                    <button type="button"><a href="{{ route ('products.index') }}" style="color: white;" class="btn btn-primary">Products</a></button>
                </nav>
            @endif
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
