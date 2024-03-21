<x-app-layout>
    <main>
        <div class="container py-6">
            <div class="mb-4">
                <nav class="hidden sm:flex" aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center">
                        <li>
                            <div class="flex items-center"><a
                                    class="relative inline-flex items-center tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 no-underline hover:opacity-80 active:opacity-disabled transition-opacity text-sm font-medium text-gray-400 hover:text-gray-200"
                                    tabindex="0" role="link" href="/bets" previewlistener="true">Bets</a></div>
                        </li>
                        <li>
                            <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true" data-slot="icon"
                                    class="my-2 h-5 w-5 flex-shrink-0 text-gray-500">
                                    <path fill-rule="evenodd"
                                        d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd"></path>
                                </svg><a
                                    class="relative inline-flex items-center tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 no-underline hover:opacity-80 active:opacity-disabled transition-opacity text-sm font-medium text-gray-400 hover:text-gray-200 pointer-events-none"
                                    tabindex="0" role="link" href="" previewlistener="true">Bet Details</a></div>
                        </li>
                    </ol>
                </nav>
                <div class="mt-2 md:flex md:items-center md:justify-between">
                    <div class="min-w-0 flex-1">
                        <h2 class="text-2xl font-bold leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight">
                            Bet Details</h2>
                    </div>
                </div>
            </div>
            <div class="flex flex-col overflow-hidden height-auto text-foreground box-border bg-content1 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 shadow-medium rounded-large transition-transform-background motion-reduce:transition-none relative"
                tabindex="-1">
                <div
                    class="flex p-3 w-full justify-start shrink-0 overflow-inherit color-inherit subpixel-antialiased rounded-t-large z-auto flex-col items-start gap-4 md:flex-row md:items-center">
                    <div class="flex flex-1 flex-col justify-center gap-1">
                        <div class="flex flex-col gap-3 md:flex-row md:items-center">
                            {{-- <div class="flex flex-row items-center gap-1 font-bold text-primary"><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    aria-hidden="true" role="img" class="iconify iconify--mdi" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m16.93 17.12l-.8-1.36l1.46-4.37l1.41-.47l1 .75v.14c0 .07.03.13.03.19c0 1.97-.66 3.71-1.97 5.21zM9.75 15l-1.37-4.03L12 8.43l3.62 2.54L14.25 15zM12 20.03c-.88 0-1.71-.14-2.5-.42l-.69-1.51l.66-1.1h5.11l.61 1.1l-.69 1.51c-.79.28-1.62.42-2.5.42m-6.06-2.82c-.53-.62-.99-1.45-1.38-2.46c-.39-1.02-.59-1.94-.59-2.75c0-.06.03-.12.03-.19v-.14l1-.75l1.41.47l1.46 4.37l-.8 1.36zM11 5.29v1.4L7 9.46l-1.34-.42l-.42-1.36C5.68 7 6.33 6.32 7.19 5.66s1.68-1.09 2.46-1.31zm3.35-.94c.78.22 1.6.65 2.46 1.31c.86.66 1.51 1.34 1.95 2.02l-.42 1.36l-1.34.43l-4-2.77V5.29zm-9.42.58C3 6.89 2 9.25 2 12s1 5.11 2.93 7.07S9.25 22 12 22s5.11-1 7.07-2.93S22 14.75 22 12s-1-5.11-2.93-7.07S14.75 2 12 2S6.89 3 4.93 4.93">
                                    </path>
                                </svg>{{(4-count($bet['subscription_plan'])).'/3'}}</div> --}}
                            <div class="text-md flex flex-row items-center gap-1 text-sm text-gray-400"><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    aria-hidden="true" role="img" class="iconify iconify--mdi" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5z">
                                    </path>
                                </svg>{{$bet['date']}}</div>
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
                        @if($bet['status'] == 'won')
                            <div
                                class="relative max-w-fit inline-flex items-center justify-between box-border whitespace-nowrap px-1 h-7 text-small rounded-full bg-success/20 text-success-600 dark:text-success capitalize">
                                <span class="flex-1 text-inherit font-normal px-2">WON</span>
                            </div>
                        @else
                            <div class="relative max-w-fit inline-flex items-center justify-between box-border whitespace-nowrap px-1 h-7 text-small rounded-full bg-danger/20 text-danger dark:text-danger-500 capitalize">
                                <span class="flex-1 text-inherit font-normal px-2">LOST</span>
                            </div>
                        @endif
                    </div>
                </div>
                <hr class="shrink-0 bg-divider border-none w-full h-divider" role="separator">
                <div
                    class="relative flex w-full p-3 flex-auto flex-col place-content-inherit align-items-inherit h-auto break-words text-left overflow-y-auto subpixel-antialiased">
                    <div class="flex flex-row items-center gap-5 lg:basis-1/2">
                        <div class="basis-1/4 text-center">
                            <div class="text-2xl font-bold">{{$bet['odds']}}</div>
                            <div class="text-sm font-bold text-gray-400">Odds</div>
                        </div>
                        <div class="basis-1/4 text-center">
                            <div class="text-2xl font-bold">{{$bet['stake']}}</div>
                            <div class="text-sm font-bold text-gray-400">Stake</div>
                        </div>
                        <div class="basis-1/4 text-center">
                            <div class="text-2xl font-bold text-success">{{$bet['gain']}}</div>
                            <div class="text-sm font-bold text-gray-400">Gain</div>
                        </div>
                        <div class="basis-1/4 text-center">
                            <div class="text-2xl font-bold text-success">{{$bet['profit']}}</div>
                            <div class="text-sm font-bold text-gray-400">Profit</div>
                        </div>
                    </div>
                </div>
                <hr class="shrink-0 bg-divider border-none w-full h-divider" role="separator">
                <div
                    class="h-auto w-full items-center overflow-hidden color-inherit subpixel-antialiased rounded-b-large flex justify-center p-6">
                    @if($bet['image'])
                        <img loading="lazy" alt="bet-receipt" class="h-auto max-w-full" src="/{{$bet['image']}}"></div>
                    @endif
            </div>
        </div>
    </main>
</x-app-layout>