<!-- Chat Box -->
<div class="container flex items-center justify-center max-h-screen p-4 mx-auto bg-gray-100">
  <div class="w-full h-[75vh] bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px] rounded-lg shadow-md md:w-3/4 flex flex-col">
      <div class="flex items-center justify-between p-4 mb-4 bg-[#008080] rounded-t-lg">
          <div class="flex items-center">
              <div class="w-8 h-8 bg-gray-400 rounded-full md:w-10 md:h-10"></div>
              <div class="ml-2 md:ml-4">
                  <p class="text-sm text-white md:text-lg">{{ $user->name }}</p>
                  <p class="text-xs text-gray-300 md:text-sm"><span class="text-green-500">●</span> Online</p>
              </div>
          </div>
          <div class="flex items-center pr-2 space-x-2 md:space-x-4 md:pr-3">
              <!-- Search icon -->
              <button class="p-1 -m-1 md:p-2 md:-m-2">
                  <img src="{{ asset('svg/search-icon.svg') }}" class="w-5 h-5 md:w-6 md:h-6" alt="Search icon" />
              </button>
              <!-- Options icon -->
              <button class="p-1 -m-1 md:p-2 md:-m-2">
                  <img src="{{ asset('svg/option-icon.svg') }}" class="w-5 h-5 md:w-6 md:h-6" alt="Option icon" />
              </button>
          </div>
      </div>
      
      <div id="messages-container" class="[@media(max-width:1920px)]:scrollbar-hide flex-1 p-4 overflow-y-auto md:p-6">
          @foreach ($messages as $message)
          <div class="mb-4 {{ $message['sender'] == auth()->user()->name ? 'text-right' : 'text-left' }}">
              <div class="inline-block max-w-lg p-3 md:max-w-lg md:p-4 {{ $message['sender'] == auth()->user()->name ? 'bg-[#218AFF] text-white' : 'bg-gray-200' }} rounded-md">
                  <p class="text-xs text-left break-words md:text-sm">{{ $message['message'] }}</p>
              </div>
              <div class="mt-1 text-xs text-gray-500 md:mt-2">
                {{ $message['created_at'] }}
            </div>
          </div>
          @endforeach
      </div>
      
      <form wire:submit.prevent="sendMessage" class="p-4">
        <div class="relative flex items-center">
            <!-- Container for icons and textarea -->
            <div class="flex items-center flex-1 space-x-2">
                <!-- Emoji and Attachment icons -->
                <div class="flex items-center space-x-2">
                    <!-- Attachment icon button -->
                    <button type="button" class="p-1 hover:bg-gray-300 hover:rounded-full">
                        <img src="{{ asset('svg/attachment-icon.svg') }}" class="w-4 h-4 md:w-5 md:h-5" alt="Attachment icon" />
                    </button>
                    <!-- Emoji icon button -->
                    <button type="button" class="p-1 hover:bg-gray-300 hover:rounded-full">
                        <img src="{{ asset('svg/emoji-icon.svg') }}" class="w-4 h-4 md:w-5 md:h-5" alt="Emoji icon" />
                    </button>
                </div>
                <!-- Textarea field adjusted for icon space -->
                <textarea wire:model="message" placeholder="Type your message" class="[@media(max-width:1920px)]:scrollbar-hide flex-1 p-2 overflow-auto bg-gray-200 border border-gray-200 rounded-lg resize-none placeholder:text-xs md:placeholder:text-sm" style="margin-left: 10px; padding-right: 50px; height: auto; min-height: 40px; max-height: 150px; /* Adjust max-height as needed */" oninput="this.style.height = '';this.style.height = Math.min(this.scrollHeight, 150) + 'px'"></textarea>
            </div>
            <!-- Send button on the right within the textarea -->
            <div class="absolute right-4 md:right-6">
                <button type="submit" class="p-1 hover:bg-gray-300 hover:rounded-full">
                    <img src="{{ asset('svg/send-icon.svg') }}" class="w-4 h-4 md:w-5 md:h-5" alt="Send icon" />
                </button>
            </div>
        </div>
    </form>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const messagesContainer = document.getElementById('messages-container');
    if (messagesContainer) {
      messagesContainer.scrollTo({
        top: messagesContainer.scrollHeight,
        behavior: 'smooth'
      });
    }
  });
</script>