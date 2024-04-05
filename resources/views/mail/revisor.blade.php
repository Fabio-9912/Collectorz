<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>collectorz.it</title>
</head>

<body>
    <div>
        <h1>Un Utente ha richiesto di lavorare con noi</h1>
        <h2>Dettagli:</h2>
        <p>Nome: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Perché si vuole unire al team: {{ $data['description'] }}</p>
        <p>Per accettarlo clicca qui:</p>
        <a href="{{ route('make.revisor', compact('user')) }}"><button>Accetta Revisore</a></button>
    </div>

</body>

</html>
