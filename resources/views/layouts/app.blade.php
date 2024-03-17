<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="/favicon_.ico" type="image/x-icon" sizes="16x16">
	<meta name="msapplication-TileColor" content="#da532c">

	<title>{{ (isset($title) ? $title . ' | ' : '') . config('app.name', 'Laravel') }}</title>
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
	<!-- Styles -->
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<link rel="stylesheet" href="{{asset('css/bettok-1.css')}}">
	<link rel="stylesheet" href="{{asset('css/bettok-2.css')}}">
	@stack('styles')
	<!-- Scripts -->
	<script type="application/javascript" src="{{ mix('js/vendor.js') }}" defer></script>
	<script type="application/javascript" src="{{ mix('js/index.js') }}" defer></script>
	@livewireStyles
	<!-- Scripts -->
	@stack('scripts')
</head>
<body class="font-sans antialiased">
<x-notifications.toaster/>
<div class="min-h-screen">
	<x-layout.navigation />
	<main>
		{{ $slot }}
	</main>
	<footer>
		<div class="container flex flex-col gap-6 py-8">
			<div class="flex flex-col justify-center text-sm md:flex-row md:gap-4">
				<div class="flex basis-full flex-col items-center md:basis-1/2 md:items-end"><a
						class="relative inline-flex items-center tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-medium text-primary no-underline hover:opacity-80 active:opacity-disabled transition-opacity"
						tabindex="0" role="link" href="/aboutus" previewlistener="true">About Us</a><a
						class="relative inline-flex items-center tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-medium text-primary no-underline hover:opacity-80 active:opacity-disabled transition-opacity"
						tabindex="0" role="link" href="/contact" previewlistener="true">Contact</a></div>
				<div class="flex basis-full flex-col items-center md:basis-1/2 md:items-start"><a
						class="relative inline-flex items-center tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-medium text-primary no-underline hover:opacity-80 active:opacity-disabled transition-opacity"
						tabindex="0" role="link" href="/terms" previewlistener="true">Terms &amp; Conditions</a><a
						class="relative inline-flex items-center tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-medium text-primary no-underline hover:opacity-80 active:opacity-disabled transition-opacity"
						tabindex="0" role="link" href="/privacy" previewlistener="true">Privacy Policy</a></div>
			</div>
			<div class="flex justify-center gap-4"><a target="_blank" class="hover:text-primary"
					href="https://instagram.com/bettok__" previewlistener="true"><svg xmlns="http://www.w3.org/2000/svg"
						xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" font-size="24"
						class="iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24">
						<path fill="currentColor"
							d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3">
						</path>
					</svg></a><a target="_blank" class="hover:text-primary" href="https://t.me/+UFiXHtDTggAyZDM0"
					previewlistener="true"><svg xmlns="http://www.w3.org/2000/svg"
						xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" font-size="24"
						class="iconify iconify--mdi" width="1em" height="1em" viewBox="0 0 24 24">
						<path
							d="M9.78 18.65l.28-4.23l7.68-6.92c.34-.31-.07-.46-.52-.19L7.74 13.3L3.64 12c-.88-.25-.89-.86.2-1.3l15.97-6.16c.73-.33 1.43.18 1.15 1.3l-2.72 12.81c-.19.91-.74 1.13-1.5.71L12.6 16.3l-1.99 1.93c-.23.23-.42.42-.83.42z"
							fill="currentColor"></path>
					</svg></a></div>
			<div class="text-center text-sm text-gray-300">
				<p class="pb-1">Copyright © <!-- -->2024<!-- --> - All right reserved by BetTok.</p>
				<p>Developed by<!-- --> <a
						class="relative inline-flex items-center tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-medium text-primary no-underline hover:opacity-80 active:opacity-disabled transition-opacity hover:text-gray-100 hover:underline"
						tabindex="0" role="link" href="https://olympusone.com" target="_blank"
						previewlistener="true">OlympusOne</a>.</p>
			</div>
			<div class="text-center"><a
					class="relative inline-flex items-center tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-medium text-primary no-underline hover:opacity-80 active:opacity-disabled transition-opacity"
					tabindex="0" role="link" href="https://certifications.gamingcommission.gov.gr/sitepages/home.aspx"
					previewlistener="true"><img class="h-[60px]" alt="gamingcommission" src="{{ asset('assets/images/eeep_footer.svg') }}"></a>
			</div>
		</div>
	</footer>
</div>
@livewireScripts
</body>
</html>
