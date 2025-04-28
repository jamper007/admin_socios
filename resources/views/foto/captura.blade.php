@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Capturar y Descargar Foto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        video, canvas, img {
            border: 2px solid #dee2e6;
            border-radius: 5px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="text-center mb-5">📸 Capturar y Descargar Foto</h2>
        <!-- ALERTA DE FOTO CAPTURADA -->
<div id="fotoAlert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
    📸 ¡Foto capturada con éxito!
</div>

    <div class="row justify-content-center">
        <!-- Columna 1: Cámara y botones -->
        <div class="col-md-6 text-center mb-4">
            <video id="video" width="100%" autoplay class="mb-3"></video>

            <div class="d-grid gap-2 d-sm-flex justify-content-center mb-3">
                <button id="snap" class="btn btn-primary">
                    <i class="bi bi-camera"></i> Tomar Foto
                </button>
                <button id="download" class="btn btn-success" disabled>
                    <i class="bi bi-download"></i> Descargar
                </button>
            </div>

            <!-- Canvas oculto para capturar la foto -->
<canvas id="canvas" width="600" height="600" style="display:none;"></canvas>
            <p class="text-muted">Ajusta la cámara y haz clic en "Tomar Foto" para capturar tu imagen.</p>
            <p class="text-muted">La imagen se guardará en formato PNG.</p>
        </div>

        <!-- Columna 2: Vista previa -->
        <div class="col-md-6 text-center">
            <h5 class="mb-3">Vista previa</h5>
            <!-- Imagen de vista previa (ajustada a cuadrado) -->
<img id="preview" class="img-fluid shadow-sm" style="max-width: 100%; max-height: 600px;"
     src="https://via.placeholder.com/600x600.png?text=Vista+Previa+de+la+Foto+Tipo+Pasaporte"
     alt="Vista previa" />
        </div>
    </div>
</div>

<!-- JS -->
<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const snapBtn = document.getElementById('snap');
    const downloadBtn = document.getElementById('download');
    const preview = document.getElementById('preview');
    const ctx = canvas.getContext('2d');
const videoWidth = video.videoWidth;
const videoHeight = video.videoHeight;
const side = Math.min(videoWidth, videoHeight);
const offsetX = (videoWidth - side) / 2;
const offsetY = (videoHeight - side) / 2;

// recorta una región cuadrada del centro del video y la dibuja a 600x600
ctx.drawImage(video, offsetX, offsetY, side, side, 0, 0, 600, 600);

    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(err => {
            alert("No se pudo acceder a la cámara: " + err);
        });

        snapBtn.addEventListener('click', () => {
            canvas.getContext('2d').drawImage(video, 0, 0, 600, 600);
            const dataURL = canvas.toDataURL('image/jpeg', 0.9);
    preview.src = dataURL;
    downloadBtn.disabled = false;

    // Mostrar alerta
    const alertDiv = document.getElementById('fotoAlert');
    alertDiv.classList.remove('d-none');

    // Ocultar después de 3 segundos
    setTimeout(() => {
        alertDiv.classList.add('d-none');
    }, 3000);
});


    downloadBtn.addEventListener('click', () => {
        const dataURL = canvas.toDataURL('image/png');
        const a = document.createElement('a');
        a.href = dataURL;
        a.download = 'foto_' + new Date().toISOString().slice(0,19).replace(/[-:T]/g, "") + '.png';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });
</script>

</body>
</html>

@endsection
