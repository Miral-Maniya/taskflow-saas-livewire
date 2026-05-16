<div class="p-6">

    <div class="flex justify-between mb-6">

        <input
            type="text"
            wire:model.live="search"
            placeholder="Search tasks..."
            class="border rounded p-2 w-64"
        >

        <button
            x-data
            x-on:click="$dispatch('open-modal')"
            class="bg-blue-500 text-white px-4 py-2 rounded"
        >
            Add Task
        </button>

    </div>

    <!-- TASK TABLE -->

    <table class="w-full border">

        <thead>

            <tr class="bg-gray-100">

                <th class="border p-3">Title</th>

                <th class="border p-3">Priority</th>

                <th class="border p-3">Status</th>

            </tr>

        </thead>

        <tbody>

            @foreach($tasks as $task)

                <tr>

                    <td class="border p-3">
                        {{ $task->title }}
                    </td>

                    <td class="border p-3">
                        {{ ucfirst($task->priority) }}
                    </td>

                    <td class="border p-3">
                        {{ ucfirst($task->status) }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

    <div class="mt-4">
        {{ $tasks->links() }}
    </div>

    <!-- MODAL -->

    <div
        x-data="{ open: false }"

        x-on:open-modal.window="open = true"

        x-show="open"

        class="fixed inset-0 bg-black/50 flex items-center justify-center"
    >

        <div class="bg-white p-6 rounded w-96">

            <h2 class="text-xl font-bold mb-4">
                Create Task
            </h2>

            <input
                type="text"
                wire:model="title"
                placeholder="Task title"
                class="border rounded p-2 w-full mb-3"
            >

            <textarea
                wire:model="description"
                placeholder="Description"
                class="border rounded p-2 w-full mb-3"
            ></textarea>

            <select
                wire:model="client_id"
                class="border rounded p-2 w-full mb-3"
            >

                <option value="">
                    Select Client
                </option>

                @foreach($clients as $client)

                    <option value="{{ $client->id }}">
                        {{ $client->name }}
                    </option>

                @endforeach

            </select>

            <select
                wire:model="priority"
                class="border rounded p-2 w-full mb-3"
            >

                <option value="low">Low</option>

                <option value="medium">Medium</option>

                <option value="high">High</option>

            </select>

            <button
                wire:click="save"
                class="bg-green-500 text-white px-4 py-2 rounded"
            >
                Save Task
            </button>

            <button
                @click="open = false"
                class="ml-2 text-red-500"
            >
                Close
            </button>

        </div>

    </div>

</div>