<div>
    <div>
        <form wire:submit.prevent="save">
            <div class="mb-4">
                <h2 class="text-lg font-semibold">Product Tags</h2>

                @foreach ($tasks as $list)
                    <div class="ml-5">
                        <li>{{ $list->tasks }} - {{ $list->status ? 'finished' : 'pending' }}
                            <button type="button" wire:click="update({{ $list->id }})"
                                class="ml-2 text-green-500  hover:text-green-700">Mark as Completed</button>
                            <button type="button" wire:click="removeTag({{ $list->id }})"
                                class="ml-2 text-red-500 hover:text-red-700">remove</button>
                        </li>
                    </div>
                @endforeach

                <div class="flex items-center mb-2">
                    <input type="text" wire:model="tags" class="border rounded p-2 flex-1" placeholder="Enter tag">
                </div>

                @error('tags')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>

            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">
                Save Tags
            </button>
        </form>

        @if (session()->has('message'))
            <div class="mt-4 text-green-500">
                {{ session('message') }}
            </div>
        @endif


    </div>

</div>
