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
        x-data="{ open: false,
            closeModal() {
                this.open = false

                $wire.closeModal()
            }
        }"
        x-on:open-modal.window="open = true"
        x-on:task-created.window="closeModal()"
        x-show="open"
        x-cloak
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
    >

        <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">

            <h2 class="text-2xl font-bold mb-5">
                Create Task
            </h2>

            <!-- TITLE -->

            <div class="mb-4">

                <input
                    type="text"
                    wire:model="title"
                    placeholder="Task title"
                    class="border rounded-lg p-3 w-full"
                >

                @error('title')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <!-- DESCRIPTION -->

            <div class="mb-4">

                <textarea
                    wire:model="description"
                    placeholder="Description"
                    class="border rounded-lg p-3 w-full"
                ></textarea>

            </div>

            <!-- CLIENT -->

            <div class="mb-4">

                <select
                    wire:model="client_id"
                    class="border rounded-lg p-3 w-full"
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

                @error('client_id')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <!-- PRIORITY -->

            <div class="mb-5">

                <select
                    wire:model="priority"
                    class="border rounded-lg p-3 w-full"
                >

                    <option value="low">Low</option>

                    <option value="medium">Medium</option>

                    <option value="high">High</option>

                </select>

            </div>

            <!-- BUTTONS -->

            <div class="flex items-center gap-3">

                <button
                    wire:click="save"
                    class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg"
                >
                    Save Task
                </button>

                <button
                    @click="closeModal()"
                    class="text-red-500 font-medium"
                >
                    Close
                </button>

            </div>

        </div>

    </div>

</div>