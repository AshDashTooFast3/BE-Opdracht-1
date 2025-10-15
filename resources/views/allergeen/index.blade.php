@vite(['resources/css/app.css', 'resources/js/app.js']);
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamin</title>
</head>

<body class="">
    <div class="container d-flex justify-content-center ">

        <div class="col-md-10">

            <h1>{{ $title }}</h1>

            @if (session('success'))
                <div class="alert alert-success alert-dimissable fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
                </div>
                <meta http-equiv="refresh" content="3;url={{ route('allergeen.index') }}">
            @endif

            <a href="/allergeen/create" class="btn btn-primary">Nieuwe Allergeen</a>

            <table class="table table-hover table-striped">
                <thead>
                    <th>Naam</th>
                    <th>Omschrijving</th>
                    <th>Verwijder</th>
                    <th>Bijwerken</th>
                </thead>
                <tbody>
                    @forelse ($allergenen as $allergeen)
                        <tr>
                            <td>{{ $allergeen->Naam }}</td>
                            <td>{{ $allergeen->Omschrijving }}</td>
                            <td>
                                <form action="{{ route('allergeen.destroy', $allergeen->Id) }}" method="POST"
                                    onsubmit="return confirm('Weet je zeker dat je deze allergeen wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-center">Verwijderen</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('allergeen.edit', $allergeen->Id) }}" method="GET"
                                    onsubmit="return confirm('Weet je zeker dat je deze allergeen wilt bijwerken?');">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-info text-white text-center">Bijwerken</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr colspan='3'>Geen allergenen bekend</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>