<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class Home extends Component
{




    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.posts.home')->title('Home');
    }
}
