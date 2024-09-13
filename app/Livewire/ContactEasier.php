<?php

namespace App\Livewire;

use App\Models\Admin\ContactInfo;
use App\Models\Admin\ContactInfoSection;
use App\Models\Admin\ContactMessage;
use App\Models\Admin\DraftView;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ContactEasier extends Component
{
    public $style;

    #[Rule('required')]
    public $name = '';
    #[Rule('required|email')]
    public $email = '';
    #[Rule('required')]
    public $phone = '';
    #[Rule('required')]
    public $message = '';

    public function save()
    {
        $this->validate();

        ContactMessage::firstOrCreate([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);

        // Reset value
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';

        return redirect()->with('success', 'content.created_successfully');
    }

    public function render()
    {
        return view('livewire.contact-easier');
    }
}
