<?php

namespace App\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public $contacts = [];

    public $name = '';

    public $email = '';

    public function save()
    {
        $this->contacts[] = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
        ]);

        $this->name = '';
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
