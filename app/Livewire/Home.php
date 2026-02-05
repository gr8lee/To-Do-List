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
    public $tasks = [];

    public $showModal = false;
 // To track which task is being edited
    public $editingId = null;
    public $task;


    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'nullable|min:3',
    ];
     // ✅ This is your store function

     public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }


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
        $this->reset(['name', 'description','editingId','showModal']);
    $this->loadTasks(); // refresh list

        $this->toggleModal(); // close modal after saving
    }

    public function edit($id)
    {
        // dd(123);
      $task = \App\Models\Task::findOrFail($id);
$this->editingId = $id;
$this->name = $task->name;  
$this->description = $task->description;

    // Optional: store the task ID if needed
  
$this->showModal = true;
    }

    public function update()
    {
        $this->validate();

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



    public function closeModal()
    {
        $this->showModal = false;
    }


    public function render()
    {
        return view('livewire.home');
    }



 }