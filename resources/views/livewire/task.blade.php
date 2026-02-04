
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

<div>


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
  
<h2 class="nav-btn"><a href="/page">+Add Task</a></h2>

 
</div>


