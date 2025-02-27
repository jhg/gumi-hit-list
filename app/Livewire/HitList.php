<?php

namespace App\Livewire;

use App\Filament\Resources\HitReservationResource;
use App\Models\HitReservation;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HitList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $reservations;

    public function mount()
    {
        $this->reservations = HitReservation::all();
    }

    public function joinList()
    {
        if (Auth::check() && Auth::user()->can('create', HitReservation::class)) {
            HitReservation::create(['user_id' => Auth::id()]);
            $this->reservations = HitReservation::all();
        }
    }

    public function leaveList()
    {
        $user_reservation = HitReservation::where('user_id', Auth::id())->firstOrFail();
        if (Auth::user()->can('delete', $user_reservation)) {
            $user_reservation->delete();
            $this->reservations = HitReservation::all();
        }
    }

    public function table(Table $table): Table
    {
        return HitReservationResource::table($table)
            ->query(HitReservation::query()->with('user'))
            ->actions([])
            ->poll('5s')
            ->bulkActions([]);
    }

    public function render()
    {
        return view('livewire.hit-list');
    }
}
