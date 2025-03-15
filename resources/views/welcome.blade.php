@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="fade-in-scale">¡Bienvenido a Nuestra Tienda!</h1>
    <p class="slide-up">Explora los mejores productos con una experiencia fluida y moderna.</p>
    
    <!-- <button class="animated-button">Explorar Ahora</button> -->

    <div class="floating-text">✨ ¡Las mejores ofertas te esperan! ✨</div>
</div>

<style>
    body {
        background: linear-gradient(to right, rgb(106, 127, 130), rgb(35, 96, 97));
        color: white;
        font-family: 'Nunito', sans-serif;
        animation: backgroundAnimation 6s infinite alternate ease-in-out;
    }

    /* Animación del fondo */
    @keyframes backgroundAnimation {
        from {
            background: linear-gradient(to right,  rgb(106, 127, 130), rgb(35, 96, 97));
        }
        to {
            background: linear-gradient(to right,  rgb(106, 127, 130), rgb(35, 96, 97));
        }
    }

    /* Animación de entrada con escala */
    .fade-in-scale {
        opacity: 0;
        transform: scale(0.8);
        animation: fadeInScale 1.5s ease-out forwards;
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Animación de subida */
    .slide-up {
        opacity: 0;
        transform: translateY(20px);
        animation: slideUp 1.5s ease-out forwards;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Botón animado */
    .animated-button {
        background-color: #fff;
        color: rgb(58, 227, 128);
        padding: 12px 24px;
        border: none;
        border-radius: 30px;
        font-size: 1.2rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        margin-top: 20px;
    }

    .animated-button:hover {
        transform: scale(1.1);
        background-color: rgb(255, 255, 255, 0.9);
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.6);
        animation: bounce 0.5s ease-in-out;
    }

    /* Rebote del botón */
    @keyframes bounce {
        0%, 100% { transform: scale(1.1); }
        50% { transform: scale(1.2); }
    }

    /* Texto flotante */
    .floating-text {
        font-size: 1.2rem;
        font-weight: bold;
        margin-top: 30px;
        opacity: 0;
        animation: fadeInFloat 3s ease-in-out forwards;
    }

    @keyframes fadeInFloat {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
