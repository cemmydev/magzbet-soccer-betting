<nav x-data="{ open: false }"
	class="flex z-40 w-full h-auto items-center justify-center data-[menu-open=true]:border-none sticky top-0 inset-x-0 border-b border-divider backdrop-blur-lg data-[menu-open=true]:backdrop-blur-xl backdrop-saturate-150 bg-background/70">
	<!-- Primary Navigation Menu -->
	<!-- <div class="w-full lg:max-w-[90%] xl:max-w-[80%] mx-auto px-4 sm:px-6 lg:px-8"> -->
	<div class="px-6 sm:px-3 gap-4 w-full relative flex-nowrap items-center h-[var(--navbar-height)] max-w-[1280px]">
		<div class="flex justify-between h-16">
			<div class="flex">
				<!-- Logo -->
				<div class="shrink-0 flex items-center mr-4">
					<a href="{{ route('dashboard') }}" class="h-auto">
						<x-layout.application-logo class="block fill-current text-gray-800" />
					</a>
				</div>
				
				<div class="flex items-center mr-2 sm:hidden">
					<x-form.dropdown align="left" width="48">
						<x-slot name="trigger">
							<button
								class="flex relative justify-center items-center box-border overflow-hidden align-middle outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 w-8 h-8 text-tiny z-10 aria-expanded:scale-[0.97] aria-expanded:opacity-70 subpixel-antialiased transition-transform algin-right">
								<svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
									fill="none" viewBox="0 0 24 24">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
										stroke-width="2" d="M8 6h8M6 10h12M8 14h8M6 18h12" />
								</svg>
							</button>
						</x-slot>

						<x-slot name="content">

							<x-form.dropdown-link :href="route('dashboard')" class="text-white">
								{{ __('general.navbar.home') }}
							</x-form.dropdown-link>

							<x-form.dropdown-link :href="route('bets.index')" class="text-white">
								{{ __('general.navbar.bets') }}
							</x-form.dropdown-link>

							<x-form.dropdown-link :href="route('bets.results')" class="text-white">
								{{ __('general.navbar.results') }}
							</x-form.dropdown-link>
							
							<x-form.dropdown-link :href="route('stats')" class="text-white">
								{{ __('general.navbar.stats') }}
							</x-form.dropdown-link>
							
							<x-form.dropdown-link :href="route('contact')" class="text-white">
								{{ __('general.navbar.contact') }}
							</x-form.dropdown-link>
							
							<x-form.dropdown-link :href="route('stats')" class="text-white">
								{{ __('general.navbar.stats') }}
							</x-form.dropdown-link>

							@if(Auth::check() && Auth::user()->isAdmin())
								<x-form.dropdown-link :href="route('admin.index')" class="text-white">
									{{ __('general.navbar.admin') }}
								</x-form.dropdown-link>
							@endif

							<!-- Authentication -->
						</x-slot>
					</x-form.dropdown>

				</div>
				<!-- Navigation Links -->
				<ul
					class="h-full flex-row flex-nowrap items-center data-[justify=start]:justify-start data-[justify=start]:flex-grow data-[justify=start]:basis-0 data-[justify=center]:justify-center data-[justify=end]:justify-end data-[justify=end]:flex-grow data-[justify=end]:basis-0 hidden gap-4 sm:flex">
					<li class="text-medium whitespace-nowrap box-border list-none data-[active=true]:font-semibold">
						<x-navbar.link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
							{{ __('general.navbar.home') }}
						</x-navbar.link>
					</li>
					<li class="text-medium whitespace-nowrap box-border list-none data-[active=true]:font-semibold">
						<x-navbar.link :href="route('bets.index')" :active="request()->routeIs('bets.index')">
							{{ __('general.navbar.bets') }}
						</x-navbar.link>
					</li>
					<li class="text-medium whitespace-nowrap box-border list-none data-[active=true]:font-semibold">
						<x-navbar.link :href="route('bets.results')" :active="request()->routeIs('bets.results')">
							{{ __('general.navbar.results') }}
						</x-navbar.link>
					</li>
					<li class="text-medium whitespace-nowrap box-border list-none data-[active=true]:font-semibold">
						<x-navbar.link :href="route('stats')" :active="request()->routeIs('stats')">
							{{ __('general.navbar.stats') }}
						</x-navbar.link>
					</li>
					<li class="text-medium whitespace-nowrap box-border list-none data-[active=true]:font-semibold">
						<x-navbar.link :href="route('contact')" :active="request()->routeIs('contact')">
							{{ __('general.navbar.contact') }}
						</x-navbar.link>
					</li>
					@if(Auth::check() && Auth::user()->isAdmin())

					<li class="text-medium whitespace-nowrap box-border list-none data-[active=true]:font-semibold">
						<x-navbar.link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
							{{ __('general.navbar.admin') }}
						</x-navbar.link>
					</li>
					@endif
				</ul>
			</div>
			<!-- right menu -->
			<div class="hidden sm:flex sm:items-center sm:ml-6">
				<!-- notifications -->
				<livewire:notifications />
				<!-- Separator -->
				<div class="w-[1px] h-8 mx-4 bg-gray-100"></div>
				<!-- dropdown -->
				@if (Auth::check())
				<x-form.dropdown align="right" width="48">
					<x-slot name="trigger">
						<button
							class="flex relative justify-center items-center box-border overflow-hidden align-middle outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 w-8 h-8 text-tiny bg-primary text-primary-foreground rounded-full ring-2 ring-offset-2 ring-offset-background dark:ring-offset-background-dark ring-primary z-10 aria-expanded:scale-[0.97] aria-expanded:opacity-70 subpixel-antialiased transition-transform">
							<img class="h-8 w-8 rounded-full object-cover" src="{{ asset('assets/images/logo.webp') }}"
								alt="{{ Auth::user()->name }}" />
							<!-- <div class="ml-2">{{ Auth::user()->name }}</div> -->
						</button>
					</x-slot>

					<x-slot name="content">

						<x-form.dropdown-link :href="route('account.index')">
							{{ Auth::user()->name }}
						</x-form.dropdown-link>

						<x-form.dropdown-link :href="route('account.index')">
							{{ __('general.navbar.profile') }}
						</x-form.dropdown-link>

						<x-form.dropdown-link :href="route('account.subscriptions')">
							{{ __('general.navbar.subscriptions') }}
						</x-form.dropdown-link>

						<x-form.dropdown-link :href="route('logout')">
							{{ __('general.navbar.logout') }}
						</x-form.dropdown-link>


						<!-- Authentication -->
					</x-slot>
				</x-form.dropdown>
				@else
				<ul class="flex gap-4 h-full flex-row flex-nowrap items-center data-[justify=start]:justify-start data-[justify=start]:flex-grow data-[justify=start]:basis-0 data-[justify=center]:justify-center data-[justify=end]:justify-end data-[justify=end]:flex-grow data-[justify=end]:basis-0"
					data-justify="end">
					<li class="text-medium whitespace-nowrap box-border list-none data-[active=true]:font-semibold"><a
							class="z-0 group relative inline-flex items-center justify-center box-border appearance-none select-none whitespace-nowrap font-normal subpixel-antialiased overflow-hidden tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 px-unit-4 min-w-unit-20 h-unit-10 text-small gap-unit-2 rounded-medium [&amp;>svg]:max-w-[theme(spacing.unit-8)] data-[pressed=true]:scale-[0.97] transition-transform-colors-opacity motion-reduce:transition-none bg-primary text-primary-foreground data-[hover=true]:opacity-hover"
							role="button" tabindex="0" href="{{route('register')}}" previewlistener="true">Sign Up</a>
					</li>
					<li class="text-medium whitespace-nowrap box-border list-none data-[active=true]:font-semibold">
						<a class="z-0 group relative inline-flex items-center justify-center box-border appearance-none select-none whitespace-nowrap font-normal subpixel-antialiased overflow-hidden tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 px-unit-4 min-w-unit-20 h-unit-10 text-small gap-unit-2 rounded-medium [&amp;>svg]:max-w-[theme(spacing.unit-8)] data-[pressed=true]:scale-[0.97] transition-transform-colors-opacity motion-reduce:transition-none bg-default/40 text-default-foreground data-[hover=true]:opacity-hover"
							type="button" href="{{route('login')}}">Login</a>
					</li>
				</ul>
				@endif
			</div>

			<div class="-mr-2 flex items-center sm:hidden">
				<!-- notifications -->
				<livewire:notifications />
				<div class="w-[1px] h-8 mx-4 bg-gray-100"></div>
				<!-- Hamburger -->
				<x-form.dropdown align="right" width="48">
					<x-slot name="trigger">
						<button
							class="flex relative justify-center items-center box-border overflow-hidden align-middle outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 w-8 h-8 text-tiny bg-primary text-primary-foreground rounded-full ring-2 ring-offset-2 ring-offset-background dark:ring-offset-background-dark ring-primary z-10 aria-expanded:scale-[0.97] aria-expanded:opacity-70 subpixel-antialiased transition-transform">
							@if(Auth::check())
								<img class="h-8 w-8 rounded-full object-cover" src="{{ asset('assets/images/logo.webp') }}" />
							@else
								<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
								</svg>
							@endif
						</button>
					</x-slot>

					<x-slot name="content">
						@if(Auth::check())

						<x-form.dropdown-link :href="route('profile.index')">
							{{ Auth::user()->name }}
						</x-form.dropdown-link>

						<x-form.dropdown-link :href="route('account.index')">
							{{ __('general.navbar.profile') }}
						</x-form.dropdown-link>

						<x-form.dropdown-link :href="route('account.subscriptions')">
							{{ __('general.navbar.subscriptions') }}
						</x-form.dropdown-link>

						<x-form.dropdown-link :href="route('logout')">
							{{ __('general.navbar.logout') }}
						</x-form.dropdown-link>
						@else
						<x-form.dropdown-link :href="route('login')" class="text-white">
							{{ __('general.navbar.login') }}
						</x-form.dropdown-link>

						<x-form.dropdown-link :href="route('register')" class="text-white">
							{{ __('general.navbar.signup') }}
						</x-form.dropdown-link>
						@endif


						<!-- Authentication -->
					</x-slot>
				</x-form.dropdown>
			</div>
		</div>
	</div>

	<!-- Responsive Navigation Menu -->

</nav>