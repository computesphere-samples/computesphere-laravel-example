<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
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

        $this->contacts = Arr::sort($this->contacts, function ($value) {
            return $value['name'];
        });
        $this->name = '';
        $this->email = '';

        $this->dispatch('contactAdded');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
