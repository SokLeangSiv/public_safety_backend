@extends('master')
@section('content')
    <div class="container">
        <h1 class="title text-black dark:text-white">Incident Report</h1>
        <form action="{{ route('report.update', ['id' => $reports->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table id="incident-reports">
                <tbody>
                    <tr>
                        <th class="text-black dark:text-white">ID</th>
                        <td class="text-black dark:text-white">{{ $reports->id }}</td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Report By</th>
                        <td class="text-black dark:text-white">
                            <input type="text" name="report_by" value="{{ $reports->report_by }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Report Date</th>
                        <td class="text-black dark:text-white">
                            <input type="date" name="report_date" value="{{ $reports->report_date }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Incident Type</th>
                        <td class="text-black dark:text-white">
                            <input type="text" name="incident_type" value="{{ $reports->incident_type }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Date of Incident</th>
                        <td class="text-black dark:text-white">
                            <input type="date" name="date_incident" value="{{ $reports->date_incident }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Province</th>
                        <td class="text-black dark:text-white">
                            <input type="text" name="province" value="{{ $reports->province }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Incident Location</th>
                        <td class="text-black dark:text-white">
                            <input type="text" name="incident_location" value="{{ $reports->incident_location }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Incident Description</th>
                        <td class="text-black dark:text-white">
                            <textarea class="text-black" name="incident_description" rows="4" readonly>{{ $reports->incident_description }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Latitude</th>
                        <td class="text-black dark:text-white">
                            <input type="text" name="lat" value="{{ $reports->lat }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Longitude</th>
                        <td class="text-black dark:text-white">
                            <input type="text" name="long" value="{{ $reports->long }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Report Status</th>
                        <td class="text-black dark:text-white">
                            <input type="text" name="report_status" value="{{ $reports->report_status }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Report Image</th>
                        <td class="text-black dark:text-white">
                            @if ($reports->report_image)
                                <br><img src="{{ asset($reports->report_image) }}" alt="Report Image" style="max-width: 100px;">
                            @endif
                            <br><input type="file" name="report_image">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white">Report Video</th>
                        <td class="text-black dark:text-white">
                            @if ($reports->report_video)
                                <br><video width="320" height="240" controls>
                                    <source src="{{ asset($reports->report_video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                            <br><input type="file" name="report_video">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="button-container">
                <button type="submit" class="update-button">Update</button>
            </div>
        </form>
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

    input[type="text"],
    input[type="date"],
    input[type="file"],
    textarea {
        width: 100%;
        max-width: 400px;
        padding: 14px;
        border: 1px solid #ccc;
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
