@extends('master')

@section('content')
    <div class="mx-10 max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Filter Form -->
        <div
            class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
            <div class="max-w-full overflow-x-auto">
                <form id="filterForm">
                    <label for="status" class="mr-2 text-black dark:text-white">Filter by Status:</label>
                    <select name="status" id="status" class="rounded text-black border border-gray-300 p-2">
                        <option value="all">All</option>
                        <option value="new">New Crime</option>
                        <option value="ongoing">Process Crime</option>
                        <option value="completed">Completed Crime</option>
                    </select>
                    <button type="button" id="filterButton"
                        class="ml-2 rounded-full border border-primary px-4 py-2 text-primary hover:bg-opacity-90">Filter</button>
                </form>

                <form action="{{ route('report.date.fliter') }}" method="GET">
                    <div class="mb-7 mt-7">
                        <label for="startDate" class="me-16 text-black dark:text-white">Start Date:</label>
                        <input type="date" id="startDate" name="start_date"
                            class="rounded text-black border border-gray-300 p-2 mr-4">
                        <label for="endDate" class="text-black dark:text-white">End Date:</label>
                        <input type="date" id="endDate" name="end_date"
                            class="rounded text-black border border-gray-300 p-2">
                        <button type="submit"
                            class="ml-2 rounded-full border border-primary px-4 py-2 text-primary hover:bg-opacity-90">Filter
                            Date</button>
                    </div>
                </form>

                <form action="{{ route('search-reports') }}" method="GET">
                    <label for="search" class="mr-2 text-black dark:text-white">Search:</label>
                    <input type="text" id="search" name="search"
                        class="rounded text-black border border-gray-300 p-2" placeholder="Search by name"
                        value="{{ isset($search) ? $search : '' }}">
                    <button type="submit" id="searchButton"
                        class="ml-2 rounded-full border border-primary px-4 py-2 text-primary hover:bg-opacity-90">Search</button>
                </form>

                <table class="w-full table-auto">
                    <thead>
                        <a href="{{ route('report.form') }}" style="margin-top: 20px;"
                            class="inline-flex items-center justify-center mb-4 gap-2.5 rounded-full border border-primary px-6 py-2 text-center font-medium text-primary hover:bg-opacity-90 lg:px-8 xl:px-10">
                            <span><i class="fa-solid fa-circle-plus"></i></span>
                            Add Report
                        </a>
                        <tr class="bg-gray-2 text-left dark:bg-meta-4">
                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Name</th>
                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">Date Reported</th>
                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">Incident Type</th>
                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">Location</th>
                            <th class="min-w-[150px] px-4 py-4 font-medium text-black dark:text-white">Date of Incident</th>
                            <th class="min-w-[120px] px-4 py-4 font-medium text-black dark:text-white">Status</th>
                            <th class="px-4 py-4 font-medium text-black dark:text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                    <h5 class="font-medium text-black dark:text-white"> {{ $report->report_by }} </h5>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-black dark:text-white">{{ $report->report_date }}</p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-black dark:text-white">{{ $report->incident_type }}</p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-black dark:text-white">{{ $report->province }}</p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    <p class="text-black dark:text-white">{{ $report->date_incident }}</p>
                                </td>
                                <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                    @if ($report->report_status == 'pending')
                                        <p
                                            class="inline-flex rounded-full bg-graydark dark:bg-white dark:bg-opacity-30 bg-opacity-30 dark:text-white px-3 py-1 text-sm font-medium ">
                                            {{ $report->report_status }}
                                        </p>
                                    @elseif ($report->report_status == 'progress')
                                        <p
                                            class="inline-flex rounded-full bg-warning bg-opacity-30 px-3 py-1 text-sm font-medium text-orange-500 dark:text-white">
                                            {{ $report->report_status }}
                                        </p>
                                    @elseif ($report->report_status == 'completed')
                                        <p
                                            class="inline-flex rounded-full bg-danger bg-opacity-30 px-3 py-1 text-sm font-medium text-gray-600 dark:text-white">
                                            {{ $report->report_status }}
                                        </p>
                                    @endif
                                </td>
                                <td class="border-b border-[#eee] py-5 dark:border-strokedark">
                                    <div class="flex items-center space-x-3.5">
                                        <button class="hover:text-primary">
                                            <a href="{{ route('view.report', $report->id) }}">
                                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                                        fill=""></path>
                                                    <path
                                                        d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                                        fill=""></path>
                                                </svg>
                                            </a>
                                        </button>
                                        <button class="hover:text-primary">
                                            <a href="{{ route('report.edit', $report->id) }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </button>
                                        <button class="hover:text-primary">
                                            <a href="{{ route('report.delete', $report->id) }}"
                                                onclick="confirmation(event)">
                                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96564V4.95502C2.72852 5.20252 2.92477 5.39877 3.17227 5.39877H14.8004C15.048 5.39877 15.2443 5.20252 15.2443 4.95502V3.96564C15.2443 3.15002 14.569 2.47502 13.7535 2.47502ZM7.05602 1.9969C7.05602 1.72439 7.27201 1.5084 7.54452 1.5084H10.7101C10.9826 1.5084 11.1986 1.72439 11.1986 1.9969V2.47502H7.05602V1.9969Z"
                                                        fill=""></path>
                                                    <path
                                                        d="M14.3648 6.62183C14.1173 6.62183 13.9211 6.81808 13.9211 7.06558V14.9206C13.9211 15.8678 13.1493 16.6396 12.2021 16.6396H5.77015C4.82296 16.6396 4.05115 15.8678 4.05115 14.9206V7.06558C4.05115 6.81808 3.8549 6.62183 3.6074 6.62183C3.3599 6.62183 3.16365 6.81808 3.16365 7.06558V14.9206C3.16365 16.2051 4.48564 17.1696 5.77015 17.1696H12.2021C13.4866 17.1696 14.4511 15.8476 14.4511 14.9206V7.06558C14.4511 6.81808 14.2548 6.62183 14.0073 6.62183H14.3648Z"
                                                        fill=""></path>
                                                    <path
                                                        d="M6.89856 14.3905C7.14606 14.3905 7.34231 14.1942 7.34231 13.9467V8.0394C7.34231 7.7919 7.14606 7.59564 6.89856 7.59564C6.65106 7.59564 6.45481 7.7919 6.45481 8.0394V13.9467C6.45481 14.1942 6.65106 14.3905 6.89856 14.3905Z"
                                                        fill=""></path>
                                                    <path
                                                        d="M9.93665 14.3905C10.1842 14.3905 10.3804 14.1942 10.3804 13.9467V8.0394C10.3804 7.7919 10.1842 7.59564 9.93665 7.59564C9.68915 7.59564 9.4929 7.7919 9.4929 8.0394V13.9467C9.4929 14.1942 9.68915 14.3905 9.93665 14.3905Z"
                                                        fill=""></path>
                                                </svg>
                                            </a>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $reports->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('filterButton').addEventListener('click', function() {
            var status = document.getElementById('status').value;
            var route;

            switch (status) {
                case 'new':
                    route = '{{ route('new.report') }}';
                    break;
                case 'ongoing':
                    route = '{{ route('ongoing.report') }}';
                    break;
                case 'completed':
                    route = '{{ route('completed.report') }}';
                    break;
                default:
                    route = '{{ route('report') }}';
            }
            window.location.href = route;
        });
    </script>
@endsection
