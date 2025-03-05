<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $spotifyUser;
    public function mount($spotifyUser = null){
        $this->spotifyUser = $spotifyUser;
    }
    public function render()
    {
        return view('livewire.header');
    }
}
