@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} class="w-full font-normal bg-transparent !outline-none placeholder:text-foreground-500 focus-visible:outline-none data-[has-start-content=true]:ps-1.5 data-[has-end-content=true]:pe-1.5 text-small" {!! $attributes->merge(['class' => 'form__input']) !!}>
