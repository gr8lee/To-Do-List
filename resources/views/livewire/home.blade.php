
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
        @forelse ($tasks as $task)
        <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->description }}</td>

            <td>
                <!-- Edit Button -->
                <button
                    wire:click="edit({{ $task->id }})"
                    class="table-btn"
                    type="button">
                    Edit
                </button>

                <!-- Delete Button -->
                <button
                    wire:click="destroy({{ $task->id }})"
                    class="table-btn"
                    type="button"
                    onclick="return confirm('Are you sure you want to delete this task?')">
                    Delete
                </button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No tasks found.</td>
        </tr>
        @endforelse


    </tbody>
</table>
</div>

