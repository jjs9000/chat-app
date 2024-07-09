<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

new class extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public string $name = '';
    public string $email = '';
    public $profile_photo;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'profile_photo' => ['nullable', 'image', 'max:1024'],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($this->profile_photo) {
            $imageName = $this->profile_photo->getClientOriginalName();
            $path = $this->profile_photo->storeAs('profile-photos', $imageName, 'public');
            
            $user->profile_photo = $path;
            $this->profile_photo = null;
        }

        $user->save();

        $this->alert('success', 'Profile successfully updated');
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">

        <div class="relative flex flex-col w-full max-w-sm gap-1 text-slate-700 dark:text-slate-300">
            <x-input-label for="profile_photo" :value="__('Profile Photo')" />
            <input wire:model="profile_photo" id="fileInput" type="file" class="w-full max-w-md text-sm text-gray-600 border border-gray-300 bg-slate-100/50 overflow-clip rounded-xl file:mr-4 file:cursor-pointer file:border-none file:bg-gray-800 file:px-4 file:py-2 file:font-medium file:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75" />
            <small class="pl-0.5 text-gray-400">PNG, JPG, WebP - Max 1MB</small>
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        @if ($profile_photo)
            <div class="mt-2">
                <img src="{{ $profile_photo->temporaryUrl() }}" alt="Profile Photo" class="w-20 h-20 rounded-full">
            </div>
        @endif

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="block w-full mt-1" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="block w-full mt-1" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
