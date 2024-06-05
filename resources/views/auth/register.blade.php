


{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}

{{-- </x-guest-layout> --}}






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
                                class="rounded-tl-2xl rounded-tr-none h-[90%] rounded-br-none rounded-bl-2xl bg-silver-100 overflow-hidden flex flex-col items-start justify-start pt-[126px] px-[77px] pb-[500.5px] box-border gap-[48px] max-w-[382.30999755859375px]">
                                <div class="flex flex-row items-start justify-start py-0 px-[42px] h-full">
                                    <img class="h-36 w-36 relative object-cover" loading="lazy" alt=""
                                        src="{{ asset('img/logo.png') }}" />
                                </div>
                                <h1
                                    class="m-0 relative text-inherit leading-[48px] font-normal font-inherit mq450:text-5xl mq450:leading-[19px] mq950:text-[40px] mq950:leading-[29px]">
                                    Police
                                </h1>
                            </div>
                        </div>
                        <form method="post" action="{{route('register')}}"
                            class="m-0 flex-1 flex flex-col items-end justify-start pt-[152px] pb-[140.3px] pr-12 pl-[47px] box-border gap-[37px] min-w-[335px] max-w-[918px] ">
                            <div class="w-16 h-8 hidden"></div>
                            @csrf


                            <div class="mb-6">
                                <label for="name":value="__('Name')" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="name" name="name"    class=" mr-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required />
                            </div>
                            <div class="mb-6">
                                <label for="email":value="__('Email')" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                                <input type="email"  id="email" name="email"  class=" mr-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required />
                            </div>
                            <div class="mb-6">
                                <label for="password":value="__('Password')" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                                <input type="password"  id="password" name="password"  class=" mr-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required />
                            </div>
                            <div class="mb-6">
                                <label for="password_confirmation":value="__('Confirm Password')" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password_confirmation</label>
                                <input type="password"  name="password_confirmation" id="password_confirmation" class="mr-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required />
                            </div>


                            {{-- <div class="self-stretch h-[34.8px] hidden"></div> --}}
                            <button
                                class="cursor-pointer [border:none] pt-3 px-5 pb-[11px] bg-gray-100 self-stretch shadow-[0px_4px_9px_-4px_rgba(0,_0,_0,_0.35)] rounded overflow-hidden flex flex-row items-start justify-center hover:bg-dimgray">
                                <div
                                    class="relative text-[14px] leading-[23px] uppercase font-medium font-roboto text-whitesmoke text-center inline-block min-w-[41px]">
                                    {{ __('Register') }}
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
