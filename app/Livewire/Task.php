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
    public $action;
    public $tasks = [];
    public $taskId;
    // To track which task is being edited
    public $editingId = null;

 
    public function render()
    {
        return view('livewire.home');
    }
       public function edit($id)
{

$task = \App\Models\Task::findOrFail($id);
$this->editingId = $id;
$this->name = $task->name;  
$this->description = $task->description;

    // Optional: store the task ID if needed
    $this->taskId = $id;

    // Use Livewire redirect
    $this->redirect('home'); // simple full URL works best
}

 public function update($id)
    {
        $this->validate();

        $task = \App\Models\Task::findOrFail($this->editingId);
        $task->update([
            'name' => $this->name,
            'description' => $this->description,
            
        ]);

        $this->reset(['name', 'description', 'editingId','showModal']);
        $this->loadTasks(); // refresh list
    }
    public function destroy($id)
    {
        $task = \App\Models\Task::findOrFail($id);
        $task->delete();

        $this->loadTasks(); // refresh list
    }   
    
public function store()
    {
        \App\Models\Task::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->reset(['name', 'description','editingId','showModal']);
    $this->loadTasks(); // refresh list
}

}