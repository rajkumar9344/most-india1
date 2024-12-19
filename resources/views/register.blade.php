<!-- resources/views/register.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        label{
            align-items: flex-start;
        }
        </style>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-500 h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <div class="text-center mb-6">
            <h2>Register</h2>

            <form action="{{ route('register.submit') }}"method="POST">
                @csrf
                <!-- Add form fields for registration here -->
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" class="mt-1 block w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="text-center">
                <button type="submit" class=" w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none">Register</button>
                </div>
                  <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>

            </form>
        </div>
    </div>
</body>
</html>
