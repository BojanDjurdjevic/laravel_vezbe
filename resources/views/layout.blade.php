<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-6 py-4">
                <a href="/" class="text-gray-700 font-semibold hover:text-indigo-600 transition">Home</a>
                <a href="/shop" class="text-gray-700 font-semibold hover:text-indigo-600 transition">Shop</a>
                <a href="/about" class="text-gray-700 font-semibold hover:text-indigo-600 transition">About</a>
                <a href="/contact" class="text-gray-700 font-semibold hover:text-indigo-600 transition">Contact</a>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="flex-grow max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('sadrzaj')
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-800 text-gray-200 py-6 mt-12">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; MojPrviProjekat - Bojan Đurđević</p>
        </div>
    </footer>

</body>
</html>
