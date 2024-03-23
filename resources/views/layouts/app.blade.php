<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel10 TaskList App</title>
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-6">@yield('title')</h1>
    @yield('styles')
    <div>
        @if(session()->has('success'))
            <p>{{session('success')}}</p>
        @endif
        @yield('content')
    </div>
</body>
</html>