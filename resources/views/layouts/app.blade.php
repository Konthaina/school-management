<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="School Management System">

        <title>{{ config('app.name', 'School Management') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-white">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            <!-- Main Content Wrapper -->
            <div class="flex flex-1 overflow-hidden">
                <!-- Sidebar -->
                <aside class="hidden lg:flex w-64 bg-white dark:bg-slate-800 border-r border-slate-200 dark:border-slate-700 overflow-y-auto">
                    @include('layouts.sidebar')
                </aside>

                <!-- Main Content -->
                <main class="flex-1 overflow-y-auto">
                    <div class="bg-slate-50 dark:bg-slate-900 min-h-full">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
