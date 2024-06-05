{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Saira Stencil One:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div
        class="w-full relative bg-white overflow-hidden flex flex-col items-center justify-center leading-[normal] tracking-[normal]">
        <section
            class="flex-1 rounded-t-lg rounded-b-none bg-white flex flex-col items-start justify-start py-12 px-9 box-border max-w-full text-left text-[80px] text-black font-saira-stencil-one mq700:pt-[31px] mq700:pb-[31px] mq700:box-border">
            <div class="self-stretch flex flex-row flex-wrap items-start justify-start max-w-full">
                <div
                    class="flex-1 flex flex-col items-start justify-start py-0 px-3 box-border max-w-[942px] mq950:max-w-full">
                    <div
                        class="self-stretch bg-[#424242] shadow-[0px_2px_15px_-3px_rgba(0,_0,_0,_0.07),_0px_10px_20px_-2px_rgba(0,_0,_0,_0.04)] rounded-2xl bg-darkslategray overflow-hidden flex flex-row items-start justify-start max-w-full max-h-[90%]">
                        <div
                            class="flex-1 flex flex-row flex-wrap items-start justify-start py-0 pr-[3px] pl-0 box-border max-w-full">
                            <div class="flex max-h-[100%] bg-[#C4C4C4] flex-row items-start justify-start max-w-[918px] ">
                                <div
                                    class="rounded-tl-2xl rounded-tr-none rounded-br-none rounded-bl-2xl bg-silver-100 overflow-hidden flex flex-col items-start justify-start pt-[126px] px-[77px] pb-[207.5px] box-border gap-[48px] max-w-[382.30999755859375px] mq450:gap-[24px] mq450:pl-5 mq450:pr-5 mq450:box-border mq450:max-w-full mq700:pt-[82px] mq700:pb-[135px] mq700:box-border">
                                    <div class="flex flex-row items-start justify-start py-0 px-[42px]">
                                        <img class="h-36 w-36 relative object-cover" loading="lazy" alt=""
                                            src="{{ asset('img/logo.png') }}" />
                                    </div>
                                    <h1
                                        class="m-0 relative text-inherit leading-[48px] font-normal font-inherit mq450:text-5xl mq450:leading-[19px] mq950:text-[40px] mq950:leading-[29px]">
                                        Police
                                    </h1>
                                </div>
                            </div>
                            <form method="post" action="{{route('login')}}"
                                class="m-0 flex-1 flex flex-col items-end justify-start pt-[152px] pb-[140.3px] pr-12 pl-[47px] box-border gap-[37px] min-w-[335px] max-w-[918px] ">
                                <div class="w-16 h-8 hidden"></div>
                                @csrf
                                {{-- <div class="w-[90px] h-12 hidden"></div>
                                <div
                                    class="self-stretch flex flex-col items-start justify-start gap-[22.4px] max-w-full">
                                    <div
                                        class="self-stretch flex flex-col items-start justify-start gap-[17px] max-w-full">
                                        <b
                                            class="relative text-2xl leading-[26px] font-bold font-roboto text-white whitespace-nowrap text-left inline-block min-w-[60px] mq450:text-lgi mq450:leading-[20px]">Email
                                        </b>
                                        <div
                                            class="w-full flex flex-row items-start justify-start max-w-[439.3px] [row-gap:20px] z-[1] mq450:max-w-full mq700:flex-wrap">
                                            <div
                                                class="h-[45px] w-[9px] relative rounded-tl rounded-tr-none rounded-br-none rounded-bl box-border border-t-[1.2px] border-solid border-gray-200 border-b-[1.2px] border-l-[1.2px]">
                                            </div>
                                            <div
                                                class="h-[45px] w-[88.8px] relative box-border max-w-[423.260009765625px] border-t-[1.2px] border-solid border-gray-200 border-b-[1.2px] mq450:max-w-full">
                                            </div>
                                            <div
                                                class="flex-1 flex flex-row items-start justify-start relative min-w-[222px] max-w-full">
                                                <input
                                                    class="w-[100.5px] [border:none] [outline:none] bg-[transparent] h-[37.2px] !m-[0] absolute top-[0px] left-[-85.8px] overflow-hidden flex flex-row items-start justify-start pt-[11.2px] px-0 pb-0 box-border font-roboto text-base text-silver-200 max-w-[395.3340148925781px] mq450:max-w-full"
                                                    placeholder="Email address" type="text" name="email" />

                                                <div
                                                    class="h-[44.6px] flex-1 relative rounded-tl-none rounded-tr rounded-br rounded-bl-none box-border max-w-full border-t-[1.2px] border-solid border-gray-200 border-r-[1.2px] border-b-[1.2px]">
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div
                                        class="self-stretch flex flex-col items-start justify-start gap-[17.6px] max-w-full">
                                        <b
                                            class="relative text-2xl leading-[26px] font-bold font-roboto text-white text-left inline-block min-w-[107px] mq450:text-lgi mq450:leading-[20px]">Password
                                        </b>
                                        <div
                                            class="w-full flex flex-row items-start justify-start max-w-[439.3px] [row-gap:20px] z-[1] mq450:max-w-full mq700:flex-wrap">
                                            <div
                                                class="h-[44.6px] w-[9px] relative rounded-tl rounded-tr-none rounded-br-none rounded-bl box-border border-t-[1.2px] border-solid border-gray-200 border-b-[1.2px] border-l-[1.2px]">
                                            </div>
                                            <div
                                                class="h-[44.6px] w-16 relative box-border max-w-[423.260009765625px] border-t-[1.2px] border-solid border-gray-200 border-b-[1.2px] mq450:max-w-full">
                                            </div>
                                            <div
                                                class="flex-1 flex flex-row items-start justify-start relative min-w-[238px] max-w-full">
                                                <input
                                                    class="w-full [border:none] [outline:none] h-[37.2px] !m-[0] absolute top-[0px] left-[-61px] overflow-hidden flex flex-row items-start justify-start pt-[11.2px] px-0 pb-0 box-border font-roboto text-base text-silver-200 max-w-[395.3340148925781px] mq450:max-w-full"
                                                    placeholder="Password" type="text" name='password' />

                                                <div
                                                    class="h-[44.6px] flex-1 relative rounded-tl-none rounded-tr rounded-br rounded-bl-none box-border max-w-full border-t-[1.2px] border-solid border-gray-200 border-r-[1.2px] border-b-[1.2px]">
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                {{-- </div> --}}

                                <div class="mb-6">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                                    <input type="email" id="email" name="email"  class=" mr-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required />
                                </div> 
                                <div class="mb-6">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" class="mr-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                                </div> 
                                

                                {{-- <div class="self-stretch h-[34.8px] hidden"></div> --}}
                                <button
                                    class="cursor-pointer [border:none] pt-3 px-5 pb-[11px] bg-gray-100 self-stretch shadow-[0px_4px_9px_-4px_rgba(0,_0,_0,_0.35)] rounded overflow-hidden flex flex-row items-start justify-center hover:bg-dimgray">
                                    <div
                                        class="relative text-[14px] leading-[23px] uppercase font-medium font-roboto text-whitesmoke text-center inline-block min-w-[41px]">
                                        Login
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
