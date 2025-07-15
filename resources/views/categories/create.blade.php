@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Create Category</h1>
                <a href="{{ route('categories.index') }}" class="text-green-600 hover:text-green-700">
                    Back to Categories
                </a>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow p-6">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Category Name
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            required>
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('description') }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                            Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
