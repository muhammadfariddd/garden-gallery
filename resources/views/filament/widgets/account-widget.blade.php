<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-medium text-gray-900">
                    Welcome, {{ auth()->user()->name }}!
                </h2>
                <p class="text-sm text-gray-600">
                    You are logged in as an administrator.
                </p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-600">Role: {{ ucfirst(auth()->user()->role) }}</p>
                <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
