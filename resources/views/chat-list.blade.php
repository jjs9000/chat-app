<x-app-layout>
    <div>
        <div class="container p-4 mx-auto">
            <div class="flex flex-col h-[820px] md:flex-row space-x-4">
                
                <!-- Chat List -->
                <div class="w-full p-4 bg-white rounded-lg shadow-md md:w-1/4">
                    <div class="mb-4 text-2xl">Friends</div>
                    @foreach ($users as $user)
                    <div>
                        <ul class="space-y-0">
                            <li class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-200">
                                <a href="{{ route('chat', $user->id) }}" class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-gray-400 rounded-full"></div>
                                    <div>
                                        <p class="font-semibold text-md">{{ $user->name }}</p>
                                        <p class="text-sm text-gray-500">Last message ...</p>
                                    </div>
                                </a>
                                <div class="flex flex-col items-end justify-end">
                                    <span class="text-sm text-gray-500">09:14 AM</span>
                                    <span class="w-5 h-5 text-sm text-center text-white bg-[#DC143C] rounded-full">1</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
