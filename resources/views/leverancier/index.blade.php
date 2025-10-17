@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>

<body class="mt-4">

    <div class="container my-5">
        <h1>{{ $title }}</h1>
        <p>{{ $message }}</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Omschrijving</th>
                    <th>LeverancierNummer</th>
                    <th>Mobiel</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leveranciers as $leverancier)
                    <tr>
                        <td>{{ $leverancier->Naam }}</td>
                        <td>{{ $leverancier->Contactpersoon }}</td>
                        <td>{{ $leverancier->LeverancierNummer }}</td>
                        <td>{{ $leverancier->Mobiel }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Geen leveranciers gevonden.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('home') }}">Terug naar het overzicht</a>
    </div>
</body>
</html>