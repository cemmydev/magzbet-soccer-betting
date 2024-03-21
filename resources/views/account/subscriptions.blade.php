<x-app-layout>
    <main>
        <div class="container py-6">
            <div class="mb-4">
                <nav class="hidden sm:flex" aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center">
                        <li>
                            <div class="flex items-center"><a
                                    class="relative inline-flex items-center tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 no-underline hover:opacity-80 active:opacity-disabled transition-opacity text-sm font-medium text-gray-400 hover:text-gray-200"
                                    tabindex="0" role="link" href="/account" previewlistener="true">Account</a></div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true" data-slot="icon"
                                    class="my-2 h-5 w-5 flex-shrink-0 text-gray-500">
                                    <path fill-rule="evenodd"
                                        d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a
                                    class="relative inline-flex items-center tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 no-underline hover:opacity-80 active:opacity-disabled transition-opacity text-sm font-medium text-gray-400 hover:text-gray-200 pointer-events-none"
                                    tabindex="0" role="link" href="" previewlistener="true">
                                    Subscriptions
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="mt-2 md:flex md:items-center md:justify-between">
                    <div class="min-w-0 flex-1">
                        <h2 class="text-2xl font-bold leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight">
                            Subscriptions</h2>
                    </div>
                </div>
            </div>
            <div class="pb-16 pt-4">
                <div class="mx-auto max-w-4xl text-center">
                    <p class="mt-2 text-4xl font-bold tracking-tight text-white sm:text-5xl">Ready to Subscribe?</p>
                </div>
                <p class="mx-auto mt-6 max-w-2xl text-center text-lg leading-8 text-gray-300">Take your experience to
                    the
                    next level! Subscribe now and unlock premium features every month</p>
                <div class="isolate mt-10 flex flex-col flex-wrap items-center justify-center gap-8 md:flex-row">
                    @foreach($subscriptions as $subscription)
                    <div class="ring-1 ring-white/10 rounded-3xl p-10 w-full max-w-xs">
                        <div class="flex items-center justify-between gap-x-4">
                            <h3 class="text-lg font-semibold leading-8 text-white">{{$subscription['name']}}</h3>
                        </div>
                        <p class="mt-4 text-sm leading-6 text-gray-300">This is a monthly recurring subscription for 1/3
                            bet
                            category.</p>
                        <p class="mt-6 flex items-baseline gap-x-1">
                            <span
                                class="text-4xl font-bold tracking-tight text-white">${{$subscription['cost']}}
                            </span>
                            <span class="text-sm font-semibold leading-6 text-gray-300">/ Month</span>
                        </p>
                        <a href="{{route('pay.subscription', $subscription['id'])}}" aria-describedby="price_1OP0mOIqx9qI75cwVCvFEpUY" class="bg-green-500 text-white shadow-sm hover:bg-green-400 focus-visible:outline-green-500 mt-6 block rounded-md px-3 py-2 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
                            Buy Subscription
                        </a>
                    </div>
                    @endforeach
                    <!-- <div class="ring-1 ring-white/10 rounded-3xl p-10 w-full max-w-xs">
                    <div class="flex items-center justify-between gap-x-4">
                        <h3 class="text-lg font-semibold leading-8 text-white">1/3</h3>
                    </div>
                    <p class="mt-4 text-sm leading-6 text-gray-300">This is a monthly recurring subscription for 1/3 bet
                        category.</p>
                    <p class="mt-6 flex items-baseline gap-x-1"><span
                            class="text-4xl font-bold tracking-tight text-white">€50.00</span><span
                            class="text-sm font-semibold leading-6 text-gray-300">/ Month</span></p><a href="#"
                        aria-describedby="price_1OP0mOIqx9qI75cwVCvFEpUY"
                        class="bg-green-500 text-white shadow-sm hover:bg-green-400 focus-visible:outline-green-500 mt-6 block rounded-md px-3 py-2 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Buy
                        Subscription</a>
                </div>
                <div class="bg-white/5 ring-2 ring-green-500 rounded-3xl p-10 w-full max-w-xs">
                    <div class="flex items-center justify-between gap-x-4">
                        <h3 class="text-lg font-semibold leading-8 text-white">Giveaway Offer</h3>
                        <p
                            class="rounded-full bg-green-600/10 px-2.5 py-1 text-xs font-semibold leading-5 text-green-600">
                            Offer</p>
                    </div>
                    <p class="mt-4 text-sm leading-6 text-gray-300">This giveaway subscription gives you access to all
                        bet categories and bots. Duration of the subscription is one (1) month.</p>
                    <p class="mt-6 flex items-baseline gap-x-1"><span
                            class="text-4xl font-bold tracking-tight text-white">€100.00</span></p><a href="#"
                        aria-describedby="price_1OdeGYIqx9qI75cwd5s7vsDI"
                        class="bg-green-500 text-white shadow-sm hover:bg-green-400 focus-visible:outline-green-500 mt-6 block rounded-md px-3 py-2 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Buy
                        Subscription</a>
                </div>
                <div class="ring-1 ring-white/10 rounded-3xl p-10 w-full max-w-xs">
                    <div class="flex items-center justify-between gap-x-4">
                        <h3 class="text-lg font-semibold leading-8 text-white">1/3 + 2/3 + 3/3</h3>
                    </div>
                    <p class="mt-4 text-sm leading-6 text-gray-300">This is a monthly recurring subscription for all bet
                        categories.</p>
                    <p class="mt-6 flex items-baseline gap-x-1"><span
                            class="text-4xl font-bold tracking-tight text-white">€140.00</span><span
                            class="text-sm font-semibold leading-6 text-gray-300">/ Month</span></p><a href="#"
                        aria-describedby="price_1OdeFVIqx9qI75cwJwKrHMYU"
                        class="bg-green-500 text-white shadow-sm hover:bg-green-400 focus-visible:outline-green-500 mt-6 block rounded-md px-3 py-2 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Buy
                        Subscription</a>
                </div> -->
                </div>
            </div>
            <hr class="shrink-0 bg-divider border-none w-full h-divider mb-10" role="separator">
            <div class="mb-5">
                <h2 class="mb-4 text-2xl">Manage Your Subscription with Ease</h2>
                <p><strong>Looking to Update, Renew, or Cancel Your Subscription?</strong></p>
            </div>
            <div class="mb-5">
                <p>We've made managing your subscription hassle-free! Simply visit our <a href="#">Stripe Customer
                        Portal</a>, where you can effortlessly:</p>
                <ul class="list-disc pl-5">
                    <li><strong>Renew</strong> your subscription for continued access to our amazing services.</li>
                    <li><strong>Change</strong> your subscription plan to better suit your needs.</li>
                    <li><strong>Cancel</strong> your subscription, if you ever need to (though we'd hate to see you
                        go!).
                    </li>
                </ul>
            </div>
            <div class="mb-8">
                <p class="mb-2">The Stripe Customer Portal offers a secure, user-friendly interface, ensuring you have
                    complete control over your subscription preferences.</p>
                <div class="mb-2"><a
                        class="tap-highlight-transparent no-underline hover:opacity-80 active:opacity-disabled transition-opacity z-0 group relative inline-flex items-center justify-center box-border appearance-none select-none whitespace-nowrap font-normal subpixel-antialiased overflow-hidden tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 px-unit-4 min-w-unit-20 h-unit-10 text-small gap-unit-2 rounded-medium [&amp;>svg]:max-w-[theme(spacing.unit-8)] data-[pressed=true]:scale-[0.97] transition-transform-colors-opacity motion-reduce:transition-none bg-primary text-primary-foreground data-[hover=true]:opacity-hover"
                        tabindex="0" role="button" href="#"
                        target="_blank" previewlistener="true">Disable renew subscription<svg aria-hidden="true" fill="none"
                            focusable="false" height="1em" shape-rendering="geometricPrecision" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                            width="1em" class="flex mx-1 text-current self-center">
                            <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"></path>
                            <path d="M15 3h6v6"></path>
                            <path d="M10 14L21 3"></path>
                        </svg></a></div>
                <p><small>(Clicking this link will redirect you to the Stripe Customer Portal.)</small></p>
            </div>
            <div class="mb-5">
                <h2 class="mb-4 text-2xl">My Subscriptions</h2>
            </div>
            <div class="flex flex-col relative gap-4 w-full mb-4">
                <div
                    class="p-4 z-0 flex flex-col relative justify-between gap-4 bg-content1 overflow-auto rounded-large shadow-small w-full">
                    <table aria-label="Subscriptions Table" id="react-aria4728753573-:rq:" role="grid" tabindex="0"
                        aria-describedby="" class="min-w-full h-auto table-auto w-full">
                        <thead class="[&amp;>tr]:first:rounded-lg" role="rowgroup">
                            <tr role="row"
                                class="group outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 cursor-default">
                                <th data-key="$.0" role="columnheader" tabindex="-1" id="react-aria4728753573-:rq:-$.0"
                                    class="group px-3 h-10 text-left align-middle bg-default-100 whitespace-nowrap text-foreground-500 text-tiny font-semibold first:rounded-l-lg last:rounded-r-lg data-[sortable=true]:transition-colors data-[sortable=true]:cursor-pointer data-[hover=true]:text-foreground-400 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2">
                                    PRODUCT</th>
                                <th data-key="$.2" role="columnheader" tabindex="-1" id="react-aria4728753573-:rq:-$.2"
                                    class="group px-3 h-10 align-middle bg-default-100 whitespace-nowrap text-foreground-500 text-tiny font-semibold first:rounded-l-lg last:rounded-r-lg data-[sortable=true]:transition-colors data-[sortable=true]:cursor-pointer data-[hover=true]:text-foreground-400 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-end"
                                    width="150">SUBSCRIPTION DATE</th>
                                <th data-key="$.3" role="columnheader" tabindex="-1" id="react-aria4728753573-:rq:-$.3"
                                    class="group px-3 h-10 align-middle bg-default-100 whitespace-nowrap text-foreground-500 text-tiny font-semibold first:rounded-l-lg last:rounded-r-lg data-[sortable=true]:transition-colors data-[sortable=true]:cursor-pointer data-[hover=true]:text-foreground-400 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-end"
                                    width="150">START DATE</th>
                                <th data-key="$.4" role="columnheader" tabindex="-1" id="react-aria4728753573-:rq:-$.4"
                                    class="group px-3 h-10 align-middle bg-default-100 whitespace-nowrap text-foreground-500 text-tiny font-semibold first:rounded-l-lg last:rounded-r-lg data-[sortable=true]:transition-colors data-[sortable=true]:cursor-pointer data-[hover=true]:text-foreground-400 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-end"
                                    width="150">END DATE</th>
                                <th data-key="$.5" role="columnheader" tabindex="-1" id="react-aria4728753573-:rq:-$.5"
                                    class="group px-3 h-10 align-middle bg-default-100 whitespace-nowrap text-foreground-500 text-tiny font-semibold first:rounded-l-lg last:rounded-r-lg data-[sortable=true]:transition-colors data-[sortable=true]:cursor-pointer data-[hover=true]:text-foreground-400 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-center"
                                    width="200">STATUS</th>
                            </tr>
                            <tr tabindex="-1" aria-hidden="true" class="w-px h-px block"
                                style="margin-left: 0.25rem; margin-top: 0.25rem;"></tr>
                        </thead>
                        <tbody role="rowgroup">
                            @foreach($mySubscriptions as $singleSub)
                            <tr data-first="true" role="row" aria-selected="false" tabindex="-1" data-key="3798"
                                aria-labelledby="react-aria4728753573-:rq:-3798-$.0"
                                class="group outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 cursor-default">
                                <td tabindex="-1" data-key="3798.0" role="rowheader"
                                    id="react-aria4728753573-:rq:-3798-$.0"
                                    class="py-2 px-3 relative align-middle text-small font-normal [&amp;>*]:z-1 [&amp;>*]:relative outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 before:content-[''] before:absolute before:z-0 before:inset-0 before:opacity-0 data-[selected=true]:before:opacity-100 group-data-[disabled=true]:text-foreground-300 before:bg-default/40 data-[selected=true]:text-default-foreground group-aria-[selected=false]:group-data-[hover=true]:before:bg-default-100 group-aria-[selected=false]:group-data-[hover=true]:before:opacity-70 first:before:rounded-l-lg last:before:rounded-r-lg whitespace-nowrap">
                                    <span>{{$singleSub['name']}}</span>
                                </td>
                                <td tabindex="-1" data-key="3798.2" role="gridcell"
                                    class="py-2 px-3 relative align-middle whitespace-normal text-small font-normal [&amp;>*]:z-1 [&amp;>*]:relative outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 before:content-[''] before:absolute before:z-0 before:inset-0 before:opacity-0 data-[selected=true]:before:opacity-100 group-data-[disabled=true]:text-foreground-300 before:bg-default/40 data-[selected=true]:text-default-foreground group-aria-[selected=false]:group-data-[hover=true]:before:bg-default-100 group-aria-[selected=false]:group-data-[hover=true]:before:opacity-70 first:before:rounded-l-lg last:before:rounded-r-lg text-end">
                                    <span>{{date('Y-m-d', strtotime($singleSub['pivot']['created_at']))}}</span>
                                </td>
                                <td tabindex="-1" data-key="3798.3" role="gridcell"
                                    class="py-2 px-3 relative align-middle whitespace-normal text-small font-normal [&amp;>*]:z-1 [&amp;>*]:relative outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 before:content-[''] before:absolute before:z-0 before:inset-0 before:opacity-0 data-[selected=true]:before:opacity-100 group-data-[disabled=true]:text-foreground-300 before:bg-default/40 data-[selected=true]:text-default-foreground group-aria-[selected=false]:group-data-[hover=true]:before:bg-default-100 group-aria-[selected=false]:group-data-[hover=true]:before:opacity-70 first:before:rounded-l-lg last:before:rounded-r-lg text-end">
                                    <span>{{$singleSub['pivot']['start_at']}}</span>
                                </td>
                                <td tabindex="-1" data-key="3798.4" role="gridcell"
                                    class="py-2 px-3 relative align-middle whitespace-normal text-small font-normal [&amp;>*]:z-1 [&amp;>*]:relative outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 before:content-[''] before:absolute before:z-0 before:inset-0 before:opacity-0 data-[selected=true]:before:opacity-100 group-data-[disabled=true]:text-foreground-300 before:bg-default/40 data-[selected=true]:text-default-foreground group-aria-[selected=false]:group-data-[hover=true]:before:bg-default-100 group-aria-[selected=false]:group-data-[hover=true]:before:opacity-70 first:before:rounded-l-lg last:before:rounded-r-lg text-end">
                                    <span>{{$singleSub['pivot']['expire_at']}}</span>
                                </td>
                                <td tabindex="-1" data-key="3798.5" role="gridcell"
                                    class="py-2 px-3 relative align-middle whitespace-normal text-small font-normal [&amp;>*]:z-1 [&amp;>*]:relative outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 before:content-[''] before:absolute before:z-0 before:inset-0 before:opacity-0 data-[selected=true]:before:opacity-100 group-data-[disabled=true]:text-foreground-300 before:bg-default/40 data-[selected=true]:text-default-foreground group-aria-[selected=false]:group-data-[hover=true]:before:bg-default-100 group-aria-[selected=false]:group-data-[hover=true]:before:opacity-70 first:before:rounded-l-lg last:before:rounded-r-lg text-center">
                                    @if(strtotime($singleSub['pivot']['expire_at']) < strtotime(now()->toString()))
                                        <div
                                            class="relative max-w-fit inline-flex items-center justify-between box-border whitespace-nowrap px-1 h-7 text-small rounded-full bg-danger/20 text-danger dark:text-danger-500 capitalize">
                                            <span class="flex-1 text-inherit font-normal px-2">EXPIRED</span>
                                        </div>
                                        @else
                                        <div
                                            class="relative max-w-fit inline-flex items-center justify-between box-border whitespace-nowrap px-1 h-7 text-small rounded-full bg-success/20 text-success-600 dark:text-success capitalize">
                                            <span class="flex-1 text-inherit font-normal px-2">ACITVE</span>
                                        </div>
                                        @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-center">
                <nav role="navigation" aria-label="pagination navigation" data-slot="base" data-controls="true"
                    data-dots-jump="5" data-total="1" data-active-page="1"
                    class="p-2.5 -m-2.5 overflow-x-scroll scrollbar-hide">
                    <ul data-slot="wrapper"
                        class="flex flex-nowrap h-fit max-w-fit relative items-center overflow-visible gap-0 shadow-sm rounded-medium">
                        <span aria-hidden="true" data-slot="cursor"
                            class="absolute flex overflow-visible items-center justify-center origin-center left-0 select-none touch-none pointer-events-none z-20 data-[moving=true]:transition-transform !data-[moving=true]:duration-300 opacity-0 data-[moving]:opacity-100 shadow-primary/40 bg-primary text-primary-foreground shadow-md min-w-9 w-9 h-9 text-small rounded-medium"
                            data-moving="false" style="transform: translateX(36px) scale(1);">1</span>
                        <li role="button" tabindex="-1" aria-label="previous page button" aria-disabled="true"
                            data-disabled="true" data-slot="prev"
                            class="!rounded-r-none flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                            <svg aria-hidden="true" fill="none" focusable="false" height="1em" role="presentation"
                                viewBox="0 0 24 24" width="1em">
                                <path d="M15.5 19l-7-7 7-7" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5"></path>
                            </svg>
                        </li>
                        <li role="button" tabindex="0" aria-label="pagination item 1 active" aria-current="true"
                            data-active="true" data-slot="item"
                            class="tap-highlight-transparent select-none touch-none first-of-type:rounded-r-none last-of-type:rounded-l-none [&amp;:not(:first-of-type):not(:last-of-type)]:rounded-none data-[pressed=true]:scale-[0.97] transition-transform-background flex flex-wrap truncate box-border items-center justify-center text-default-foreground outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 data-[disabled=true]:text-default-300 data-[disabled=true]:pointer-events-none shadow-sm bg-default-100 [&amp;[data-hover=true]:not([data-active=true])]:bg-default-200 active:bg-default-300 min-w-9 w-9 h-9 text-small rounded-medium">
                            1</li>
                        <li role="button" tabindex="-1" aria-label="next page button" aria-disabled="true"
                            data-disabled="true" data-slot="next"
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
        </div>
    </main>
</x-app-layout>