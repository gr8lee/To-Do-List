<div>
    
   <form wire:submit.prevent="store" class="form-container">
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

      
        <button type="submit">Add Task</button>
    
       
       
    </form>
</div>
