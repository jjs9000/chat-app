<!-- Chat Box -->
<div>
    <div class="flex flex-col w-full h-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px] rounded-lg shadow-md md:w-3/4">
        <div class="flex items-center justify-between p-4 mb-4 bg-[#008080] rounded-t-lg">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gray-400 rounded-full"></div>
                <div class="ml-4">
                    <p class="text-lg text-white">{{ $user->name }}</p>
                    <p class="text-sm text-gray-300"><span class="text-green-500">●</span> Online</p>
                </div>
            </div>
            <div class="flex items-center pr-3 space-x-4">
                <!-- Search icon -->
                <button class="p-2 -m-2">
                    <img src="{{ asset('svg/search-icon.svg') }}" class="w-6 h-6" alt="Search icon" />
                </button>
                <!-- Options icon -->
                <button class="p-2 -m-2">
                    <img src="{{ asset('svg/option-icon.svg') }}" class="w-6 h-6" alt="Option icon" />
                </button>
            </div>
        </div>
        
        <div class="flex-1 p-6 overflow-y-auto">
            @foreach ($messages as $message)
            <div class="mb-4 {{ $message['sender'] == auth()->user()->name ? 'text-right' : 'text-left' }}">
                <div class="inline-block max-w-lg p-4 {{ $message['sender_id'] == auth()->id() ? 'bg-[#218AFF] text-white' : 'bg-gray-200' }} rounded-md">
                    <p class="text-sm">{{ $message['message'] }}</p>
                </div>
                <div class="mt-2 text-xs text-gray-500">
                    {{ $message['created_at'] }}
                </div>
            </div>
            @endforeach
        </div>
        
        <form wire:submit.prevent="sendMessage">
            <div class="relative flex items-center p-4">
                <input wire:model="message" type="text" placeholder="Type your message" class="w-full p-2 pl-4 bg-gray-100 border border-gray-100 rounded-lg placeholder:text-sm">
                <div class="absolute flex items-center space-x-0 right-6">
                    <!-- Attachment icon button -->
                    <button type="button" class="p-2 -m-2 hover:bg-gray-300 hover:rounded-full">
                        <img src="{{ asset('svg/attachment-icon.svg') }}" class="w-5 h-5" alt="Attachment icon" />
                    </button>
                    <!-- Emoji icon button -->
                    <button type="button" class="p-2 -m-2 hover:bg-gray-300 hover:rounded-full">
                        <img src="{{ asset('svg/emoji-icon.svg') }}" class="w-5 h-5" alt="Emoji icon" />
                    </button>
                    <!-- Send button -->
                    <button type="submit" class="p-2 -m-2 hover:bg-gray-300 hover:rounded-full">
                        <img src="{{ asset('svg/send-icon.svg') }}" class="w-5 h-5" alt="Send icon" />
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>