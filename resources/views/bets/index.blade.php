<x-app-layout>
    <div class="container py-6" style="">
        <div class="mb-4">
            <div class="mt-2 md:flex md:items-center md:justify-between">
                <div class="min-w-0 flex-1">
                    <h2 class="text-2xl font-bold leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight">Bets
                    </h2>
                </div>
            </div>
        </div>
        <div class="mb-6">
            @if (!$bets['data'])
			    <p class="font-bold text-center">There are no bets new. Please come back later.</p>
            @else
                @foreach ($bets['data'] as $bet)
                @if($bet['subscription_plan'] == '' || Auth::user()->isAllow($bet['subscription_plan']))
                <div class="mb-4">
                    <div class="flex flex-col overflow-hidden height-auto text-foreground box-border bg-content1 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 shadow-medium rounded-large transition-transform-background motion-reduce:transition-none relative"
                        tabindex="-1">
                        <div
                            class="flex p-3 w-full justify-start shrink-0 overflow-inherit color-inherit subpixel-antialiased rounded-t-large z-auto flex-col items-start gap-4 md:flex-row md:items-center">
                            <div class="flex flex-1 flex-col justify-center gap-1">
                                <div class="flex flex-col gap-3 md:flex-row md:items-center">
                                    {{-- <div class="flex flex-row items-center gap-1 font-bold text-primary"><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            aria-hidden="true" role="img" class="iconify iconify--mdi" width="1em"
                                            height="1em" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m16.93 17.12l-.8-1.36l1.46-4.37l1.41-.47l1 .75v.14c0 .07.03.13.03.19c0 1.97-.66 3.71-1.97 5.21zM9.75 15l-1.37-4.03L12 8.43l3.62 2.54L14.25 15zM12 20.03c-.88 0-1.71-.14-2.5-.42l-.69-1.51l.66-1.1h5.11l.61 1.1l-.69 1.51c-.79.28-1.62.42-2.5.42m-6.06-2.82c-.53-.62-.99-1.45-1.38-2.46c-.39-1.02-.59-1.94-.59-2.75c0-.06.03-.12.03-.19v-.14l1-.75l1.41.47l1.46 4.37l-.8 1.36zM11 5.29v1.4L7 9.46l-1.34-.42l-.42-1.36C5.68 7 6.33 6.32 7.19 5.66s1.68-1.09 2.46-1.31zm3.35-.94c.78.22 1.6.65 2.46 1.31c.86.66 1.51 1.34 1.95 2.02l-.42 1.36l-1.34.43l-4-2.77V5.29zm-9.42.58C3 6.89 2 9.25 2 12s1 5.11 2.93 7.07S9.25 22 12 22s5.11-1 7.07-2.93S22 14.75 22 12s-1-5.11-2.93-7.07S14.75 2 12 2S6.89 3 4.93 4.93">
                                            </path>
                                        </svg>>
                                        {{(4-count($bet['subscription_plan'])).'/3'}}
                                    </div> --}}
                                </div>
                                <div class="text-xl font-bold">{{$bet['event']}}</div>
                                <div class="break-words text-sm">{{$bet['description']}}</div>
                                <div class="text-md flex flex-row items-center gap-1 text-sm text-gray-400"><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4l8-8z">
                                        </path>
                                    </svg>{{$bet['pick']}}</div>
                            </div>
                            <div>
                                <div
                                    class="relative max-w-fit inline-flex items-center justify-between box-border whitespace-nowrap px-1 h-7 text-small rounded-full bg-warning/20 text-warning-600 dark:text-warning capitalize">
                                    <span class="flex-1 text-inherit font-normal px-2">{{strtoupper($bet['status'])}}</span>
                                </div>
                            </div>
                        </div>
                        <hr class="shrink-0 bg-divider border-none w-full h-divider" role="separator">
                        <div
                            class="relative flex w-full p-3 flex-auto flex-col place-content-inherit align-items-inherit h-auto break-words text-left overflow-y-auto subpixel-antialiased">
                            <div class="flex flex-row items-center gap-5 lg:basis-1/2">
                                <div class="basis-1/4 text-center">
                                    <div class="text-2xl font-bold">
                                        @if($bet['odds'] != null) {{$bet['odds']}}
                                        @else
                                            {{"-"}}
                                        @endif
                                    </div>
                                    <div class="text-sm font-bold text-gray-400">Odds</div>
                                </div>
                                <div class="basis-1/4 text-center">
                                    <div class="text-2xl font-bold">
                                        @if($bet['stake'] != null)
                                            {{$bet['stake']}}
                                        @else
                                            {{"-"}} 
                                        @endif
                                    </div>
                                    <div class="text-sm font-bold text-gray-400">Stake</div>
                                </div>
                                <div class="basis-1/4 text-center">
                                    <div class="text-2xl font-bold">
                                        @if($bet['gain'] != null)
                                            {{$bet['gain']}}
                                        @else
                                            {{"-"}} 
                                        @endif
                                    </div>
                                    <div class="text-sm font-bold text-gray-400">Gain</div>
                                </div>
                                <div class="basis-1/4 text-center">
                                    <div class="text-2xl font-bold">
                                        @if($bet['profit'] != null)
                                            {{$bet['profit']}}
                                        @else
                                            {{"-"}} 
                                        @endif
                                    </div>

                                    <div class="text-sm font-bold text-gray-400">Profit</div>
                                </div>
                            </div>
                        </div>
                        <hr class="shrink-0 bg-divider border-none w-full h-divider" role="separator">
                        <div
                            class="h-auto w-full items-center overflow-hidden color-inherit subpixel-antialiased rounded-b-large flex justify-center p-6">
                            @if($bet['image'] != null)
                                <img loading="lazy" alt="bet-receipt" class="h-auto max-w-full w-30" src="{{asset($bet['image'])}}">
                            @endif
                        </div>
                    </div>
                </div>  
                @else
                <div class="mb-4">
                    <div class="flex flex-col overflow-hidden height-auto text-foreground box-border bg-content1 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 shadow-medium rounded-large transition-transform-background motion-reduce:transition-none relative"
                        tabindex="-1">
                        <a
                            class="tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-medium text-primary no-underline hover:opacity-80 active:opacity-disabled transition-opacity absolute inset-0 z-10 flex flex-col items-center justify-center gap-2 bg-slate-950/75"
                            tabindex="0" role="link" href="/account/subscriptions" previewlistener="true">
                            <div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                    role="img" font-size="40" class="iconify iconify--tabler" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2">
                                        <path d="M5 13a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2z"></path>
                                        <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0-2 0m-3-5V7a4 4 0 1 1 8 0v4"></path>
                                    </g>
                                </svg>
                            </div>
                            <div>You don't have access to this bet. Please buy a subscription to gain access.</div>
                        </a>
                        <div
                            class="flex p-3 w-full justify-start shrink-0 overflow-inherit color-inherit subpixel-antialiased rounded-t-large z-auto flex-col items-start gap-4 md:flex-row md:items-center blur-sm">
                            <div class="flex flex-1 flex-col justify-center gap-1">
                                <div class="flex flex-col gap-3 md:flex-row md:items-center">
                                    <div class="flex flex-row items-center gap-1 font-bold text-primary"><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            aria-hidden="true" role="img" class="iconify iconify--mdi" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m16.93 17.12l-.8-1.36l1.46-4.37l1.41-.47l1 .75v.14c0 .07.03.13.03.19c0 1.97-.66 3.71-1.97 5.21zM9.75 15l-1.37-4.03L12 8.43l3.62 2.54L14.25 15zM12 20.03c-.88 0-1.71-.14-2.5-.42l-.69-1.51l.66-1.1h5.11l.61 1.1l-.69 1.51c-.79.28-1.62.42-2.5.42m-6.06-2.82c-.53-.62-.99-1.45-1.38-2.46c-.39-1.02-.59-1.94-.59-2.75c0-.06.03-.12.03-.19v-.14l1-.75l1.41.47l1.46 4.37l-.8 1.36zM11 5.29v1.4L7 9.46l-1.34-.42l-.42-1.36C5.68 7 6.33 6.32 7.19 5.66s1.68-1.09 2.46-1.31zm3.35-.94c.78.22 1.6.65 2.46 1.31c.86.66 1.51 1.34 1.95 2.02l-.42 1.36l-1.34.43l-4-2.77V5.29zm-9.42.58C3 6.89 2 9.25 2 12s1 5.11 2.93 7.07S9.25 22 12 22s5.11-1 7.07-2.93S22 14.75 22 12s-1-5.11-2.93-7.07S14.75 2 12 2S6.89 3 4.93 4.93">
                                            </path>
                                        </svg>1/3</div>
                                </div>
                                <div class="text-xl font-bold"></div>
                            </div>
                            <div>
                                <div
                                    class="relative max-w-fit inline-flex items-center justify-between box-border whitespace-nowrap px-1 h-7 text-small rounded-full bg-warning/20 text-warning-600 dark:text-warning capitalize">
                                    <span class="flex-1 text-inherit font-normal px-2">PENDING</span></div>
                            </div>
                        </div>
                        <hr class="shrink-0 bg-divider border-none w-full h-divider" role="separator">
                        <div
                            class="relative flex w-full p-3 flex-auto flex-col place-content-inherit align-items-inherit h-auto break-words text-left overflow-y-auto subpixel-antialiased blur-sm">
                            <div class="flex flex-row items-center gap-5 lg:basis-1/2">
                                <div class="basis-1/4 text-center">
                                    <div class="text-2xl font-bold">-</div>
                                    <div class="text-sm font-bold text-gray-400">Odds</div>
                                </div>
                                <div class="basis-1/4 text-center">
                                    <div class="text-2xl font-bold">30</div>
                                    <div class="text-sm font-bold text-gray-400">Stake</div>
                                </div>
                                <div class="basis-1/4 text-center">
                                    <div class="text-2xl font-bold text-gray-200">-</div>
                                    <div class="text-sm font-bold text-gray-400">Gain</div>
                                </div>
                                <div class="basis-1/4 text-center">
                                    <div class="text-2xl font-bold text-gray-200">-</div>
                                    <div class="text-sm font-bold text-gray-400">Profit</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="flex justify-center">
            <nav role="navigation" aria-label="pagination navigation" data-slot="base" data-controls="true"
            data-dots-jump="5" data-total="49" data-active-page="1"
            class="p-2.5 -m-2.5 overflow-x-scroll scrollbar-hide">
            <ul data-slot="wrapper"
            class="flex flex-nowrap h-fit max-w-fit relative items-center overflow-visible gap-0 shadow-sm rounded-medium">
            <li role="button" tabindex="-1" aria-label="previous page button" aria-disabled="true"
            data-disabled="true" data-slot="prev"
            class="!rounded-r-none flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
            <svg aria-hidden="true" fill="none" focusable="false" height="1em" role="presentation"
            viewBox="0 0 24 24" width="1em">
            <path d="M15.5 19l-7-7 7-7" stroke="currentColor" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="1.5"></path>
        </svg>
    </li>
                    @if($bets['last_page'] <= 5)
                        @for($i=1; $i<=$bets['last_page']; $i ++)
                            <a href="{{'?page='.$i}}">
                                <li role="button" tabindex="0" aria-label="pagination item 1 active" aria-current="true"
                                data-active="true" data-slot="item"
                                class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium @if($bets['current_page'] == $i) {{"bg-primary"}} @endif">
                                {{$i}}</li>
                            </a>
                            @endfor
                            @else
                            @if($bets['current_page'] > 5)
                            
                            <li role="button" tabindex="0" aria-label="pagination item 1" data-slot="item"
                            class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                            1</li>
                            <li role="button" tabindex="0" aria-label="dots element" data-slot="item"
                            class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium group">
                            <svg aria-hidden="true" fill="none" height="1em" shape-rendering="geometricPrecision" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="1em"
                                class="group-hover:hidden group-data-[focus-visible=true]:hidden">
                                <circle cx="12" cy="12" fill="currentColor" r="1"></circle>
                                <circle cx="19" cy="12" fill="currentColor" r="1"></circle>
                                <circle cx="5" cy="12" fill="currentColor" r="1"></circle>
                            </svg><svg aria-hidden="true" fill="none" focusable="false" height="1em" role="presentation"
                            shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" viewBox="0 0 24 24" width="1em"
                            class="hidden group-hover:block group-data-[focus-visible=true]:block data-[before=true]:rotate-180"
                            data-before="true">
                            <path d="M13 17l5-5-5-5"></path>
                            <path d="M6 17l5-5-5-5"></path>
                        </svg>
                    </li>
                    <li role="button" tabindex="0" aria-label="pagination item 4" data-slot="item"
                            class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                            4</li>
                        <li role="button" tabindex="0" aria-label="pagination item 5 active" data-slot="item"
                            class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium"
                            style="user-select: none;" aria-current="true" data-active="true">5</li>
                        <li role="button" tabindex="0" aria-label="pagination item 6" data-slot="item"
                        class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                        6</li>
                        <li role="button" tabindex="0" aria-label="dots element" data-slot="item"
                        class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium group">
                        <svg aria-hidden="true" fill="none" height="1em" shape-rendering="geometricPrecision" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="1em"
                                class="group-hover:hidden group-data-[focus-visible=true]:hidden">
                                <circle cx="12" cy="12" fill="currentColor" r="1"></circle>
                                <circle cx="19" cy="12" fill="currentColor" r="1"></circle>
                                <circle cx="5" cy="12" fill="currentColor" r="1"></circle>
                            </svg><svg aria-hidden="true" fill="none" focusable="false" height="1em" role="presentation"
                            shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" viewBox="0 0 24 24" width="1em"
                            class="hidden group-hover:block group-data-[focus-visible=true]:block data-[before=true]:rotate-180">
                            <path d="M13 17l5-5-5-5"></path>
                            <path d="M6 17l5-5-5-5"></path>
                        </svg>
                    </li>
                    <li role="button" tabindex="0" aria-label="pagination item 68" data-slot="item"
                    class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                    68</li>
                        @else
                        <li role="button" tabindex="0" aria-label="pagination item 1 active" aria-current="true"
                        data-active="true" data-slot="item"
                        class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                        1</li>
                        <li role="button" tabindex="0" aria-label="pagination item 2" data-slot="item"
                        class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                        2</li>
                        <li role="button" tabindex="0" aria-label="pagination item 3" data-slot="item"
                        class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                        3</li>
                        <li role="button" tabindex="0" aria-label="pagination item 4" data-slot="item"
                        class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                        4</li>
                        <li role="button" tabindex="0" aria-label="pagination item 5" data-slot="item"
                            class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                            5</li>
                            <li role="button" tabindex="0" aria-label="dots element" data-slot="item"
                            class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium group">
                            <svg aria-hidden="true" fill="none" height="1em" shape-rendering="geometricPrecision"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                            width="1em" class="group-hover:hidden group-data-[focus-visible=true]:hidden">
                            <circle cx="12" cy="12" fill="currentColor" r="1"></circle>
                            <circle cx="19" cy="12" fill="currentColor" r="1"></circle>
                                <circle cx="5" cy="12" fill="currentColor" r="1"></circle>
                            </svg><svg aria-hidden="true" fill="none" focusable="false" height="1em" role="presentation"
                            shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="1em"
                                class="hidden group-hover:block group-data-[focus-visible=true]:block data-[before=true]:rotate-180">
                                <path d="M13 17l5-5-5-5"></path>
                                <path d="M6 17l5-5-5-5"></path>
                            </svg>
                        </li>
                        <li role="button" tabindex="0" aria-label="pagination item 49" data-slot="item"
                        class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                        {{$bets['last_page']}}</li>
                        @endif
                        @endif
                        <li role="button" tabindex="0" aria-label="next page button" data-slot="next"
                        class="!rounded-l-none flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                        <svg aria-hidden="true" fill="none" focusable="false" height="1em" role="presentation"
                            viewBox="0 0 24 24" width="1em" class="rotate-180">
                            <path d="M15.5 19l-7-7 7-7" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1.5"></path>
                        </svg>
                    </li>
                </ul>
            </nav>
        </div>
        @endif
    </div>
</x-app-layout>