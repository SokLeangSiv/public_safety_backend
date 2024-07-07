@extends('master')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
            <!-- Card 1 -->
            <div
                class="rounded-sm border border-stroke bg-white shadow-lg  px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">

                <div class="grid grid-cols-2 gap-x-5">
                    <div class="flex  h-10 w-10 items-center  rounded-full bg-meta-2 dark:bg-meta-4">
                        <div class="px-3 text-black dark:text-white  font-bold text-2xl">
                            {{$newCrimeReports}}
                        </div>
                    </div>
                    <div class="mt-5 ml-auto">
                        <a href="{{route('new.report')}}" class="btn-arrow">
                            <img src="{{ asset('img/right-arrow.png') }}" alt="View" width="25px" height="25px">
                        </a>
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            New Crime Report
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <!-- Add the code for the second card here -->
            <div
                class="rounded-sm border border-stroke bg-white shadow-lg  px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">

                <div class="grid grid-cols-2 gap-x-5">
                    <div class="flex  h-10 w-10 items-center  rounded-full bg-meta-2 dark:bg-meta-4">
                        <div class="px-3 text-black dark:text-white  font-bold text-2xl">
                            {{ $totalReports }}
                        </div>
                    </div>
                    <div class="mt-5 ml-auto">
                        <a href="{{route('report')}}" class="btn-arrow">
                            <img src="{{ asset('img/right-arrow.png') }}" alt="View" width="25px" height="25px">
                        </a>
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            Total Crime Reporting
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <!-- Add the code for the third card here -->
            <div
                class="rounded-sm border border-stroke bg-white shadow-lg  px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">

                <div class="grid grid-cols-2 gap-x-5">
                    <div class="flex  h-10 w-10 items-center  rounded-full bg-meta-2 dark:bg-meta-4">
                        <div class="px-3 text-black dark:text-white  font-bold text-2xl">
                            {{ $completeCrimeReports }}
                        </div>
                    </div>
                    <div class="mt-5 ml-auto">
                        <a href="{{route('completed.report')}}" class="btn-arrow">
                            <img src="{{ asset('img/right-arrow.png') }}" alt="View" width="25px" height="25px">
                        </a>
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            Crime Complete
                        </h4>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <!-- Add the code for the fourth card here -->
            <!-- Card 5 -->
            <!-- Add the code for the fifth card here -->
            <div
                class="rounded-sm border border-stroke bg-white shadow-lg  px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">

                <div class="grid grid-cols-2 gap-x-5">
                    <div class="flex h-10 w-10 items-center rounded-full bg-meta-2 dark:bg-meta-4">
                        <div class="px-3 text-black dark:text-white font-bold text-2xl">
                            {{$ongoingCrimeReports}}
                        </div>
                    </div>
                    <div class="mt-5 ml-auto">
                        <a href="{{route('ongoing.report')}}" class="btn-arrow">
                            <img src="{{ asset('img/right-arrow.png') }}" alt="View" width="25px" height="25px">
                        </a>
                    </div>
                </div>


                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            Ongoing Crime
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <!-- Add the code for the sixth card here -->

        </div>

        <div class="container mx-auto flex flex-col justify-center items-center min-h-screen px-4">
            {{-- <form method="GET" action="{{ route('dashboard.search') }}">
                <div class="flex items-center space-x-4 mb-4">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" class="px-2 py-1 border rounded">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" class="px-2 py-1 border rounded">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Apply Filter</button>
                </div>
            </form> --}}

            <div class="w-full max-w-4xl mb-8">
                <canvas id="reportChart"></canvas>
            </div>
        </div>




    </div>






    {{-- chart for incident_type --}}
    <script>
        var incidentTypes = {!! json_encode($reports->pluck('incident_type')) !!};
        var incidentCounts = {!! json_encode($reports->pluck('count')) !!};

        if (incidentTypes.length > 0 && incidentCounts.length > 0) {
            var ctx = document.getElementById('reportChart').getContext('2d');
            var reportChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: incidentTypes,
                    datasets: [{
                        label: '# of Incidents',
                        data: incidentCounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>




@endsection
<style>
    .btn-arrow {
        background-color: transparent;
        border: none;
        cursor: pointer;
        padding: 0;
    }

    .btn-arrow img {
        display: block;
    }
</style>
