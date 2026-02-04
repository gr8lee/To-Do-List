<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Console\View\Components\Task as ComponentsTask;      
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


#[Title('Task Page')]
#[Layout('layouts.custom')]
class Page extends Component
{

    public $name;
    public $description;
    public $tasks = [];
    public $taskId;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'nullable|min:3',
    ];
    public function render()
    {

    $this->tasks = Task::orderBy('created_at', 'desc')->get(); // Keep as Collection
        return view('livewire.page',);
    }

    public function edit($id)
{
    // You can load the task if needed
    $task = Task::findOrFail($id);
    $this->taskId = $task->id;

    // Redirect to your page view
    return redirect()->route('livewire.page'); 
}

        public function store()
    {
        $this->validate();

        \App\Models\Task::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset(['name', 'description']);
        return redirect()->back();
    }
   
}
