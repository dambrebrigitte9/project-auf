<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">

</head>
<body>
    @extends('layout.app')
    @section('content')
    <div class="profile">
        <img src="{{ asset('images/profil.png') }}" alt="Avatar" class="avatar">
        <h1>Nom et Prénom</h1>
        <p>Adresse</p>
        <p>Téléphone</p>
        <p>Email</p>
    </div>
    @endsection
    
</body>
</html>