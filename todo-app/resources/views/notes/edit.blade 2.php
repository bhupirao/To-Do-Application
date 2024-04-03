<!-- edit.blade.php -->
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
                    <form action="{{ route('notes.update', $note->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title" style="color: white;">Title ---></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $note->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description" style="color: white;" >Description ---></label>
                            <textarea class="form-control" id="description" name="description">{{ $note->description }}</textarea>
                        </div>
                        <!-- <div class="form-group">
    <label for="shareable_link">Shareable Link</label>
    <input type="text" class="form-control" id="shareable_link" name="shareable_link" value="{{ $note->shareable_link ?? '' }}">
</div> -->

                        <button type="submit" class="btn btn-primary" style="background-color: blue; color:white;" >Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
