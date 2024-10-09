<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

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
            <div class="container py-6" style="">
                <div class="mb-4">
                    <div class="mt-2 md:flex md:items-center md:justify-between">
                        <div class="min-w-0 flex-1">
                            <h2
                                class="text-2xl font-bold leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight">
                                Results
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    @foreach ($results['data'] as $result)
                    <a class="flex flex-col relative overflow-hidden height-auto text-foreground box-border bg-content1 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 shadow-medium rounded-large transition-transform-background motion-reduce:transition-none mb-4"
                        tabindex="-1" href="{{ route('bets.index') }}/{{ $result['id'] }}" previewlistener="true">
                        <div
                            class="relative flex w-full p-3 flex-auto flex-col place-content-inherit align-items-inherit h-auto break-words text-left overflow-y-auto subpixel-antialiased">
                            <div class="flex flex-col gap-3 lg:flex-row lg:items-center">
                                <div class="flex flex-col justify-center gap-1 lg:basis-1/2">
                                    <div class="flex items-center gap-3">
                                        <div class="text-md flex flex-row items-center gap-1 text-sm text-gray-400"><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                                class="iconify iconify--mdi" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5z">
                                                </path>
                                            </svg>{{ $result['date'] }}</div>
                                    </div>
                                    <div class="text-xl font-bold">{{ $result['event'] }}</div>
                                    <div class="break-words text-sm">{{ $result['description'] }}</div>
                                    <div class="text-md flex flex-row items-center gap-1 text-sm text-gray-400"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                            class="iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4l8-8z">
                                            </path>
                                        </svg>{{ $result['pick'] }}</div>
                                </div>
                                <div class="flex flex-row items-center gap-5 lg:basis-1/2">
                                    <div class="basis-1/5 text-center">
                                        <div class="text-2xl font-bold">{{ $result['odds'] }}</div>
                                        <div class="text-sm font-bold text-gray-400">Odds</div>
                                    </div>
                                    <div class="basis-1/5 text-center">
                                        <div class="text-2xl font-bold">{{ $result['stake'] }}</div>
                                        <div class="text-sm font-bold text-gray-400">Stake</div>
                                    </div>
                                    <div class="basis-1/5 text-center">
                                        @if ($result['status'] == 'won')
                                        <div class="text-2xl font-bold text-success">{{ $result['gain'] }}</div>
                                        @else
                                        <div class="text-2xl font-bold text-danger">{{ $result['gain'] }}</div>
                                        @endif
                                        <div class="text-sm font-bold text-gray-400">Gain</div>
                                    </div>
                                    <div class="basis-1/5 text-center">
                                        @if ($result['status'] == 'won')
                                        <div class="text-2xl font-bold text-success">{{ $result['profit'] }}</div>
                                        @else
                                        <div class="text-2xl font-bold text-danger">{{ $result['profit'] }}</div>
                                        @endif
                                        <div class="text-sm font-bold text-gray-400">Profit</div>
                                    </div>
                                    <div class="basis-1/5 text-center">
                                        @if ($result['status'] == 'won')
                                        <div
                                            class="relative max-w-fit inline-flex items-center justify-between box-border whitespace-nowrap px-1 h-7 text-small rounded-full bg-success/20 text-success-600 dark:text-success capitalize">
                                            <span
                                                class="flex-1 text-inherit font-normal px-2">{{ strtoupper($result['status']) }}</span>
                                        </div>
                                        @else
                                        <div
                                            class="relative max-w-fit inline-flex items-center justify-between box-border whitespace-nowrap px-1 h-7 text-small rounded-full bg-danger/20 text-danger dark:text-danger-500 capitalize">
                                            <span class="flex-1 text-inherit font-normal px-2">LOST</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                
            </div>
        </main>
    </div>
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @livewireScripts
</body>

</html>