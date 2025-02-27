<div class="container w-full mx-auto px-4 sm:px-2 md:px-2">
    <h1 class="text-2xl font-bold mb-4">Hit Reservations</h1>
    @if(Auth::check())
        @if(Auth::user()->hitReservation()->exists())
            <button wire:click="leaveList" class="w-full bg-red-500 text-white px-4 py-2 mt-4">Leave List</button>
        @else
            <button wire:click="joinList" class="w-full bg-green-500 text-white px-4 py-2 mt-4">Join List</button>
        @endif
    @endif

    {{ $this->table }}
</div>
