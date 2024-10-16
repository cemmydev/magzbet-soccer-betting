<x-app-layout title="Online Betting Platform | Live Soccer Bets Alerts" description='Experience the thrill of online betting with MagzBet. Join our Telegram group for instant alerts on winning bets and stay ahead in the game!'>
<link rel="canonical" href="https://magzbet.com/dashboard" />
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y7LM06TSS2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Y7LM06TSS2');
</script>
	<!-- Default Statcounter code for MagzBet
https://www.magzbet.com -->
<script type="text/javascript">
var sc_project=12981998; 
var sc_invisible=1; 
var sc_security="6f01b1fb"; 
</script>
<script type="text/javascript"
src="https://www.statcounter.com/counter/counter.js"
async></script>
<noscript><div class="statcounter"><a title="Web Analytics
Made Easy - Statcounter" href="https://statcounter.com/"
target="_blank"><img class="statcounter"
src="https://c.statcounter.com/12981998/0/6f01b1fb/1/"
alt="Web Analytics Made Easy - Statcounter"
referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>
<style>
	.slide-text {
		font-size: 1.25rem;
		line-height: 1.5rem;
		padding-left: 3rem;
		padding-right: 3rem;
	}

	.slide-text h1,h2,h3,h4 {
		line-height:  2rem;
	}

	@media only screen and (max-width: 640px) {
		.slide-text {
			font-size: .9rem;
			line-height: 1.2rem;
			padding-left: 2rem;
			padding-right: 2rem;
		}
	}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- End of Statcounter Code -->
	<div class="isolate bg-gray-900">
		<div class="relative flex min-h-[400px] flex-col justify-center gap-6 overflow-hidden py-8 sm:min-h-[500px]">
			<img src="{{ asset('assets/images/hero.webp') }}" alt="Hero"
				class="absolute inset-0 -z-10 h-full w-full object-cover brightness-[0.5]">
				
				<div x-data="imageSlider" class="relative mx-auto w-full overflow-hidden rounded-md bg-tranparent p-2 sm:p-4 flex justify-center items-center">
					{{-- <div class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
						<span x-text="currentIndex"></span>/<span x-text="images.length"></span>
					</div> --}}
			
					<button @click="previous()" class="absolute left-3 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-transparent shadow-md border">
						<i class="fas fa-chevron-left text-2xl font-bold text-gray-500"></i>
					</button>
			
					<button @click="forward()" class="absolute right-3 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-transparent shadow-md border">
						<i class="fas fa-chevron-right text-2xl font-bold text-gray-500"></i>
					</button>
			
					<div class="relative flex w-full justify-center items-center" style="height: 12rem">
						<template x-for="(image, index) in images">
							<div x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-0 p-4">
								{{-- <img :src="image" alt="image" class="mx-auto h-32 sm:h-48" /> --}}
								<div x-html="image" class="align-middle slide-text text-sm sm:text-lg"></div>
							</div>
						</template>
					</div>
				</div>

			<div class="flex justify-center gap-4">
				<a target="_blank" class="hover:opacity-90" href="https://www.instagram.com/magzbet/"
					previewlistener="true">
					<img src="{{ asset('assets/images/social/instagram.png') }}" alt="instagram" class="h-12 shadow-xl">
				</a>
				<a target="_blank" class="hover:opacity-90" href="https://t.me/magzbet"
					previewlistener="true">
					<img src="{{ asset('assets/images/social/telegram.png') }}" alt="telegram" class="h-12 shadow-xl">
				</a>
			    <a target="_blank" class="hover:opacity-90" href="https://www.tiktok.com/@magzbet"
					previewlistener="true">
					<img src="{{ asset('assets/images/social/tiktok.png') }}" alt="tiktok" class="h-12 shadow-xl">
				</a>
			</div>
		</div>
	</div>

	<div class="container py-12">
		<h2 class="mb-6 text-center text-3xl font-bold tracking-tight text-white sm:text-4xl">Our Stats</h2>
		<dl class="grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-3">
			<div class="flex flex-col bg-white/5 p-8">
				<dt class="text-sm font-semibold uppercase leading-6 text-gray-300">Total Bets</dt>
				<dd class="order-first text-3xl font-semibold tracking-tight text-white">{{$total_bets}}</dd>
			</div>
			<div class="flex flex-col bg-white/5 p-8">
				<dt class="text-sm font-semibold uppercase leading-6 text-gray-300">Win Ratio</dt>
				<dd class="order-first text-3xl font-semibold tracking-tight text-white">{{$win_ratio}} %</dd>
			</div>
			<div class="flex flex-col bg-white/5 p-8">
				<dt class="text-sm font-semibold uppercase leading-6 text-gray-300">ROI</dt>
				<dd class="order-first text-3xl font-semibold tracking-tight text-white">{{$ROI}} %</dd>
			</div>
		</dl>
	</div>
	<section class="container py-10">
		<h2 class="mb-6 text-center text-3xl font-bold tracking-tight text-white sm:text-4xl">Latest Bets</h2>
		@if (!$latest_bets && Auth::check()) 
			<p class="font-bold text-center">There are no bets new. Please come back later.</p>
		@elseif(!Auth::check())
		<div class="mb-4 mx-auto max-w-4xl">
			<div class="flex flex-col overflow-hidden height-auto text-foreground box-border bg-content1 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 shadow-medium rounded-large transition-transform-background motion-reduce:transition-none relative"
				tabindex="-1"><a
					class="tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 text-medium text-primary no-underline hover:opacity-80 active:opacity-disabled transition-opacity absolute inset-0 z-10 flex flex-col items-center justify-center gap-2 bg-slate-950/75"
					tabindex="0" role="link" href="{{route('login')}}" previewlistener="true">
					<div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							aria-hidden="true" role="img" font-size="40" class="iconify iconify--tabler" width="1em"
							height="1em" viewBox="0 0 24 24">
							<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
								stroke-width="2">
								<path d="M5 13a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2z"></path>
								<path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0-2 0m-3-5V7a4 4 0 1 1 8 0v4"></path>
							</g>
						</svg></div>
					<div>You don't have access to this bet. Please login with your credentials.</div>
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
		@else
			@foreach($latest_bets as $bet)
				@if($bet['subscription_plan'] == '' || Auth::user()->isAllow($bet['subscription_plan']))
				<div class="mx-auto max-w-4xl">
					<div class="mb-4">
						<div class="flex flex-col overflow-hidden height-auto text-foreground box-border bg-content1 outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 shadow-medium rounded-large transition-transform-background motion-reduce:transition-none relative"
							tabindex="-1">
							<div
								class="flex p-3 w-full justify-start shrink-0 overflow-inherit color-inherit subpixel-antialiased rounded-t-large z-auto flex-col items-start gap-4 md:flex-row md:items-center">
								<div class="flex flex-1 flex-col justify-center gap-1">
										<div class="text-xl font-bold mr-2 break-words">{{$bet['event']}}</div>
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
										<div class="text-2xl font-bold">{{$bet['odds']}}</div>
										<div class="text-sm font-bold text-gray-400">Odds</div>
									</div>
									<div class="basis-1/4 text-center">
										<div class="text-2xl font-bold">{{$bet['stake']}}</div>
										<div class="text-sm font-bold text-gray-400">Stake</div>
									</div>
									<div class="basis-1/4 text-center">
										<div class="text-2xl font-bold text-gray-200">
											@if($bet['gain'] != null)
                                            	{{$bet['gain']}}
											@else
												{{"-"}} 
											@endif
										</div>
										<div class="text-sm font-bold text-gray-400">Gain</div>
									</div>
									<div class="basis-1/4 text-center">
										<div class="text-2xl font-bold text-gray-200">
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
								@if($bet['image'])
									<x-secondary-button x-data="" type="button" x-on:click="$dispatch('open-modal', '{{$bet['image']}}')">
										<img loading="lazy" alt="bet-receipt" class="h-auto sm:max-w-xl" src="{{ asset($bet['image']) }}" alt='magzbet soccer betting'>
									</x-secondary-button>
									<x-modal name="{{$bet['image']}}" maxWidth="4xl">
										<img alt="bet-receipt" class="h-auto max-w-3xl w-full" src="{{ asset($bet['image']) }}" alt='magzbet soccer betting'>
									</x-modal>
								@endif
							</div>
						</div>
					</div>
				</div>
				@else
				<div class="mb-4 mx-auto max-w-4xl">
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
		@endif
	</section>
	<script>
		document.addEventListener("alpine:init", () => {
			var texts = {!!json_encode($text)!!}
			var text = []
			texts.forEach(item => text.push(item.text))
		  Alpine.data("imageSlider", () => ({
			currentIndex: 1,
			images: [
				"<img src='{{asset('assets/images/logo.webp')}}' alt='image' class='mx-auto h-32 sm:h-48'>",
				...text
			],
			previous() {
				this.currentIndex = (this.currentIndex - 2 + this.images.length) % this.images.length + 1;
			},
			forward() {
				this.currentIndex = this.currentIndex % this.images.length + 1;
			},
			init() {
				setInterval(() => {
				  this.forward();
				}, 4000);;
			}
		  }));
		});
	  </script>
</x-app-layout>