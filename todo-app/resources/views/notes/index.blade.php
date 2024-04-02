<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Notes/Task List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('notes.create') }}" class="btn btn-primary" style="color:white">Create New Note/Task</a>
                    <table class="table mt-3 w-full text-white">
                        <thead >
                            <tr>
                                <th class="border border-white px-4 py-2">Title</th>
                                <th class="border border-white px-4 py-2">Description</th>
                                <th class="border border-white px-4 py-2">Date Created</th>
                                <th class="border border-white px-4 py-2">Status</th>
                                <th class="border border-white px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notes as $note)
                            <tr class="border border-white">
                                <td class="border border-white px-4 py-2">{{ $note->title }}</td>
                                <td class="border border-white px-4 py-2">{{ $note->description }}</td>
                                <td class="border border-white px-4 py-2">{{ $note->date_created }}</td>
                                <td class="border border-white px-4 py-2">
                                    <!-- Toggle Status Button -->
                                    <form action="{{ route('notes.updateStatus', $note->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-blue-500 hover:text-blue-700">
                                            @if($note->completed)
                                                <span class="text-green-500">Completed</span>
                                            @else
                                                <span class="text-red-500">Pending</span>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td class="border border-white px-4 py-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('notes.edit', $note->id) }}" class="text-blue-500 hover:text-blue-700 ml-2">Edit</a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
