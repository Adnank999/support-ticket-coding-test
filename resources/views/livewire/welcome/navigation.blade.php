<div class="sm:fixed sm:top-0 sm:right-0 px-8 text-end z-10 w-full flex justify-between items-center">
    @auth
    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Dashboard</a>
    @else



    <img src="{{ asset('storage/Support_TicketBg.png') }}" alt="Support Ticket Background" style="height: 100px; width: 100px;">

    <div class="grid grid-cols-2 justify-center items-center gap-4">
        <div class="bg-transparent hover:border-2 hover:border-white hover:rounded-lg text-center px-3 py-1">
        <a href="{{ route('login') }}" class="font-semibold text-white hover:text-red-500 dark:text-red-600  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Log in</a>
        </div>  
        

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Register</a>
        @endif
    </div>

    @endauth
</div>