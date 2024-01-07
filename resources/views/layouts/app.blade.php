<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <style>
        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 40px;
        }

        .card-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-content {
            padding: 16px;
        }

        .card-title {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .card-description {
            font-size: 14px;
            color: #555;
            margin-bottom: 16px;
        }

        .card-buttons {
            display: flex;
            justify-content: space-between;
            padding: 0 16px 16px;
        }

        .quiz img {
            border-radius: 10px;
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .quiz h2 {
            font-size: 32px;
            margin-top: 15px;
        }

        .quiz p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .quiz form {
            margin-top: 10px;
        }

        .question {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 0px 4px rgba(0, 0, 0, 0.1);
            gap: 15px;
        }

        .question button {
            margin-top: 0 !important;
        }
    </style>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
