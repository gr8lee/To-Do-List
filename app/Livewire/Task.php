<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Tasks')]
#[Layout('layouts.custom')]
class Task extends Component
{
    public $name;
    public $description;
    public $tasks = [];

    public $task;


    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'nullable|min:3',
    ];
     // ✅ This is your store function


    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $this->tasks = \App\Models\Task::latest()->get();
    }

    public function saveTask()
    {
        \App\Models\Task::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset(['name', 'description']);

        $this->loadTasks();
    }

    

        public function store()
    {
        $this->validate();

        \App\Models\Task::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset(['name', 'description']);
        $this->loadTasks(); // refresh list
    }

    public function edit($id)
    {
        // dd(123);
        $this->task = \App\Models\Task::findOrFail($id);
        $this->name = $this->task->name;
        $this->description = $this->task->description;
    }

    public function update()
    {
        $this->validate();

      
        $this->task->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset(['name', 'description']);
        $this->loadTasks(); // refresh list
    }
    public function destroy($id)
    {
        $task = \App\Models\Task::findOrFail($id);
        $task->delete();

        $this->loadTasks(); // refresh list
    }   
    public function render()
    {
        return view('livewire.task');
    }
}


