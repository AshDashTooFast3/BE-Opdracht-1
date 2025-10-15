<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container my-5 d-flex justify-content-center ">
    <div class="col-md-8">
    <h1>{{ $title }}</h1>

    <p>{{ $message }}</p>
    <form action="/allergeen" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <div id="NameHelp" class="form-text">Voer de naam van het allergeen in.</div>
                        
        </div>
        <div class="mb-3">
            <label for="InputDescription" class="form-label">Omschrijving</label>
            <textarea class="form-control" id="InputDescription" name="description" rows="3" required></textarea>
            <div id="DescriptionHelp" class="form-text">Voer een omschrijving van het allergeen in.</div>
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
    </div>
</body>
</html>
