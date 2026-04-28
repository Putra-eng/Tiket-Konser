<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Tiket Konser</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-white shadow-lg p-6 fixed h-full">

        <h1 class="text-2xl font-bold text-purple-600 mb-6">
            Tiket Konser
        </h1>

        <!-- Informasi User -->
        <div class="bg-purple-50 p-4 rounded-xl">
            <h2 class="font-semibold text-gray-700 mb-3">
                Informasi Saya
            </h2>

            <p class="text-sm text-gray-600">
                Nama: (nanti dari database)
            </p>

            <p class="text-sm text-gray-600">
                Email: (nanti dari database)
            </p>

        </div>

    </aside>


    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8 ml-72">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">
            Pilih Tiket Konser
        </h2>

        <p class="text-gray-500 mb-6">
            Silakan pilih jenis tiket yang tersedia
        </p>

        <!-- CARD TIKET -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- REGULAR -->
            <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
    <h3 class="text-xl font-bold text-gray-800">Regular</h3>
    <p class="text-gray-500 mt-2">Akses standar konser</p>

    <p class="mt-4 font-bold text-purple-600 text-lg">
        Rp 250.000
    </p>

    <button class="mt-6 w-full bg-purple-600 hover:bg-purple-700 transition text-white py-2 rounded-xl font-semibold">
        Pilih Tiket
    </button>
</div>

            <!-- VIP -->
            <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 border-2 border-purple-500 scale-105">
    <div class="flex justify-between items-center">
        <h3 class="text-xl font-bold text-gray-800">VIP</h3>
        <span class="text-xs bg-purple-100 text-purple-600 px-2 py-1 rounded-full">
            Populer
        </span>
    </div>

    <p class="text-gray-500 mt-2">Dekat panggung</p>

    <p class="mt-4 font-bold text-purple-600 text-lg">
        Rp 500.000
    </p>

    <button class="mt-6 w-full bg-purple-600 hover:bg-purple-700 transition text-white py-2 rounded-xl font-semibold">
        Pilih Tiket
    </button>
</div>

            <!-- VVIP -->
            <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
    <h3 class="text-xl font-bold text-gray-800">VVIP</h3>
    <p class="text-gray-500 mt-2">Meet & Greet</p>

    <p class="mt-4 font-bold text-purple-600 text-lg">
        Rp 1.000.000
    </p>

    <button class="mt-6 w-full bg-purple-600 hover:bg-purple-700 transition text-white py-2 rounded-xl font-semibold">
        Pilih Tiket
    </button>
</div>

    </main>

</div>

</body>
</html>