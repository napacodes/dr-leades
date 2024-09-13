<?php

namespace App\Livewire;

use App\Models\Admin\DraftView;
use App\Models\Admin\Subscribe;
use App\Models\Admin\SubscribeSection;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SubscribePostEasier extends Component
{
    public $style;

    public function mount($style = null)
    {
        $this->style = $style;
    }

    #[Rule('required|email')]
    public $email = '';

    public function save()
    {
        $this->validate();

        Subscribe::firstOrCreate([
            'email' => $this->email,
        ]);

        return redirect()->with('success', 'content.created_successfully');
    }

    public function render()
    {
        // Get site language
        $language = getSiteLanguage();
        $subscribe = SubscribeSection::where('language_id', $language->id)->where('style', $this->style)->first();
        $draft_view = DraftView::first();

        return view('livewire.subscribe-post-easier')->with(['subscribe' => $subscribe])
            ->with(['draft_view' => $draft_view]);

    }
}
