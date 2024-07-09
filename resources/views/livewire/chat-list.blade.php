<div>
    <div class="container p-4 mx-auto">
        <div class="flex flex-col items-center justify-center max-h-screen space-x-4 md:flex-row">
            
            <!-- Chat List -->
            <div class="w-full bg-white rounded-lg shadow-md md:w-1/4">
                <!-- Title stays outside the scrollable area -->
                <div class="p-4 bg-[#008080] rounded-t-lg">
                    <div class="text-2xl text-white">Friends</div>
                </div>
                
                <!-- Scrollable List with Relative Container -->
                <div class="relative">
                    <div class="[@media(max-width:1920px)]:scrollbar-hide overflow-y-auto h-[500px]">
                        @foreach ($users as $user)
                        <div>
                            <ul class="space-y-2">
                                <li class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-200">
                                    <a href="{{ url('chat/' . $user->id) }}" class="flex items-center space-x-4">
                                        @if($user->profile_photo)
                                            <!-- Correctly access the user's profile photo using the 'profile_photo_path' attribute -->
                                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}'s profile photo" class="object-cover w-10 h-10 rounded-full">
                                        @else
                                            <!-- Fallback or default image if no profile photo is set -->
                                            <img src="https://via.placeholder.com/150" alt="Profile Picture Placeholder" class="w-10 h-10 rounded-full">
                                        @endif
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
                    <!-- Gradient Overlay for Blur Effect -->
                    <div class="absolute bottom-0 left-0 w-full h-16 pointer-events-none bg-gradient-to-t from-gray-200 to-transparent"></div>
                </div>
            </div>
        </div>
    </div>
</div>