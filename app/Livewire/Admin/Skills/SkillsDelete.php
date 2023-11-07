<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;

class SkillsDelete extends Component
{

    public $skill;

    protected $listeners = ['skillDelete'];

    public function skillDelete($id)
    {
        $this->skill = Skill::find($id);
        $this->dispatch('deleteModalToggle');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'progress' => 'required|numeric',
        ];
    }

    public function submit()
    {
        // delete in db
        $this->skill->delete();
        $this->reset('skill');
        // close modal
        $this->dispatch('deleteModalToggle');
        // refresh data
        $this->dispatch('refreshData')->to(SkillsData::class);
    }

    public function render()
    {
        return view('admin.skills.skills-delete');
    }
}
