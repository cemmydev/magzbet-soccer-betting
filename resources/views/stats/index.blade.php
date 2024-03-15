<x-app-layout>
    <main>
        <div class="container py-6">
            <div class="mb-4">
                <div class="mt-2 md:flex md:items-center md:justify-between">
                    <div class="min-w-0 flex-1">
                        <h2 class="text-2xl font-bold leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight">Stats
                        </h2>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h2 class="mb-4 text-2xl">Here you can see our last 30 days stats</h2>
            </div>
            <div>
                @foreach ($subscriptions as $sub)
                <div class="flex flex-col relative overflow-hidden height-auto text-foreground box-border bg-content1 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 shadow-medium rounded-large transition-transform-background motion-reduce:transition-none mb-4"
                    tabindex="-1">
                    <div
                        class="p-3 z-10 w-full justify-start shrink-0 overflow-inherit color-inherit subpixel-antialiased rounded-t-large flex items-center">
                        <div class="flex flex-1 flex-row items-center gap-2 text-xl font-bold text-primary"><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="1em" height="1em"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m16.93 17.12l-.8-1.36l1.46-4.37l1.41-.47l1 .75v.14c0 .07.03.13.03.19c0 1.97-.66 3.71-1.97 5.21zM9.75 15l-1.37-4.03L12 8.43l3.62 2.54L14.25 15zM12 20.03c-.88 0-1.71-.14-2.5-.42l-.69-1.51l.66-1.1h5.11l.61 1.1l-.69 1.51c-.79.28-1.62.42-2.5.42m-6.06-2.82c-.53-.62-.99-1.45-1.38-2.46c-.39-1.02-.59-1.94-.59-2.75c0-.06.03-.12.03-.19v-.14l1-.75l1.41.47l1.46 4.37l-.8 1.36zM11 5.29v1.4L7 9.46l-1.34-.42l-.42-1.36C5.68 7 6.33 6.32 7.19 5.66s1.68-1.09 2.46-1.31zm3.35-.94c.78.22 1.6.65 2.46 1.31c.86.66 1.51 1.34 1.95 2.02l-.42 1.36l-1.34.43l-4-2.77V5.29zm-9.42.58C3 6.89 2 9.25 2 12s1 5.11 2.93 7.07S9.25 22 12 22s5.11-1 7.07-2.93S22 14.75 22 12s-1-5.11-2.93-7.07S14.75 2 12 2S6.89 3 4.93 4.93">
                                </path>
                            </svg>{{$sub['name']}}</div>
                        <div class="flex flex-row gap-2">
                            <div class="text-xl font-bold text-gray-400">ROI:</div>
                            <div class="text-xl font-bold">{{$data[$sub['name']]['roi']}}%</div>
                        </div>
                    </div>
                    <hr class="shrink-0 bg-divider border-none w-full h-divider" role="separator">
                    <div
                        class="relative w-full p-3 flex-auto flex-col place-content-inherit align-items-inherit h-auto break-words text-left overflow-y-auto subpixel-antialiased grid grid-cols-3 gap-3 lg:grid-cols-5">
                        <div class="flex flex-col items-center gap-1">
                            <div class="text-xl font-bold">{{$data[$sub['name']]['total']}}</div>
                            <div class="uppercase text-gray-300">Total</div>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <div class="text-xl font-bold">{{$data[$sub['name']]['won']}}</div>
                            <div class="uppercase text-gray-300">Won</div>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <div class="text-xl font-bold">{{$data[$sub['name']]['lost']}}</div>
                            <div class="uppercase text-gray-300">Lost</div>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <div class="text-xl font-bold">{{$data[$sub['name']]['stake']}}</div>
                            <div class="uppercase text-gray-300">Stake</div>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <div class="text-xl font-bold">{{$data[$sub['name']]['profit']}}</div>
                            <div class="uppercase text-gray-300">Profit</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</x-app-layout>