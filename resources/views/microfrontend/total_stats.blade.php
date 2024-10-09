<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark" style="overflow:hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/favicon-16x16.png" sizes="16x16">
    <link rel="icon" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" href="/favicon.ico" sizes="48x48">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png"><!-- 180×180 -->
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('css/bettok-1.css')}}">
    <link rel="stylesheet" href="{{asset('css/bettok-2.css')}}">
    @stack('styles')
    <!-- Scripts -->
    <script type="application/javascript" src="{{ mix('js/vendor.js') }}" defer></script>
    <script type="application/javascript" src="{{ mix('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @livewireStyles
    <!-- Scripts -->
    @stack('scripts')
</head>

<body class="font-sans antialiased">
    <x-notifications.toaster />
    <div class="min-h-screen">
        <main>
            <link rel="canonical" href="https://magzbet.com/dashboard" />
            <div class="container py-12">
            <dl class="grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-3">
            <div class="flex flex-col bg-white/5 p-8">
                <dt class="text-sm font-semibold uppercase leading-6 text-gray-300">Total Bets</dt>
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">{{$total_bets}}</dd>
            </div>
            <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm font-semibold uppercase leading-6 text-gray-300">Win Ratio</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">{{$win_ratio}} %</dd>
                    </div>
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm font-semibold uppercase leading-6 text-gray-300">ROI</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">{{$ROI}} %</dd>
                    </div>
                </dl>
            </div>
        </main>
    </div>
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @livewireScripts
</body>

</html>