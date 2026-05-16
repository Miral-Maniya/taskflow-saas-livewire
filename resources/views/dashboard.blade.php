<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                TaskFlow Dashboard
            </h2>

            <a
                href="{{ route('web.tasks') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded"
            >
                Tasks
            </a>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded shadow">

                    <h3 class="text-lg font-bold mb-2">
                        Total Tasks
                    </h3>

                    <p class="text-3xl font-bold">
                        {{ \App\Models\Task::count() }}
                    </p>

                </div>

                <div class="bg-white p-6 rounded shadow">

                    <h3 class="text-lg font-bold mb-2">
                        Clients
                    </h3>

                    <p class="text-3xl font-bold">
                        {{ \App\Models\Client::count() }}
                    </p>

                </div>

                <div class="bg-white p-6 rounded shadow">

                    <h3 class="text-lg font-bold mb-2">
                        Pending Tasks
                    </h3>

                    <p class="text-3xl font-bold">
                        {{ \App\Models\Task::where('status', 'pending')->count() }}
                    </p>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>