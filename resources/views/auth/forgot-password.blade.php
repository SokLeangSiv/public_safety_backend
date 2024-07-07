<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Saira Stencil One:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex justify-center items-center">

    <div class="w-full max-w-4xl h-[500px] bg-white shadow-md rounded-lg overflow-hidden">
        <div class="md:flex h-full">
            <div class="md:w-1/2 bg-gray-200 flex items-center justify-center p-6">
                <div class="text-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Police Badge" class="mx-auto mb-4 w-64 h-64">
                    <h2 class="text-3xl font-bold text-gray-800">Police</h2>
                </div>
            </div>
            <div class="md:w-1/2 bg-gray-800 p-8 flex items-center justify-center">
                <div class="w-full">

                    <form method="POST" action="{{ route('password.email') }}" class="w-full space-y-6">
                        @csrf
                        <div>
                            <h2 class="text-3xl font-bold text-white">Reset Password</h2>
                        </div>
                        @if (session('status'))
                        <div class="mb-4 text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="mb-12">
                            <label class="block text-gray-400 text-sm mb-2" for="email">Email</label>
                            <input id="email" type="email" name="email" required autofocus class="w-full px-3 py-2 bg-gray-700 text-gray-200 rounded border border-gray-600 focus:outline-none focus:border-gray-500">
                        </div>
                        <div style="margin-top: 60px;">
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
