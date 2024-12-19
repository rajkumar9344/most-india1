<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-500 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <div class="text-center mb-6">
           
            <img src="{{ asset('assets/Mostindia-logo.png') }}" alt="Logo" class="mx-auto w-40 h-15">
            
        </div>
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" placeholder="username"
                       class="mt-1 block w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" placeholder="Password"
                       class="mt-1 block w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="text-center">
                <button type="submit"
                        class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none">
                    Login
                </button>
                <p style="color: blue">Version 1.0.0</p>
                {{-- <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p> --}}
                {{-- <a href="{{ route('register') }}" class="block mt-4 text-sm text-blue-500 hover:underline">
                    Create New Account
                </a> --}}
            </div>
        </form>
    </div>
</body>
</html>
