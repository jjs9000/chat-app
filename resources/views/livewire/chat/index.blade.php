{{-- <div class="flex items-center justify-center min-h-screen bg-gray-100">
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
</div> --}}

<div>
    <div class="container p-4 mx-auto">
        <div class="flex flex-col h-[820px] md:flex-row space-x-4">
            
            <!-- Chat List -->
            <div class="w-full p-4 bg-white rounded-lg shadow-md md:w-1/4">
                <div class="mb-4 text-2xl">Chat Rooms</div>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-gray-400 rounded-full"></div>
                        <div>
                            <p class="text-lg">User 1</p>
                            <p class="text-sm text-gray-500">Last message...</p>
                        </div>
                    </li>
                    <li class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-gray-400 rounded-full"></div>
                        <div>
                            <p class="text-lg">User 2</p>
                            <p class="text-sm text-gray-500">Last message...</p>
                        </div>
                    </li>
                    <!-- Add more users as needed -->
                </ul>
            </div>
            
            <!-- Chat Box -->
            <div class="flex flex-col w-full h-full bg-white rounded-lg shadow-md md:w-3/4">
                <div class="flex items-center justify-between p-4 mb-4 bg-[#008080] rounded-t-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-400 rounded-full"></div>
                        <div class="ml-4">
                            <p class="text-lg text-white">User 1</p>
                            <p class="text-sm text-gray-300"><span class="text-green-500">●</span> Online</p>
                        </div>
                    </div>
                    <div class="flex items-center pr-3 space-x-4">
                        <!-- Search icon -->
                        <button class="p-2 -m-2 hover:bg-gray-500 hover:rounded-full">
                            <img src="{{ asset('svg/search-icon.svg') }}" class="w-6 h-6" alt="Search icon" />
                        </button>
                        <!-- Options icon -->
                        <button class="p-2 -m-2 hover:bg-gray-500 hover:rounded-full">
                            <img src="{{ asset('svg/option-icon.svg') }}" class="w-6 h-6" alt="Option icon" />
                        </button>
                    </div>
                </div>
                
                <div class="flex-1 p-6">
                    <div class="flex flex-col items-start justify-start mb-4">
                        <div>
                            <div class="max-w-lg p-4 bg-gray-200 rounded-md">
                                <div>
                                    <p class="text-sm">
                                        Hello, how are you? This is a long text example to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-2">
                                <div class="flex flex-row items-center ml-1 space-x-2">
                                    <div class="w-5 h-5 bg-gray-400 rounded-full"></div>
                                    <p class="text-xs text-gray-900">User 1</p>
                                </div>
                                <p class="text-xs text-gray-500">09:12 AM</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-end justify-end mb-4">
                        <div>
                            <div class="max-w-lg p-4 bg-[#008080] rounded-md">
                                <div>
                                    <p class="text-sm text-white">
                                        Hello, how are you? This is a long text example to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.to demonstrate vertical overflow. This text should start scrolling vertically if it exceeds the height of the container.
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-2">
                                <div class="flex flex-row items-center space-x-1">
                                    <p class="text-xs text-gray-500">09:12 AM</p>
                                    <img src="{{ asset('svg/double-tick-icon.svg') }}" class="w-6 h-6" alt="Attachment icon" />
                                </div>
                                <div class="flex flex-row items-center mr-1 space-x-2">
                                    <p class="text-xs text-gray-900">User 2</p>
                                    <div class="w-5 h-5 bg-gray-400 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative flex items-center p-4">
                    <input type="text" placeholder="Type your message" class="w-full p-2 pl-4 bg-gray-100 border border-gray-100 rounded-lg placeholder:text-sm">
                    <div class="absolute flex items-center space-x-0 right-6">
                        <!-- Attachment icon button -->
                        <button class="p-2 -m-2 hover:bg-gray-300 hover:rounded-full">
                            <img src="{{ asset('svg/attachment-icon.svg') }}" class="w-5 h-5" alt="Attachment icon" />
                        </button>
                        <!-- Emoji icon button -->
                        <button class="p-2 -m-2 hover:bg-gray-300 hover:rounded-full">
                            <img src="{{ asset('svg/emoji-icon.svg') }}" class="w-5 h-5" alt="Emoji icon" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>