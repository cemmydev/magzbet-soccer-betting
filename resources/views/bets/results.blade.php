<x-app-layout>
    <link rel="canonical" href="https://magzbet.com/dashboard" />
    <div class="container py-6" style="">
        <div class="mb-4">
            <div class="mt-2 md:flex md:items-center md:justify-between">
                <div class="min-w-0 flex-1">
                    <h2 class="text-2xl font-bold leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight">
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
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="1em"
                                        height="1em" viewBox="0 0 24 24">
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
        <div class="flex justify-center">
            <nav role="navigation" aria-label="pagination navigation" data-slot="base" data-controls="true"
                data-dots-jump="5" data-total="{{ $results['total'] }}"
                data-active-page="{{ $results['current_page'] }}"
                class="p-2.5 -m-2.5 overflow-x-scroll scrollbar-hide">
                <ul data-slot="wrapper"
                    class="flex flex-nowrap h-fit max-w-fit relative items-center overflow-visible gap-0 shadow-sm rounded-medium">
                    <a href="@if ($results['current_page'] != 1) {{ '?page=' . ($results['current_page'] - 1) }} @endif">
                        <li role="button" tabindex="0" aria-label="previous page button" data-slot="prev"
                            class="!rounded-r-none flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium"
                            data-hover="true"><svg aria-hidden="true" fill="none" focusable="false" height="1em"
                                role="presentation" viewBox="0 0 24 24" width="1em">
                                <path d="M15.5 19l-7-7 7-7" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5"></path>
                            </svg></li>
                    </a>
                    @if ($results['last_page'] <= 5)
                        @for ($i = 1; $i <= $results['last_page']; $i++)
                            <a href="{{ '?page=' . $i }}">
                                <li role="button" tabindex="0" aria-label="pagination item 1"
                                    aria-current={{ $results['current_page'] == $i ? 'true' : 'false' }}
                                    data-active={{ $results['current_page'] == $i ? 'true' : 'false' }}
                                    data-slot="item" active={{ $results['current_page'] == $i ? 'true' : 'false' }}
                                    class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium @if ($results['current_page'] == $i) {{ 'bg-primary' }} @endif">
                                    {{ $i }}</li>
                            </a>
                        @endfor
                    @else
                        @if ($results['current_page'] >= 5 && $results['current_page'] < $results['last_page'])
                            @for ($i = 1; $i < 5; $i++)
                                <a href="{{ '?page=' . $i }}">
                                    <li role="button" tabindex="0" aria-label="pagination item 1"
                                        aria-current={{ $results['current_page'] == $i ? 'true' : 'false' }}
                                        data-active={{ $results['current_page'] == $i ? 'true' : 'false' }}
                                        data-slot="item" active={{ $results['current_page'] == $i ? 'true' : 'false' }}
                                        class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium @if ($results['current_page'] == $i) {{ 'bg-primary' }} @endif">
                                        {{ $i }}</li>
                                </a>
                            @endfor
                            <li role="button" tabindex="0" aria-label="dots element" data-slot="item"
                                class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium group">
                                <svg aria-hidden="true" fill="none" height="1em"
                                    shape-rendering="geometricPrecision" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="1em"
                                    class="group-hover:hidden group-data-[focus-visible=true]:hidden">
                                    <circle cx="12" cy="12" fill="currentColor" r="1"></circle>
                                    <circle cx="19" cy="12" fill="currentColor" r="1"></circle>
                                    <circle cx="5" cy="12" fill="currentColor" r="1"></circle>
                                </svg>
                            </li>
                            <a href="{{ '?page=' . $results['current_page'] }}">
                                <li role="button" tabindex="0" aria-label="pagination item 1" data-slot="item"
                                    active='true'
                                    class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium bg-primary">
                                    {{ $results['current_page'] }}
                                </li>
                            </a>
                            <li role="button" tabindex="0" aria-label="dots element" data-slot="item"
                                class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium group">
                                <svg aria-hidden="true" fill="none" height="1em"
                                    shape-rendering="geometricPrecision" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="1em"
                                    class="group-hover:hidden group-data-[focus-visible=true]:hidden">
                                    <circle cx="12" cy="12" fill="currentColor" r="1"></circle>
                                    <circle cx="19" cy="12" fill="currentColor" r="1"></circle>
                                    <circle cx="5" cy="12" fill="currentColor" r="1"></circle>
                                </svg>
                            </li>
                            <a href="{{ '?page=' . $results['last_page'] }}">
                                <li role="button" tabindex="0" aria-label="pagination item 1"
                                    aria-current={{ $results['current_page'] == $results['last_page'] ? 'true' : 'false' }}
                                    data-active={{ $results['current_page'] == $i ? 'true' : 'false' }}
                                    data-slot="item" active={{ $results['current_page'] == $i ? 'true' : 'false' }}
                                    class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium @if ($results['current_page'] == $i) {{ 'bg-primary' }} @endif">
                                    {{ $results['last_page'] }}</li>
                            </a>
                        @else
                            @for ($i = 1; $i <= 5; $i++)
                                <a href="{{ '?page=' . $i }}">
                                    <li role="button" tabindex="0" aria-label="pagination item 1"
                                        aria-current={{ $results['current_page'] == $i ? 'true' : 'false' }}
                                        data-active={{ $results['current_page'] == $i ? 'true' : 'false' }}
                                        data-slot="item"
                                        active={{ $results['current_page'] == $i ? 'true' : 'false' }}
                                        class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium @if ($results['current_page'] == $i) {{ 'bg-primary' }} @endif">
                                        {{ $i }}</li>
                                </a>
                            @endfor
                            <li role="button" tabindex="0" aria-label="dots element" data-slot="item"
                                class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium group">
                                <svg aria-hidden="true" fill="none" height="1em"
                                    shape-rendering="geometricPrecision" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="1em"
                                    class="group-hover:hidden group-data-[focus-visible=true]:hidden">
                                    <circle cx="12" cy="12" fill="currentColor" r="1"></circle>
                                    <circle cx="19" cy="12" fill="currentColor" r="1"></circle>
                                    <circle cx="5" cy="12" fill="currentColor" r="1"></circle>
                                </svg>
                            </li>
                            <a href="{{ '?page=' . $results['last_page'] }}">
                                <li role="button" tabindex="0" aria-label="pagination item 49" data-slot="item"
                                    class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium @if ($results['current_page'] == $results['last_page']) {{ 'bg-primary' }} @endif">
                                    {{ $results['last_page'] }}</li>
                            </a>
                        @endif
                    @endif
                    <a
                        href="@if ($results['current_page'] != $results['last_page']) {{ '?page=' . ($results['current_page'] + 1) }} @endif">
                        <li role="button" tabindex="0" aria-label="next page button" data-slot="next"
                            class="!rounded-l-none flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                            <svg aria-hidden="true" fill="none" focusable="false" height="1em"
                                role="presentation" viewBox="0 0 24 24" width="1em" class="rotate-180">
                                <path d="M15.5 19l-7-7 7-7" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5"></path>
                            </svg></li>
                    </a>
                </ul>
            </nav>
        </div>
    </div>
</x-app-layout>
