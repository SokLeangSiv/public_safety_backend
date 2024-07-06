@extends('master')
@section('content')
<div class="container mx-auto flex flex-col justify-center items-center min-h-screen px-4">
    <div class="w-full max-w-4xl mb-8">
        <h1 class="text-4xl font-extrabold text-gray-800 dark:text-white mb-8 text-center">Reports for Province: {{ $province }}</h1>
        @if ($reports->isEmpty())
            <div class="text-center error-message">
                <h2 class="text-6xl font-extrabold text-red-600 mb-4">404 Error</h2>
                <p class="text-lg text-gray-800 dark:text-white mb-6">Sorry, no reports found for this province.</p>
                <a href="{{ route('map') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">Go Home</a>
            </div>
        @else
            <div class="overflow-x-auto mb-8 shadow-lg rounded-lg">
                <table class="min-w-full divide-y bg-white dark:bg-black">
                    <thead class="bg-gray-800 dark:bg-gray-950 ">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-100 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-100 uppercase tracking-wider">Date Reported</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-100 uppercase tracking-wider">Incident Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-100 uppercase tracking-wider">Location</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-100 uppercase tracking-wider">Date of Incident</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-100 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-100 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-black divide-y divide-gray-200 dark:divide-gray-500">
                        @foreach ($reports as $report)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-200 dark:text-white">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $report->report_by }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-800 dark:text-white">{{ $report->report_date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-800 dark:text-white">{{ $report->incident_type }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-800 dark:text-white">{{ $report->province }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-800 dark:text-white">{{ $report->date_incident }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($report->report_status == 'pending')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">{{ $report->report_status }}</span>
                                    @elseif ($report->report_status == 'progress')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 dark:bg-yellow-700 text-yellow-800 dark:text-yellow-200">{{ $report->report_status }}</span>
                                    @elseif ($report->report_status == 'completed')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-700 text-green-800 dark:text-green-200">{{ $report->report_status }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('view.report', $report->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-300 dark:hover:text-indigo-500">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('report.edit', $report->id) }}" class="ml-4 text-yellow-600 hover:text-yellow-900 dark:text-yellow-300 dark:hover:text-yellow-500">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('report.delete', $report->id) }}" class="ml-4 text-red-600 hover:text-red-900 dark:text-red-300 dark:hover:text-red-500">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

@endsection


<style>
    /* Add these styles to your CSS file */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animated {
        opacity: 0;
        animation-fill-mode: forwards;
    }

    .fade-in-up {
        animation: fadeInUp 1s ease-out;
    }

    /* Custom styles for 404 page */
    .error-message h2 {
        animation: fadeInUp 0.5s ease-out;
    }

    .error-message p {
        animation: fadeInUp 0.75s ease-out;
    }

    .error-message a {
        animation: fadeInUp 1s ease-out;
    }
</style>

<script>
    // Add this script at the bottom of your Blade template or in a separate JS file
    document.addEventListener('DOMContentLoaded', () => {
        const errorMessage = document.querySelector('.error-message');

        if (errorMessage) {
            errorMessage.classList.add('fade-in-up');
        }
    });
</script>
