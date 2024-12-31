<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <x-modal wire:model="modalex" name="modalex" title="Example Modal">
                    <p>This is the content of the modal.</p>
                </x-modal>

                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    @click="$wire.modalex">
                    Open Modal
                </button>


                    <x-modal wire:model="myModal1" name="myModal1" class="backdrop-blur">
                        <div class="mb-5">Press `ESC`, click outside or click `CANCEL` to close.</div>
                        <x-button label="Cancel" @click="$wire.myModal1 = false" />
                    </x-modal>

                    <x-button label="Open" @click="$wire.myModal1 = true" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
