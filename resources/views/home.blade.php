@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <style>
        body {
            background-color: #f8fafc; /* Fondo claro */
            font-family: 'Arial', sans-serif;
            color: #2c3e50;
        }
        .header-section {
            background: #2980b9;
            color: #ffffff;
            padding: 3rem;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .header-section p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            color: #eaf2f8;
        }
        .header-section .btn {
            background-color: #ffffff;
            color: #2980b9;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .header-section .btn:hover {
            background-color: #eaf2f8;
            color: #2980b9;
        }
        .info-section {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            padding: 2rem 0;
        }
        .info-card {
            flex: 1 1 300px;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .info-card h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2980b9;
            margin-bottom: 1rem;
        }
        .info-card p {
            font-size: 1rem;
            color: #7f8c8d;
            line-height: 1.6;
        }
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        /* Estilos del modal */
        .modal-header {
            background-color: #2980b9;
            color: #ffffff;
        }
        .modal-content {
            border-radius: 8px;
        }
    </style>
    
    <div class="container mt-5">
        <!-- Sección de Bienvenida -->
        <div class="header-section">
            <h1>Bienvenidos</h1>
            <p>Bienvenido a nuestro Sistema de registro de visitas a oficina y trámites </p>
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#infoModal">
                Conoce más
            </button>
        </div>

        <!-- Modal de Información Adicional -->
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoModalLabel">Más sobre Nosotros</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Nuestra empresa se dedica a proporcionar un sistema de gestión de visitas que garantiza la seguridad y eficiencia en el proceso de registro. Creemos en un entorno de trabajo seguro y ordenado, y nuestro sistema está diseñado para facilitar la gestión de entrada y salida de personas de manera rápida y confiable.</p>
                        <p>Con nuestra plataforma, las empresas pueden:</p>
                        <ul>
                            <li>Registrar visitantes de forma rápida y sencilla</li>
                            <li>Controlar el acceso a las instalaciones</li>
                            <li>Obtener reportes detallados de las visitas</li>
                            <li>Garantizar la privacidad y seguridad de los datos</li>
                        </ul>
                        <p>Nos esforzamos en ofrecer un servicio que optimice los recursos y mejore la experiencia tanto de los usuarios como de los visitantes.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Información de la Empresa -->
        <div id="info-section" class="info-section">
            <div class="info-card">
                <h2>¿Quiénes Somos?</h2>
                <p>Somos una empresa dedicada a optimizar la gestión de visitas y trámites, enfocándonos en ofrecer una experiencia rápida y segura para todos nuestros usuarios.</p>
            </div>
            <div class="info-card">
                <h2>Nuestro Sistema</h2>
                <p>El sistema permite registrar visitas, controlar la entrada y salida de personas, y gestionar todos los trámites de manera sencilla desde una única plataforma.</p>
            </div>
            <div class="info-card">
                <h2>Nuestro Compromiso</h2>
                <p>Nos comprometemos a brindar un servicio eficiente y confiable que respete la privacidad y seguridad de cada visitante y cliente.</p>
            </div>
        </div>
    </div>

    <!-- Importa Bootstrap JS para que el modal funcione -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection