<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            <span class="text-yellow-500">Create New Note/Task</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <a href="{{ route('notes.create') }}" class="btn" style="background-color: blue; color: white;">Create New Note/Task</a>
                    <div class="table-container mt-3">
                        <table class="table">
                            <thead class="bg-blue-500 text-white">
                                <tr>
                                    <th class="px-4 py-2 w-1/3">Title</th>
                                    <th class="px-4 py-2 w-1/3">Description</th>
                                    <th>Shareable Link</th>
                                    <th class="px-4 py-2 w-1/3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notes as $note)
                                <tr class="bg-white border-b border-gray-200">
                                    <td class="px-4 py-2 w-1/3">{{ $note->title }}</td>
                                    <td class="px-4 py-2 w-1/3">{{ $note->description }}</td>
                                    <td>{{ $note->shareable_link }}</td>
                                    <td class="px-4 py-2 w-1/3">
                                        <div class="flex gap-4 items-center">
                                            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-green" style="background-color: green;">Edit</a>
                                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-red" style="background-color: red;">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
