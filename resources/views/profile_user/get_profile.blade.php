@extends('master')
@section('content')
    <div class="flex justify-center">
        <div class="w-1/2 mt-12">

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Input Fields
                        </h3>

                        <img id="imagePreview" class="object-cover rounded-full border-4 border-gray-300 mx-auto my-10" src="{{ $profileImage ? url('images/' . $profileImage) : url('noProfile.png') }}" width="150px" height="150px" alt="Extra large avatar">

                    </div>
                    <div class="flex flex-col gap-5.5 p-6.5">
                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Name
                            </label>
                            <input type="text" placeholder="Name" name="name" value="{{ Auth::user()->name }}"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                        </div>



                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Email
                            </label>
                            <input type="email" placeholder="Disabled label" disabled="" value="{{ Auth::user()->email }}"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary dark:disabled:bg-black">
                        </div>

                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Password
                            </label>
                            <input type="password" placeholder="Active Input" name="password"
                                class="w-full rounded-lg border-[1.5px] border-primary bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-form-input dark:text-white">
                        </div>

                        {{-- confrimation passwrod --}}

                        <div>
                            <label
                                class="mb-3 block
                            text-sm font-medium text-black dark:text-white">
                                Confirm Password
                            </label>
                            <input type="password" placeholder="Active Input" name="password_confirmation"
                                class="w-full rounded-lg border-[1.5px] border-primary bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:bg-form-input dark:text-white">


                        </div>
                        <div>
                            <label
                                class="mb-3 block
                                text-sm font-medium text-black dark:text-white">
                                Confirm Password
                            </label>
                            <input type="file" name="image" id="fileInput"
                                class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary">



                            </div>




                        {{-- button --}}

                        <div class="flex justify-center">
                            <button
                                class="w-1/2 py-3 mt-6 text-white bg-primary rounded-lg font-medium hover:bg-opacity-90 focus:outline-none">
                                Update
                            </button>

                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
