<x-app-layout>
    <link rel="canonical" href="https://magzbet.com/dashboard" />

@if(isset($sub))
<div class="pb-26 container py-20">
    <div class="mx-auto max-w-lg">
        <div class="col-10 offset-1 mt-5">
            <div class="flex flex-col w-full sm:max-w-md mt-6 p-6 shadow-md overflow-hidden sm:rounded-lg bg-default/40 text-default-foreground text-center">
                <h4 class="text-center text-2xl font-bold py-4">Are you sure?</h4>
                <div class="card-header p-3 border-gray-100 rounded-medium text-left mx-auto px-6">
                    <div class="ring-1 ring-white/10 rounded-3xl p-10 w-full max-w-xs">
                        <div class="flex items-center justify-between gap-x-4">
                            <h3 class="text-lg font-semibold leading-8 text-white">{{$sub['name']}}</h3>
                        </div>
                        <p class="mt-4 text-sm leading-6 text-gray-300">{{$sub['description']}}</p>
                        <p class="mt-6 flex items-baseline gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-white">${{$sub['cost']}}
                            </span>
                            <span class="text-sm font-semibold leading-6 text-gray-300">/ Month</span>
                        </p>
                    </div>
                </div>
                <p class="my-6">Do you really want to pay for this subscription?</p>
                <div class="card-body">

                    @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong class='text-red' >{{ $message }}</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <center>
                        <form action="{{ route('paypal.payment') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$sub['id']}}">
                            <button class="z-0 group relative inline-flex items-center justify-center box-border appearance-none select-none whitespace-nowrap font-normal subpixel-antialiased overflow-hidden tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 px-unit-4 min-w-unit-20 h-unit-10 text-small gap-unit-2 rounded-medium [&>svg]:max-w-[theme(spacing.unit-8)] data-[pressed=true]:scale-[0.97] transition-transform-colors-opacity motion-reduce:transition-none bg-primary text-primary-foreground data-[hover=true]:opacity-hover">Pay with PayPal </button>
                        </form>
                    </center>

                </div>
            </div>
        </div>
    </div>
</div>
@else
OOPS!
@endif
</x-app-layout>
