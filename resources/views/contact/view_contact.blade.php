@extends('master')
@section('content')
<div class="mx-10 md:mx-10 lg:mx-24 xl:mx-64 max-w-screen-xl p-4 md:p-6 lg:p-10">
<div class="container rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
    <h1 class="title text-black dark:text-white">Contact Details</h1>
    <table id="feedback-details">
        <tbody>
            <tr>
                <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Feedback By</th>
                <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">{{ $contacts->name }}</td>
            </tr>
            <tr>
                <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Email</th>
                <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">{{ $contacts->email }}</td>
            </tr>
            <tr>
                <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Phone Number</th>
                <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">{{ $contacts->phone }}</td>
            </tr>
            <tr>
                <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Description</th>
                <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                    <textarea id="div_editor1" rows="4"
                        class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                        required disabled>{{ $contacts->subject }}</textarea>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
@endsection

<style>
    .container {
        max-width: 1600px;
        margin: 40px auto;
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
        border-collapse: collapse;
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

    textarea {
        width: 100%;
        max-width: 600px;
        padding: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        color: #333;
        font-size: 1.1em;
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

    body.dark-mode textarea {
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
</style>
