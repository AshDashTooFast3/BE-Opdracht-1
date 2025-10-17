@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
</head>

<body class="mt-4">
    <div class="container d-flex justify-content-center ">

        <div class="col-md-10">

            <h1>{{ $title }}</h1>
            <p>{{ $message }}</p>

            @if (session('success'))
                <div class="alert alert-success alert-dimissable fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
                </div>
                <meta http-equiv="refresh" content="3;url={{ route('products.index') }}">
            @endif

            <table class="table table-hover table-striped">
                <thead>
                    <th>Barcode</th>
                    <th>Naam</th>
                    <th>VerpakkingsEenheid (kg)</th>
                    <th>AantalAanwezig</th>
                    <th>AllergenenInfo</th>
                    <th>LeverancierInfo</th>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->Barcode}}</td>
                            <td>{{ $product->Naam }}</td>
                            <td>{{ $product->VerpakkingsEenheid}}</td>
                            <td>{{ $product->AantalAanwezig }}</td>
                            <td>
                                <a href="{{ route('allergeen.index') }}">
                                    <button class="btn btn-primary btn-sm ">
                                        AllergenenInfo
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('leverancier.index') }}">
                                    <button class="btn btn-secondary btn-sm ">
                                        LeverancierInfo
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr colspan='3'>Geen producten bekend</tr>
                    @endforelse
                </tbody>
            </table>
          <a class="btn btn-primary" href="{{ route('home') }}">Terug naar het overzicht</a>
        </div>
    </div>
</body>

</html>