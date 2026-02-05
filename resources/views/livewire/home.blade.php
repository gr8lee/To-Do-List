
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

<div>

    @if ($showModal == true)
         <div class="modal">
            <div class="modal-content">
                <button type="button" wire:click="closeModal">✖</button>
                 <form wire:submit.prevent="{{ $editingId ? 'update' : 'store' }}" class="form-container">
        <div >
            <label for="name">Name:</label>
            <input type="text" id="name" wire:model="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" wire:model="description"></textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>

      
        <button type="submit">{{ $editingId ? 'Update Task' : 'Add Task' }}</button>
    
       
       
    </form>
            </div>
         </div>

    @endif

    

         <table class="table-wrapper">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $task)
          
     
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
               <td>
                <!-- Edit Button -->
                {{-- <a href="{{ route('tasks.edit', $task->id) }}">
                    <button class="table-btn" type="button"> <a href="/tasks">Edit</a></button>
                </a> --}}
                 <button wire:click="edit({{ $task->id }})" class="table-btn" type="button">Edit Post</button>
                 <button wire:click="destroy({{ $task->id }})" class="table-btn" type="button">Delete Post</button>

                {{-- <!-- Delete Button -->
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button  class= "table-btn" type="submit" onclick="return confirm('Are you sure you want to delete this task?')">
                        Delete
                    </button>
                </form> --}}
            </td>
            </tr>
         @endforeach
            <tr>
                
                
                @if ($tasks->count() === 0)
                    <td colspan="3">No tasks found.</td>
                @else
                    <td colspan="3"> More Tasks?</td>
                @endif
            </tr>
        
    </tbody>
</table>
  
<h2 class="nav-btn"><button wire:click="toggleModal">+Add Task</button></h2>

 
</div>






