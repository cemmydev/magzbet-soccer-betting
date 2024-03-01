<x-app-layout>
    <main>
        <div class="pb-26 container py-20">
            <div class="mx-auto max-w-lg">
                <div class="mb-4 text-center">
                    <div class="mt-2 md:flex md:items-center md:justify-between">
                        <div class="min-w-0 flex-1">
                            <h2
                                class="text-2xl font-bold leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight">
                                Contact</h2>
                        </div>
                    </div>
                </div>
                <form>
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-form.label for="email" :value="__('Email')" />
                        <x-form.input id="email" class="w-full font-normal bg-transparent !outline-none placeholder:text-foreground-500 focus-visible:outline-none data-[has-start-content=true]:ps-1.5 data-[has-end-content=true]:pe-1.5 text-small" type="email" name="email"
                            :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-form.label for="subject" value="Subject" />
                        <x-form.input id="subject" class="w-full font-normal bg-transparent !outline-none placeholder:text-foreground-500 focus-visible:outline-none data-[has-start-content=true]:ps-1.5 data-[has-end-content=true]:pe-1.5 text-small" type="text" name="subject"/>
                        <!-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> -->
                    </div>

                    <div class="mt-4 mb-4">
                        <x-form.label for="message" value="Message" />
                        <textarea name="message" id="message" rows="5" class="p-3 w-full font-normal bg-transparent !outline-none placeholder:text-foreground-500 focus-visible:outline-none data-[has-start-content=true]:ps-1.5 data-[has-end-content=true]:pe-1.5 text-small resize-none data-[hide-scroll=true]:scrollbar-hide h-full transition-height !duration-100 motion-reduce:transition-none"></textarea>
                    </div>
                    <button
                        class="z-0 group relative inline-flex items-center justify-center box-border appearance-none select-none whitespace-nowrap font-normal subpixel-antialiased overflow-hidden tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 px-unit-4 min-w-unit-20 h-unit-10 text-small gap-unit-2 rounded-medium [&amp;>svg]:max-w-[theme(spacing.unit-8)] data-[pressed=true]:scale-[0.97] transition-transform-colors-opacity motion-reduce:transition-none bg-primary text-primary-foreground data-[hover=true]:opacity-hover mx-auto"
                        type="submit">Send</button>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>