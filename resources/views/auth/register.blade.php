<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuizTube - Register</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-900 flex items-center justify-center py-20">

    <div class="bg-white flex flex-col gap-4 rounded-xl py-15 px-8 w-full max-w-lg">

        <div class="text-center text-black text-4xl font-bold">
            <p>Join QuizTube!</p>
        </div>
        <div class="text-center text-slate-600 text-xl font-base">
            <p>Create your account and start your learning adventure</p>
        </div>

        {{-- Error message --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-2 rounded">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- Form Register --}}
        <form method="POST" action="{{ url('/register') }}">
            @csrf

            {{-- Full Name --}}
            <label for="name" class="block font-medium text-slate-700">Full Name</label>
            <div class="relative mt-2 mb-4">
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Enter your full name"
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400">
                    <i class="ph ph-user text-xl"></i>
                </div>
            </div>

            {{-- Email --}}
            <label for="email" class="block font-medium text-slate-700">Email Address</label>
            <div class="relative mt-2 mb-4">
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="Enter your email address"
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                <div class="absolute left-0 top-1/2 transform -translate-y-1/2 text-slate-400 pl-3">
                    <i class="ph ph-envelope text-xl"></i>
                </div>
            </div>

            {{-- Role --}}
            <h2 class="font-medium text-slate-700 mb-2">I am a...</h2>

            <label
                class="flex items-center px-3 py-4 mb-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                <input type="radio" name="role" value="teacher" id="teacher"
                    class="h-4 w-4 text-slate-700 focus:ring-0" required>
                <div class="flex items-center ml-3 space-x-3">
                    <div
                        class="flex justify-center items-center w-[48px] h-[48px] text-white text-2xl bg-blue-500 rounded-full">
                        <i class="ph ph-graduation-cap"></i>
                    </div>
                    <div>
                        <div class="text-slate-800 font-medium">Teacher / Educator</div>
                        <div class="text-slate-600 text-sm">Create and manage quizzes for students</div>
                    </div>
                </div>
            </label>

            <label
                class="flex items-center px-3 py-4 mb-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                <input type="radio" name="role" value="student" id="student"
                    class="h-4 w-4 text-slate-700 focus:ring-0" required>
                <div class="flex items-center ml-3 space-x-3">
                    <div
                        class="flex justify-center items-center w-[48px] h-[48px] text-white text-2xl bg-green-500 rounded-full">
                        <i class="ph ph-users"></i>
                    </div>
                    <div>
                        <div class="text-slate-800 font-medium">Student / Learner</div>
                        <div class="text-slate-600 text-sm">Take quizzes and track your progress</div>
                    </div>
                </div>
            </label>

            {{-- Password --}}
            <label for="password" class="block font-medium text-slate-700">Password</label>
            <div class="relative mt-2 mb-4">
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400">
                    <i class="ph ph-lock text-xl"></i>
                </div>
                <button type="button" onclick="togglePasswordVisibility('password', 'password-icon')"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400">
                    <i class="ph ph-eye-slash" id="password-icon"></i>
                </button>
            </div>

            {{-- Confirm Password --}}
            <label for="password_confirmation" class="block font-medium text-slate-700">Confirm Password</label>
            <div class="relative mt-2 mb-4">
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Confirm your password"
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400">
                    <i class="ph ph-lock text-xl"></i>
                </div>
                <button type="button"
                    onclick="togglePasswordVisibility('password_confirmation', 'confirm-password-icon')"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400">
                    <i class="ph ph-eye-slash" id="confirm-password-icon"></i>
                </button>
            </div>

            {{-- Submit --}}
            <button type="submit" id="submitButton"
                class="w-full mt-4 bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-semibold py-2 rounded-xl text-lg shadow-lg">
                Create Account
            </button>

            <div class="mt-4 text-center">
                <span class="text-slate-600">Already have an account?</span>
                <a href="/login" class="text-blue-600 hover:text-blue-700 font-semibold">Click here to Sign In</a>
            </div>
        </form>
    </div>

    <script>
        function togglePasswordVisibility(inputId, iconId) {
            const passwordField = document.getElementById(inputId);
            const passwordIcon = document.getElementById(iconId);
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.classList.remove('ph-eye-slash');
                passwordIcon.classList.add('ph-eye');
            } else {
                passwordField.type = 'password';
                passwordIcon.classList.remove('ph-eye');
                passwordIcon.classList.add('ph-eye-slash');
            }
        }

        // Auto-check role if ?role=... in URL
        document.addEventListener('DOMContentLoaded', function() {
            const params = new URLSearchParams(window.location.search);
            const role = params.get('role');
            if (role === 'teacher') document.getElementById('teacher').checked = true;
            if (role === 'student') document.getElementById('student').checked = true;
        });
    </script>
</body>

</html>
