<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Note/Task
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('notes.update', $note->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                                <input id="title" type="text" name="title" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $note->title }}" required />
                            </div>

                            <div class="col-span-6">
                                <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                                <textarea id="description" name="description" class="form-textarea rounded-md shadow-sm mt-1 block w-full" rows="3" required>{{ $note->description }}</textarea>
                            </div>

                            <div class="col-span-6 flex justify-end">
                                <button type="submit" class="btn btn-primary" style="color:white; background-color:blue; border-radius:10%;">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
