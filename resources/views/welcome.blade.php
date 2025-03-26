<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!--importar estilos del bootstrap-->
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!--Menú navegación-->
        <div class="container"> <!--centrar el contenído-->
            <a class="navbar-brand mb-6" href="#">TrainTrack</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-info" href="/login">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="text-white text-center bg-dark py-5" style="background-image: url('https://via.placeholder.com/1200'); background-size: cover;">
        <div class="container py-5">
            <h1 class="display-4 fw-bold">Transforma tu rutina con un solo clic</h1>
            <p class="lead">Reserva tus clases, organiza tus rutinas y sigue tu progreso desde un mismo lugar.</p>
            <a href="/register" class="btn btn-info btn-lg mt-3">¡Comienza ahora!</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-5,  text-black">Características</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Gestión de Rutinas</h4>
                            <ara class="card-text">Organiza tus ejercicios y crea rutinas maravillosas.</ara>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Reserva de Clases</h4>
                            <p class="card-text">Garantiza tu lugar en las actividades favoritas del gimnasio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Seguimientos</h4>
                            <p class="card-text">Lleva el ritmo de tu progreso</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Train Track - Todos los derechos reservados</p>
            <div class="d-flex justify-content-center gap-4">
                <a href="#" class="text-white">Política de Privacidad</a>
                <a href="#" class="text-white">Términos de Uso</a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
