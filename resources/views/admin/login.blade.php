<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Concert Ticketing</title>
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
<body class="min-h-screen flex items-center justify-center" style="background: linear-gradient(135deg, var(--color-navy) 0%, #003366 100%)">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-xl p-8">
            <!-- Logo/Title -->
            <div class="text-center mb-8">
                <div class="inline-block text-white rounded-lg p-3 mb-4" style="background-color: var(--color-navy)">
                    <i class="fas fa-ticket-alt text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold" style="color: var(--color-navy)">Concert Ticketing</h1>
                <p class="mt-2" style="color: var(--color-gold)">Admin Login Panel</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <!-- Email Input -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium mb-2" style="color: var(--color-navy)">
                        Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" style="color: var(--color-gold)">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="block w-full pl-10 pr-4 py-2 border-2 rounded-lg outline-none transition"
                            style="border-color: var(--color-gold); color: var(--color-navy)"
                            placeholder="admin@example.com"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium mb-2" style="color: var(--color-navy)">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" style="color: var(--color-gold)">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="block w-full pl-10 pr-4 py-2 border-2 rounded-lg outline-none transition"
                            style="border-color: var(--color-gold); color: var(--color-navy)"
                            placeholder="••••••••"
                            required
                        >
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full text-black font-semibold py-2 rounded-lg transition duration-200 flex items-center justify-center hover:opacity-90"
                    style="background-color: var(--color-gold)"
                >
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Login
                </button>
            </form>

            <!-- Footer -->
            <p class="text-center text-sm mt-6" style="color: var(--color-navy)">
                Masukkan email dan password untuk mengakses admin panel
            </p>
        </div>

        <!-- Security Note -->
        <div class="mt-6 rounded-lg p-4 text-center text-sm text-white" style="background-color: rgba(212, 175, 55, 0.2); border: 2px solid var(--color-gold)">
            <i class="fas fa-shield-alt mr-2"></i>
            Halaman ini dilindungi dan aman
        </div>
    </div>
</body>
</html>
