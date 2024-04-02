<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create New Note/Task
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('notes.store') }}">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="title" class="block font-medium text-sm text-gray-700" style="color:white">Title</label>
                                <input id="title" type="text" name="title" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                            </div>

                            <div class="col-span-6">
                                <label for="description" class="block font-medium text-sm text-gray-700" style="color:white">Description</label>
                                <textarea id="description" name="description" class="form-textarea rounded-md shadow-sm mt-1 block w-full" rows="3" required></textarea>
                            </div>

                            <div class="col-span-6 flex justify-end">
                                <button type="submit" class="btn btn-primary" style="color:white; background-color:blue; border-radius:10%; text-size:20px">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
