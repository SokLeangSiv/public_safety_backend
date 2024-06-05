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
                            5
                        </div>
                    </div>
                    <div class="mt-5 ml-auto ">
                        <img src="{{ asset('img/right-arrow.png') }}" alt="" width="25px" height="25px">
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
                            5
                        </div>
                    </div>
                    <div class="mt-5 ml-auto ">
                        <img src="{{ asset('img/right-arrow.png') }}" alt="" width="25px" height="25px">
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
                            5
                        </div>
                    </div>
                    <div class="mt-5 ml-auto ">
                        <img src="{{ asset('img/right-arrow.png') }}" alt="" width="25px" height="25px">
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            Crime Request Complete
                        </h4>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <!-- Add the code for the fourth card here -->
            <div
                class="rounded-sm border border-stroke bg-white shadow-lg  px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">

                <div class="grid grid-cols-2 gap-x-5">
                    <div class="flex  h-10 w-10 items-center  rounded-full bg-meta-2 dark:bg-meta-4">
                        <div class="px-3 text-black dark:text-white  font-bold text-2xl">
                            5
                        </div>
                    </div>
                    <div class="mt-5 ml-auto ">
                        <img src="{{ asset('img/right-arrow.png') }}" alt="" width="25px" height="25px">
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            Assigned Crime Request
                        </h4>
                    </div>
                </div>
            </div>
            <!-- Card 5 -->
            <!-- Add the code for the fifth card here -->
            <div
                class="rounded-sm border border-stroke bg-white shadow-lg  px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">

                <div class="grid grid-cols-2 gap-x-5">
                    <div class="flex  h-10 w-10 items-center  rounded-full bg-meta-2 dark:bg-meta-4">
                        <div class="px-3 text-black dark:text-white  font-bold text-2xl">
                            5
                        </div>
                    </div>
                    <div class="mt-5 ml-auto ">
                        <img src="{{ asset('img/right-arrow.png') }}" alt="" width="25px" height="25px">
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            Ongoing Crime Investigation
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <!-- Add the code for the sixth card here -->
            <div
                class="rounded-sm border border-stroke bg-white shadow-lg  px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">

                <div class="grid grid-cols-2 gap-x-5">
                    <div class="flex  h-10 w-10 items-center  rounded-full bg-meta-2 dark:bg-meta-4">
                        <div class="px-3 text-black dark:text-white  font-bold text-2xl">
                            5
                        </div>
                    </div>
                    <div class="mt-5 ml-auto ">
                        <img src="{{ asset('img/right-arrow.png') }}" alt="" width="25px" height="25px">
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            Crime Investigation Complete
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
