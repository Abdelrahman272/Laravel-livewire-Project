<?php

namespace App\Livewire\Admin\Subscribers;

use App\Models\Subscriber;
use Livewire\Component;

class SubscribersDelete extends Component
{

    public $subscriber;

    protected $listeners = ['subscriberDelete'];

    public function subscriberDelete($id)
    {
        $this->subscriber = Subscriber::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        // delete in db
        $this->subscriber->delete();

        $this->reset('subscriber');
        // close modal
        $this->dispatch('deleteModalToggle');
        // refresh data
        $this->dispatch('refreshData')->to(subscribersData::class);
    }

    public function render()
    {
        return view('admin.subscribers.subscribers-delete');
    }
}
