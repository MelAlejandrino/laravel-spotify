<?php

namespace App\Livewire;

use Livewire\Component;

class MobileNav extends Component
{

    public $spotifyUser;

    public function mount($spotifyUser = null){
        $this->spotifyUser = $spotifyUser;
    }
    public function render()
    {
        return view('livewire.mobile-nav');
    }
}
