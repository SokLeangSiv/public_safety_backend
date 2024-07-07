@extends('master')
@section('content')
<div class="mx-10 md:mx-10 lg:mx-24 xl:mx-64 max-w-screen-xl p-4 md:p-6 lg:p-10">


    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
            <h3 class="font-medium text-black dark:text-white">
                Contact Us
            </h3>
        </div>
        <form action="{{ route('contact.save') }}" method="post">
            @csrf
            <div class="p-6.5">
                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Email
                    </label>
                    <input type="email" name="email" placeholder="Enter your full name"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Name
                    </label>
                    <input type="text" name="name" placeholder="Enter your email address"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                </div>

                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Phone Number
                    </label>
                    <input type="text" name="phone" placeholder="Enter password" autocomplete="password"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                </div>

                <div class="mb-5.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Description
                    </label>
                    <textarea rows="6" placeholder="Type your message" name="subject"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                </div>

                <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                    Submit
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

{{-- <style>
    .lol {
        max-width: 1200px;
        margin: 40px 200px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .title {
        text-align: center;
        font-size: 2em;
        margin-bottom: 20px;
        color: #333;
    }

    table {
        width: 100%;

        margin-bottom: 20px;
    }

    table th,
    table td {
        padding: 16px;
        border: 1px solid #ddd;
        font-size: 1.2em;
    }

    table th {
        font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="file"],
    textarea,
    select {
        width: 100%;
        max-width: 400px;
        padding: 14px;

        border-radius: 4px;
        box-sizing: border-box;
        color: #333;
        font-size: 1.1em;
    }

    textarea {
        resize: vertical;
    }

    .button-container {
        text-align: center;
    }

    .update-button {
        background-color: #009688;
        padding: 12px 24px;
        font-size: 16px;
        cursor: pointer;
        border: none;
        color: white;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .update-button:hover {
        background-color: #007a63;
    }

    body.dark-mode .container {
        background-color: #333;
        color: #e0e0e0;
    }

    body.dark-mode table th,
    body.dark-mode table td {
        border: 1px solid #555;
    }

    body.dark-mode table th {
        background-color: #444;
    }

    body.dark-mode table td {
        background-color: #555;
    }

    body.dark-mode input[type="text"],
    body.dark-mode input[type="date"],
    body.dark-mode input[type="file"],
    body.dark-mode textarea,
    body.dark-mode select {
        background-color: #666;
        color: #e0e0e0;
        border: 1px solid #888;
    }

    body.dark-mode .update-button {
        background-color: #555;
        color: #e0e0e0;
    }

    body.dark-mode .update-button:hover {
        background-color: #444;
    }
</style> --}}
