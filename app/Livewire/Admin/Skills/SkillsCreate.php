<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;

class SkillsCreate extends Component
{

    public $name, $progress;

    public function rules()
    {
        return [
            'name' => 'required',
            'progress' => 'required|numeric',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save in db
        Skill::create($data);
        //reset form
        $this->reset(['name','progress']);
        // close modal
        $this->dispatch('createModalToggle');
        // refresh data
        $this->dispatch('refreshData')->to(SkillsData::class);
    }

    public function render()
    {
        return view('admin.skills.skills-create');
    }
}
