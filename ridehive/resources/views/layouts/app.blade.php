<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>RideHive</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">
    <!-- Header -->
    @include('includes.header')

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('includes.footer')
</body>
</html>
