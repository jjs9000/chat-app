<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="container max-w-4xl p-6 space-y-4 bg-white rounded-lg shadow">
        <div class="text-center">
            <h2 class="mb-4 text-2xl font-semibold text-gray-800">Send Message</h2>
            <p class="text-gray-600">Connect with your audience</p>
        </div>
        <div class="mt-5">
            <form class="space-y-4 form" wire:submit.prevent="triggerEvent">
                <div>
                    <x-text-input wire:model="message" type="text" class="block w-full px-4 py-2 m-0 text-xl font-normal text-gray-700 transition ease-in-out bg-white border border-gray-300 border-solid rounded form-control bg-clip-padding focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Enter your message"></x-text-input>
                </div>
                <div class="text-right">
                    <x-primary-button type="submit" class="px-6 py-2 text-xs font-medium leading-tight text-white uppercase transition duration-150 ease-in-out bg-blue-600 rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg">Send</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>