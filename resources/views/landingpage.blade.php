<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>QuizTube</title>

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

<body class="max-h-screen bg-slate-900">
    <x-navbar></x-navbar>
    <div class="flex flex-col items-center justify-center bg-slate-900 py-30">
        <h2 class="text-white font-bold text-center text-6xl">Transform YouTube Videos into</h2>
        <span class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 text-6xl">
            Interactive Quizzes
        </span>
        <p class="font-base text-slate-400 text-center text-xl mx-auto mt-4">Perfect for modern learning
            experiences.
            Create engaging quizzes <br> with AI or take interactive challenges to
            test your knowledge!</p>
    </div>
    <x-card></x-card>
    <div class="max-x-screen py-20 flex flex-col gap-20 rounded-lg shadow-sm mx-auto">
        <div class="flex items-center justify-center space-y-6">
            <div class="text-4xl font-bold text-white">
                <span>Why Choose QuizTube?</span>
            </div>
        </div>
        <div class="flex flex-row mx-20 gap-6 justify-center">
            <!-- Card 1 -->
            <div
                class="max-w-xl bg-white flex flex-col gap-4 items-center rounded-xl py-10 px-10 shadow-lg hover:scale-105 transition duration-300 ease-in-out">
                <div class="text-7xl text-black">
                    <i class="ph ph-video"></i>
                </div>
                <div class="text-center text-xl font-bold">
                    <h2>Video-Based Learning</h2>
                </div>
                <div class="text-center text-lg text-slate-600">
                    <p>Transform any YouTube video into an interactive learning experience</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div
                class="max-w-xl bg-white flex flex-col gap-4 items-center rounded-xl py-10 px-10 shadow-lg hover:scale-105 transition duration-300 ease-in-out">
                <div class="text-7xl text-black">
                    <i class="ph ph-robot"></i>
                </div>
                <div class="text-center text-xl font-bold">
                    <h2>AI-Generated Quizzes</h2>
                </div>
                <div class="text-center text-lg text-slate-600">
                    <p>Smart AI creates relevant questions automatically from video content</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div
                class="max-w-xl bg-white flex flex-col gap-4 items-center rounded-xl py-10 px-10 shadow-lg hover:scale-105 transition duration-300 ease-in-out">
                <div class="text-7xl text-black">
                    <i class="ph ph-lightning"></i>
                </div>
                <div class="text-center text-xl font-bold">
                    <h2>Instant Results</h2>
                </div>
                <div class="text-center text-lg text-slate-600">
                    <p>Get immediate feedback and detailed explanations for every answer</p>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
