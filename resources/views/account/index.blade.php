<x-app-layout>
    <main>
        <div class="container py-6">
            <div class="flex flex-col gap-4 lg:flex-row">
                <div class="lg:basis-1/4">
                    <div class="flex flex-col relative overflow-hidden height-auto text-foreground box-border bg-content1 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 shadow-none rounded-large transition-transform-background motion-reduce:transition-none" tabindex="-1">
                        <div
                            class="relative flex w-full p-3 flex-auto flex-col place-content-inherit align-items-inherit h-auto break-words text-left overflow-y-auto subpixel-antialiased">
                            <div class="mb-5 flex flex-col items-center">
                                <span tabindex="-1"
                                    class="flex relative justify-center items-center box-border overflow-hidden align-middle z-0 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-tiny bg-primary text-primary-foreground rounded-full ring-2 ring-offset-2 ring-offset-background dark:ring-offset-background-dark ring-primary h-24 w-24">
                                    <img
                                        src="/images/logo.webp"
                                        class="flex object-cover w-full h-full transition-opacity !duration-500 opacity-0 data-[loaded=true]:opacity-100"
                                        alt="avatar" data-loaded="true">
                                </span>
                            </div>
                            <div class="flex flex-row justify-center gap-4"><input accept="image/*" class="hidden" type="file">
                                <button
                                    class="z-0 group relative inline-flex items-center justify-center box-border appearance-none select-none whitespace-nowrap font-normal subpixel-antialiased overflow-hidden tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-tiny gap-unit-2 rounded-small px-unit-0 !gap-unit-0 data-[pressed=true]:scale-[0.97] transition-transform-colors-opacity motion-reduce:transition-none bg-primary text-primary-foreground min-w-unit-8 w-unit-8 h-unit-8 data-[hover=true]:opacity-hover"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                        class="iconify iconify--material-symbols" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M11 16V7.85l-2.6 2.6L7 9l5-5l5 5l-1.4 1.45l-2.6-2.6V16zm-5 4q-.825 0-1.412-.587T4 18v-3h2v3h12v-3h2v3q0 .825-.587 1.413T18 20z">
                                        </path>
                                    </svg>
                                </button>
                                <button
                                    class="z-0 group relative inline-flex items-center justify-center box-border appearance-none select-none whitespace-nowrap font-normal subpixel-antialiased overflow-hidden tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-tiny gap-unit-2 rounded-small opacity-disabled pointer-events-none px-unit-0 !gap-unit-0 data-[pressed=true]:scale-[0.97] transition-transform-colors-opacity motion-reduce:transition-none bg-danger text-danger-foreground min-w-unit-8 w-unit-8 h-unit-8 data-[hover=true]:opacity-hover"
                                    data-disabled="true" type="button" disabled="">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        aria-hidden="true" role="img" class="iconify iconify--icon-park-outline"
                                        width="1em" height="1em" viewBox="0 0 48 48">
                                        <g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4">
                                            <path d="M9 10v34h30V10z"></path>
                                            <path stroke-linecap="round" d="M20 20v13m8-13v13M4 10h40"></path>
                                            <path d="m16 10l3.289-6h9.488L32 10z"></path>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div
                            class="p-3 h-auto w-full items-center overflow-hidden color-inherit subpixel-antialiased rounded-b-large flex flex-col">
                            <h5 class="text-xl font-bold">{{Auth::user()->name}}</h5>
                            <p class="text-sm text-gray-300">{{Auth::user()->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="lg:basis-3/4">
                    <div data-focus="false" data-focus-visible="false" id="react-aria9028004585-:rs:-tabpanel-Account"
                        aria-labelledby="react-aria9028004585-:rs:-tab-Account" role="tabpanel"
                        class="py-3 px-1 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2"
                        data-slot="panel">
                        <div class="flex flex-col relative overflow-hidden height-auto text-foreground box-border bg-content1 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 shadow-none rounded-large transition-transform-background motion-reduce:transition-none"
                            tabindex="-1">
                            <div
                                class="flex p-3 z-10 w-full justify-start items-center shrink-0 overflow-inherit color-inherit subpixel-antialiased rounded-t-large">
                                Account Details</div>
                            <div
                                class="relative flex w-full p-3 flex-auto flex-col place-content-inherit align-items-inherit h-auto break-words text-left overflow-y-auto subpixel-antialiased">
                                <form novalidate="">
                                    <div class="group flex flex-col w-full mb-4 is-filled" data-slot="base"
                                        data-has-elements="true" data-has-label="true" data-has-value="true"
                                        data-filled="true" data-filled-within="true">
                                        <div data-slot="input-wrapper"
                                            class="relative w-full inline-flex tap-highlight-transparent shadow-sm bg-default-100 border-medium border-default-200 data-[hover=true]:border-default-400 min-h-unit-8 rounded-small flex-col items-start justify-center gap-0 transition-background !duration-150 transition-colors motion-reduce:transition-none outline-none group-data-[focus-visible=true]:z-10 group-data-[focus-visible=true]:ring-2 group-data-[focus-visible=true]:ring-focus group-data-[focus-visible=true]:ring-offset-2 group-data-[focus-visible=true]:ring-offset-background h-12 px-3 py-1 is-filled"
                                            style="cursor: text;"><label data-slot="label"
                                                class="absolute z-10 pointer-events-none origin-top-left subpixel-antialiased block text-foreground-500 cursor-text will-change-auto !duration-200 !ease-out motion-reduce:transition-none transition-[transform,color,left,opacity] group-data-[filled-within=true]:text-default-600 group-data-[filled-within=true]:pointer-events-auto group-data-[filled-within=true]:scale-85 text-small group-data-[filled-within=true]:-translate-y-[calc(50%_+_theme(fontSize.tiny)/2_-_8px_-_theme(borderWidth.medium))] pe-2 max-w-full text-ellipsis overflow-hidden"
                                                id="react-aria9028004585-:r12:"
                                                for="react-aria9028004585-:r11:">Email</label>
                                            <div data-slot="inner-wrapper"
                                                class="inline-flex w-full items-center h-full box-border group-data-[has-label=true]:items-end">
                                                <input data-slot="input"
                                                    class="w-full font-normal bg-transparent !outline-none placeholder:text-foreground-500 focus-visible:outline-none data-[has-start-content=true]:ps-1.5 data-[has-end-content=true]:pe-1.5 text-small is-filled"
                                                    aria-label="Email" id="react-aria9028004585-:r11:"
                                                    aria-labelledby="react-aria9028004585-:r11: react-aria9028004585-:r12:"
                                                    type="text" value="{{Auth::user()->email}}" data-filled="true"
                                                    data-filled-within="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group flex flex-col w-full mb-4 is-filled" data-slot="base"
                                        data-has-elements="true" data-has-label="true" data-has-value="true"
                                        data-filled="true" data-filled-within="true">
                                        <div data-slot="input-wrapper"
                                            class="relative w-full inline-flex tap-highlight-transparent shadow-sm bg-default-100 border-medium border-default-200 data-[hover=true]:border-default-400 min-h-unit-8 rounded-small flex-col items-start justify-center gap-0 transition-background !duration-150 transition-colors motion-reduce:transition-none outline-none group-data-[focus-visible=true]:z-10 group-data-[focus-visible=true]:ring-2 group-data-[focus-visible=true]:ring-focus group-data-[focus-visible=true]:ring-offset-2 group-data-[focus-visible=true]:ring-offset-background h-12 px-3 py-1 is-filled"
                                            style="cursor: text;"><label data-slot="label"
                                                class="absolute z-10 pointer-events-none origin-top-left subpixel-antialiased block text-foreground-500 cursor-text will-change-auto !duration-200 !ease-out motion-reduce:transition-none transition-[transform,color,left,opacity] group-data-[filled-within=true]:text-default-600 group-data-[filled-within=true]:pointer-events-auto group-data-[filled-within=true]:scale-85 text-small group-data-[filled-within=true]:-translate-y-[calc(50%_+_theme(fontSize.tiny)/2_-_8px_-_theme(borderWidth.medium))] pe-2 max-w-full text-ellipsis overflow-hidden"
                                                id="react-aria9028004585-:r17:"
                                                for="react-aria9028004585-:r16:">Username</label>
                                            <div data-slot="inner-wrapper"
                                                class="inline-flex w-full items-center h-full box-border group-data-[has-label=true]:items-end">
                                                <input data-slot="input"
                                                    class="w-full font-normal bg-transparent !outline-none placeholder:text-foreground-500 focus-visible:outline-none data-[has-start-content=true]:ps-1.5 data-[has-end-content=true]:pe-1.5 text-small is-filled"
                                                    aria-label="Username" id="react-aria9028004585-:r16:"
                                                    aria-labelledby="react-aria9028004585-:r16: react-aria9028004585-:r17:"
                                                    type="text" value="{{Auth::user()->name}}" data-filled="true"
                                                    data-filled-within="true">
                                            </div>
                                        </div>
                                    </div><button
                                        class="z-0 group relative inline-flex items-center justify-center box-border appearance-none select-none whitespace-nowrap font-normal subpixel-antialiased overflow-hidden tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 px-unit-4 min-w-unit-20 h-unit-10 text-small gap-unit-2 rounded-medium [&amp;>svg]:max-w-[theme(spacing.unit-8)] data-[pressed=true]:scale-[0.97] transition-transform-colors-opacity motion-reduce:transition-none bg-primary text-primary-foreground data-[hover=true]:opacity-hover mx-auto"
                                        type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                                class="py-2 px-3 relative align-middle text-small font-normal [&amp;>*]:z-1 [&amp;>*]:relative outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 before:content-[''] before:absolute before:z-0 before:inset-0 before:opacity-0 data-[selected=true]:before:opacity-100 group-data-[disabled=true]:text-foreground-300 before:bg-default/40 data-[selected=true]:text-default-foreground group-aria-[selected=false]:group-data-[hover=true]:before:bg-default-100 group-aria-[selected=false]:group-data-[hover=true]:before:opacity-70 first:before:rounded-l-lg last:before:rounded-r-lg">
                                <span>{{$singleSub['name']}}</span>
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
                                {{round((strtotime($singleSub['pivot']['expire_at']) - strtotime(now()->toString())) / (60 * 60 * 24))}} Days Remaining
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </main>
</x-app-layout>