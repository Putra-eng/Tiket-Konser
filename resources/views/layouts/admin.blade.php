<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --color-navy: #001F3F;
            --color-cream: #F5F5DC;
            --color-gold: #D4AF37;
        }
    </style>
</head>
<body style="background-color: var(--color-cream)">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 text-white shadow-lg" style="background-color: var(--color-navy)">
            <div class="p-6 border-b" style="border-color: var(--color-gold)">
                <h1 class="text-2xl font-bold">Concert Ticketing</h1>
                <p class="text-sm mt-2" style="color: var(--color-gold)">Admin Panel</p>
            </div>

            <nav class="mt-8 px-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 mb-4 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'text-black' : 'text-white hover:opacity-80' }}" style="{{ request()->routeIs('admin.dashboard') ? 'background-color: var(--color-gold)' : '' }}">
                    <i class="fas fa-chart-line mr-3"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.tiket.index') }}" class="flex items-center px-4 py-3 mb-4 text-white hover:opacity-80 rounded-lg transition {{ request()->routeIs('admin.tiket.*') ? 'text-black' : '' }}" style="{{ request()->routeIs('admin.tiket.*') ? 'background-color: var(--color-gold)' : '' }}">
                    <i class="fas fa-ticket-alt mr-3"></i>
                    <span>Tiket</span>
                </a>

                <a href="{{ route('admin.pemesanan.index') }}" class="flex items-center px-4 py-3 mb-4 text-white hover:opacity-80 rounded-lg transition {{ request()->routeIs('admin.pemesanan.*') ? 'text-black' : '' }}" style="{{ request()->routeIs('admin.pemesanan.*') ? 'background-color: var(--color-gold)' : '' }}">
                    <i class="fas fa-shopping-cart mr-3"></i>
                    <span>Pemesanan</span>
                </a>

                <a href="{{ route('admin.pembeli.index') }}" class="flex items-center px-4 py-3 mb-4 text-white hover:opacity-80 rounded-lg transition {{ request()->routeIs('admin.pembeli.*') ? 'text-black' : '' }}" style="{{ request()->routeIs('admin.pembeli.*') ? 'background-color: var(--color-gold)' : '' }}">
                    <i class="fas fa-users mr-3"></i>
                    <span>Pembeli</span>
                </a>
            </nav>

            <div class="absolute bottom-0 left-0 w-64 p-4" style="border-top: 1px solid var(--color-gold)">
                <div class="flex items-center justify-between rounded-lg p-3" style="background-color: rgba(212, 175, 55, 0.1)">
                    <div class="flex items-center flex-1 min-w-0">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: var(--color-gold)">
                            <span class="text-black text-xs font-bold">{{ substr(session('admin_name'), 0, 1) }}</span>
                        </div>
                        <span class="ml-3 text-sm font-medium truncate">{{ session('admin_name') }}</span>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:opacity-70 transition">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm px-8 py-4" style="border-bottom: 2px solid var(--color-gold)">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold" style="color: var(--color-navy)">@yield('page_title', 'Dashboard')</h2>
                    <div class="text-sm" style="color: var(--color-navy)">
                        {{ now()->format('d F Y, H:i') }}
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto px-8 py-6">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-red-800 font-semibold">Terjadi kesalahan:</p>
                        <ul class="mt-2 text-red-700">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <p class="text-green-800">{{ session('success') }}</p>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
