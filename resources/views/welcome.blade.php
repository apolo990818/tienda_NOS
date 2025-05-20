@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="fade-in-scale">¡Bienvenido a Nuestra Tienda!</h1>
    <p class="slide-up">Explora los mejores productos con una experiencia fluida y moderna.</p>
    <div class="floating-text">✨ ¡Las mejores ofertas te esperan! ✨</div>
</div>



        @forelse($latestMessages as $message)
           <!-- <div class="chat-title">Invitado #{{ $message->guest_id }}</div>
-->
        @empty
            
        @endforelse
    
<!-- Botón flotante para abrir formulario -->
<button id="openChatBtn" 
    style="position: fixed; bottom: 30px; right: 30px; background-color: #27ae60; border-radius: 50%; width: 56px; height: 56px; border: none; cursor: pointer; font-size: 28px; color: white; z-index: 9999;">💬</button>

<!-- Formulario para datos del cliente -->
<div id="chatInfoFormContainer" 
    style="display: none; position: fixed; bottom: 30px; right: 30px; width: 320px; background: #2c3e50; border-radius: 10px; box-shadow: 0 8px 16px rgba(0,0,0,0.3); padding: 20px; color: white; font-family: 'Nunito', sans-serif; z-index: 10000;">
    <h3>Ingresa tus datos</h3>
    <form id="chatInfoForm">
        <label>Tipo de Documento</label><br>
        <select id="tipoDocumento" required style="width: 100%; padding: 8px; border-radius: 5px; border:none; margin-bottom:10px;">
            <option value="" disabled selected>Selecciona</option>
            <option value="CC">Cédula de Ciudadanía</option>
            <option value="CE">Cédula de Extranjería</option>
            <option value="TI">Tarjeta de Identidad</option>
            <option value="PP">Pasaporte</option>
        </select>

        <label>Número de Documento</label><br>
        <input type="text" id="numeroDocumento" required style="width: 100%; padding: 8px; border-radius: 5px; border:none; margin-bottom:10px;" />

        <label>Nombres</label><br>
        <input type="text" id="nombres" required style="width: 100%; padding: 8px; border-radius: 5px; border:none; margin-bottom:10px;" />

        <label>Apellidos</label><br>
        <input type="text" id="apellidos" required style="width: 100%; padding: 8px; border-radius: 5px; border:none; margin-bottom:10px;" />

        <label>Correo</label><br>
        <input type="email" id="correo" required style="width: 100%; padding: 8px; border-radius: 5px; border:none; margin-bottom:10px;" />

        <label>Teléfono</label><br>
        <input type="tel" id="telefono" required style="width: 100%; padding: 8px; border-radius: 5px; border:none; margin-bottom:15px;" />

        <button type="submit" style="width: 100%; background-color: rgb(39, 111, 174); border: none; padding: 10px; border-radius: 20px; color: white; font-weight: 700; cursor: pointer;">Enviar</button>
    </form>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
document.addEventListener('DOMContentLoaded', () => {
    const openChatBtn = document.getElementById('openChatBtn');
    const chatInfoFormContainer = document.getElementById('chatInfoFormContainer');
    const chatInfoForm = document.getElementById('chatInfoForm');

    openChatBtn.style.display = 'block';
    chatInfoFormContainer.style.display = 'none';

    openChatBtn.addEventListener('click', () => {
        openChatBtn.style.display = 'none';
        chatInfoFormContainer.style.display = 'block';
    });

    chatInfoForm.addEventListener('submit', async e => {
        e.preventDefault();

        const clienteData = {
            tipo_documento: document.getElementById('tipoDocumento').value.trim(),
            numero_documento: document.getElementById('numeroDocumento').value.trim(),
            nombres: document.getElementById('nombres').value.trim(),
            apellidos: document.getElementById('apellidos').value.trim(),
            correo: document.getElementById('correo').value.trim(),
            telefono: document.getElementById('telefono').value.trim(),
        };

        try {
            const response = await fetch('/api/clientes', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(clienteData),
            });

            if (!response.ok) {
                const errorData = await response.json();
                const mensajesErrores = Object.values(errorData.errors || {}).flat().join('\n');
                alert('Errores:\n' + mensajesErrores);
                return;
            }

            const data = await response.json();
console.log('Respuesta API:', data);  // <-- Agrega esta línea para ver qué llega
const clienteId = data.guest_id;
console.log('clienteId:', clienteId);
window.location.href = `/admin/chat/${clienteId}`;


        } catch (error) {
            alert('Error inesperado: ' + error.message);
        }
    });
});
</script>
@endsection
