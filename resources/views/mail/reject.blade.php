<div>
    <h1>IT</h1>Caro <em>{{ $otherData['name'] }}</em>, il tuo annuncio dal titolo:
    <strong>{{ $otherData['title'] }}</strong> è
    stato rifiutato per i seguenti motivi:
    <ul>
        @foreach ($data as $info)
            @if ($info != '')
                <li><strong>{{ $info }}</strong></li>
            @endif
        @endforeach

        {{-- <li>{{$data['image']}}</li> --}}
    </ul>
    <p>Puoi verificare e modificare i campi segnalati dalla tua dashboard personale.</p>
    <p>Per ulteriori delucidazioni, puoi scriverci alla mail: <a href= "info@ecollectorz.com"><em>info@ecollectorz.com</em></a></p>
</div>
<hr>
<div>
    <h1>EN</h1>Dear {{ $otherData['name'] }}, your ad titled: {{ $otherData['title'] }} has been rejected for the
    following reasons:
    <ul>
        @foreach ($data as $info)
            @if ($info != '')
                <li><strong>{{ $info }}</strong></li>
            @endif
        @endforeach

        {{-- <li>{{$data['image']}}</li> --}}
    </ul>
    <p>You can check and edit the fields flagged from your personal dashboard.</p>
    <p>For further clarification, you can write to us at the email: <a href= "info@ecollectorz.com"><em>info@ecollectorz.com</em></a></p>
</div>
<hr>
<div>
    <h1>ES</h1>Estimado {{ $otherData['name'] }}, tu anuncio titulado: {{ $otherData['title'] }} ha sido rechazado por
    los siguientes motivos:
    <ul>
        @foreach ($data as $info)
            @if ($info != '')
                <li><strong>{{ $info }}</strong></li>
            @endif
        @endforeach

        {{-- <li>{{$data['image']}}</li> --}}
    </ul>
    <p>Puedes verificar y editar los campos señalados desde tu panel personal.</p>
    <p>Para más aclaraciones, puedes escribirnos al correo electrónico: <a href= "info@ecollectorz.com"><em>info@ecollectorz.com</em></a></p>
</div>
