<x-app-layout>
	<x-auth-card>
		<!-- <x-slot name="logo">
			<a href="/" class="w-36 h-auto">
				<x-layout.auth-logo class="fill-current text-gray-500" />
			</a>
		</x-slot> -->

		<!-- Session Status -->
		<x-auth-session-status class="mb-4" :status="session('status')" />

		<div class="mb-4 text-center">
			<div class="mt-2 md:flex md:items-center md:justify-between">
				<div class="min-w-0 flex-1">
					<h2 class="text-2xl font-bold leading-7 text-white sm:truncate sm:text-3xl sm:tracking-tight p-3">Login</h2>
				</div>
			</div>
		</div>

		<form method="POST" action="{{ route('login') }}">
			@csrf

			<!-- Email Address -->
			<div>
				<x-form.label for="email" :value="__('Email')" />
				<x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
				<x-input-error :messages="$errors->get('email')" class="mt-2" />
			</div>

			<!-- Password -->
			<div class="mt-4">
				<x-form.label for="password" :value="__('Password')" />
				<div class="relative" x-data="{ showPassword: false }">
					<input
						class="w-full font-normal bg-transparent !outline-none placeholder:text-foreground-500 focus-visible:outline-none data-[has-start-content=true]:ps-1.5 data-[has-end-content=true]:pe-1.5 text-small"
						id="password"
						class="form__input"
						:type="showPassword === false ? 'password' : 'text'"
						name="password"
						required autocomplete="current-password"
					/>
					<span class="form__input_show-password">
						<template x-if="showPassword === false">
							<x-micon.visibility_on title="{{ __('show password') }}" class="pointer" size="1.125rem" @click="showPassword = true" />
						</template>
						<template x-if="showPassword === true">
							<x-micon.visibility_off title="{{ __('hide password') }}" class="pointer" size="1.125rem" @click="showPassword = false" />
						</template>
					</span>
				</div>
				<x-input-error :messages="$errors->get('password')" class="mt-2" />
			</div>

			<!-- Remember Me -->
			<div class="block mt-4">
				<label for="remember_me" class="inline-flex items-center">
					<input id="remember_me" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500" name="remember">
					<span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
				</label>
			</div>

			<div class="flex items-center justify-end mt-4">
				@if (Route::has('password.request'))
					<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" href="{{ route('password.request') }}">
						{{ __('Forgot your password?') }}
					</a>
				@endif

				<x-form.primary-button class="ml-3">
					{{ __('Log in') }}
				</x-form.primary-button>
			</div>

			<div class="flex items-center justify-center mt-6 gap-2">
				<span class="text-gray-400">don't have an account?</span>
				<a href="{{ route('register') }}" class="underline decoration-2 decoration-amber-300 text-gray-600 hover:text-black">Register</a>
			</div>
		</form>
	</x-auth-card>
</x-app-layout>