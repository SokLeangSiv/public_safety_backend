<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Saira+Stencil+One:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-4xl h-[600px] bg-white shadow-md rounded-lg overflow-hidden">
        <div class="md:flex h-full">
            <div class="md:w-1/2 bg-gray-200 flex items-center justify-center p-6">
                <div class="text-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Police Badge" class="mx-auto mb-4 w-64 h-64">
                    <h2 class="text-3xl font-bold">Police</h2>
                </div>
            </div>
            <div class="md:w-1/2 bg-gray-800 p-8 flex items-center justify-center">
                <form method="POST" action="{{ route('register') }}" class="w-full space-y-6">
                    @csrf
                    <div>
                        <label class="block text-gray-400 text-sm mb-2" for="name">Name</label>
                        <input id="name" type="text" name="name" required autofocus class="w-full px-3 py-2 bg-gray-700 text-gray-200 rounded border border-gray-600 focus:outline-none focus:border-gray-500" placeholder="John Doe">
                        @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2" for="email">Email</label>
                        <input id="email" type="email" name="email" required class="w-full px-3 py-2 bg-gray-700 text-gray-200 rounded border border-gray-600 focus:outline-none focus:border-gray-500" placeholder="john.doe@company.com">
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2" for="password">Password</label>
                        <input id="password" type="password" name="password" required class="w-full px-3 py-2 bg-gray-700 text-gray-200 rounded border border-gray-600 focus:outline-none focus:border-gray-500" placeholder="********">
                        @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-400 text-sm mb-2" for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full px-3 py-2 bg-gray-700 text-gray-200 rounded border border-gray-600 focus:outline-none focus:border-gray-500" placeholder="********">
                        @error('password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="w-full bg-black text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            REGISTER
                        </button>
                    </div>
                    <div class="flex items-center justify-center mt-4">
                        <span class="text-gray-400 text-sm">Already registered?</span>
                        <a href="{{ route('login') }}" class="ml-2 text-sm text-indigo-400 hover:text-indigo-300 font-semibold">Log in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
