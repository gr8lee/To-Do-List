<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;



   

#[Title('Home')]
#[Layout('layouts.custom')]
class Home extends Component
{
     public $name;
    public $description;
    public $action;
    public $tasks = [];
    public $taskId;

 
    public function render()
    {
        return view('livewire.home');
    }
       public function edit($id)
{
    // Optional: store the task ID if needed
    $this->taskId = $id;

    // Use Livewire redirect
    $this->redirect('/page'); // simple full URL works best
}

 public function update($id)
    {
        $this->validate();

        $task = \App\Models\Task::findOrFail($id);
        $task->update([
            'name' => $this->name,
            'description' => $this->description,
            'action' => $this->action,
        ]);

        $this->reset(['name', 'description', 'action']);
        $this->loadTasks(); // refresh list
    }
    public function destroy($id)
    {
        $task = \App\Models\Task::findOrFail($id);
        $task->delete();

        $this->loadTasks(); // refresh list
    }   
    
}


 