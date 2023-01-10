<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            @if(session()->has('message'))

            <div class="bg-gray-800 text-sm text-white rounded-md shadow-lg dark:bg-gray-900 mt-3" id="output" role="alert">
                <div class="flex p-4">
                {{ session()->get('message') }}
            
                <div class="ml-auto">
                    <button type="button" id="onClickOutput" class="inline-flex flex-shrink-0 justify-center items-center h-4 w-4 rounded-md text-white/[.5] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-gray-600 transition-all text-sm dark:focus:ring-offset-gray-900 dark:focus:ring-gray-800">
                    <span class="sr-only">Close</span>
                    <svg class="w-3.5 h-3.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.92524 0.687069C1.126 0.486219 1.39823 0.373377 1.68209 0.373377C1.96597 0.373377 2.2382 0.486219 2.43894 0.687069L8.10514 6.35813L13.7714 0.687069C13.8701 0.584748 13.9882 0.503105 14.1188 0.446962C14.2494 0.39082 14.3899 0.361248 14.5321 0.360026C14.6742 0.358783 14.8151 0.38589 14.9468 0.439762C15.0782 0.493633 15.1977 0.573197 15.2983 0.673783C15.3987 0.774389 15.4784 0.894026 15.5321 1.02568C15.5859 1.15736 15.6131 1.29845 15.6118 1.44071C15.6105 1.58297 15.5809 1.72357 15.5248 1.85428C15.4688 1.98499 15.3872 2.10324 15.2851 2.20206L9.61883 7.87312L15.2851 13.5441C15.4801 13.7462 15.588 14.0168 15.5854 14.2977C15.5831 14.5787 15.4705 14.8474 15.272 15.046C15.0735 15.2449 14.805 15.3574 14.5244 15.3599C14.2437 15.3623 13.9733 15.2543 13.7714 15.0591L8.10514 9.38812L2.43894 15.0591C2.23704 15.2543 1.96663 15.3623 1.68594 15.3599C1.40526 15.3574 1.13677 15.2449 0.938279 15.046C0.739807 14.8474 0.627232 14.5787 0.624791 14.2977C0.62235 14.0168 0.730236 13.7462 0.92524 13.5441L6.59144 7.87312L0.92524 2.20206C0.724562 2.00115 0.611816 1.72867 0.611816 1.44457C0.611816 1.16047 0.724562 0.887983 0.92524 0.687069Z" fill="currentColor"/>
                    </svg>
                    </button>
                </div>
                </div>
            </div>
        @endif
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 items-center justify-between">
            <div class="flex">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-jet-button type="submit">
                            {{ __('Resend Verification Code') }}
                        </x-jet-button>
                    </div>
                </form>
                <div class="pl-4">
                    <a
                        href="{{ route('profile.show') }}"
                        class="underline text-sm text-gray-600 hover:text-gray-900"
                    >
                        {{ __('Edit Profile') }}</a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf

                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
            <form method="POST" action="{{ route('phone.verify', Auth()->user()->id ) }}">
                @csrf

                <div>
                    <input id="phone" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-4" type="number" name="phone"required autofocus placeholder="type the verification code..."/>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        {{ __('Verify') }}
                    </button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
