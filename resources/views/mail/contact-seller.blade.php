<div>
    <h1>Un Utente è interessato ad un tuo annuncio</h1>
    <div><strong>Di seguito il suo messaggio:</strong></div>
    <p>{{ $data['description'] }}</p>
    <p>
        <img src="127.0.0.1:8000{{ $data['image'] }}">
    </p>
    <div><strong>Di seguito i dati dell'utente interessato:</strong></div>
    <p>Nome: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
</div>
