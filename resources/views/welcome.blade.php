<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/ico" href="{{ asset('images/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        /* Estilos para el contenedor de la imagen de fondo */
        .bg-image {
            position: fixed;
            /* Para que la imagen de fondo cubra toda la pantalla */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('images/background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            filter: blur(4px);
            /* Aplica el blur */
            z-index: -1;
            /* Asegura que esté detrás del contenido */
        }

        body {
            background-color: #f8f9fa;
            /* Un color de fondo para cuando la imagen no esté disponible */
        }

        label {
            font-size: clamp(0.75rem, 3vw, 0.9rem);
        }

        input[type="text"] {
            font-size: clamp(0.85rem, 3vw, 0.9rem);
            color: #4C585B;
        }

        input[type="number"] {
            font-size: clamp(0.8rem, 3vw, 0.85rem);
            color: #4C585B;
        }

        .formatted_investment_amount {
            font-size: clamp(0.8rem, 3vw, 0.9rem) !important;
            color: #4C585B !important;
        }

        .form-check-label {
            font-size: clamp(0.7rem, 3vw, 0.75rem);
        }

        .main_div {
            opacity: 0.9;
            border: 2px solid gray;
            border-radius: 10px
        }

        /* Estilo por defecto para pantallas más pequeñas */
        .card {
            width: 75% !important;
        }

        /* Media query para pantallas grandes (ancho mínimo de 992px) */
        @media (min-width: 992px) {
            .card {
                width: 50% !important;
            }
        }

        /* Media query para pantallas extra grandes (ancho mínimo de 1200px) */
        @media (min-width: 1200px) {
            .card {
                width: 40% !important;
            }
        }
    </style>
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="bg-image"></div> <!-- Contenedor para la imagen de fondo -->
    <div class="d-flex justify-content-center mt-2">
        <div class="card m-4 main_div">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img class="img-fluid" src="{{ asset('images/logo-future-capital.png') }}" style="min-height: 90px; min-width: 110; max-height: 137px; max-width: 150px" alt="">
                </div>

                <!-- Form Component -->
                <livewire:profit-calculator-component />
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>