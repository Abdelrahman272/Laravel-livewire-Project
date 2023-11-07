<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;

class ServicesDelete extends Component
{
    public $services;

    protected $listeners = ['serviceDelete'];

    public function serviceDelete($id)
    {
        // fill $services with the eloquent model of the same id
        $this->services = Service::find($id);
        // show delete modal
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        // delete record
        $this->services->delete();
        $this->reset('services');
        // hide modal
        $this->dispatch('deleteModalToggle');
        // refresh services data component
        $this->dispatch('refreshData')->to(servicesData::class);
    }

    public function render()
    {
        return view('admin.services.services-delete');
    }
}
