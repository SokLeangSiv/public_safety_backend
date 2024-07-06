<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        POlICE ADMINISTRATOR
    </title>
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="/richtexteditor/rte.js"></script>
    <script type="text/javascript" src='/richtexteditor/plugins/all_plugins.js'></script>
    <link rel="icon" href="favicon.ico">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/map.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('public/src/images/user/user-01.png') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- sweetalert --}}

    {{-- map --}}

    {{-- geo location --}}
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet'
        href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css'
        type='text/css' />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css"
        type="text/css">

    {{-- geo location --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>


    <link href="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://unpkg.com/@mapbox/mapbox-gl-language"></script>

    {{-- map --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
    <!-- ===== Preloader Start ===== -->
    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
        class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent">
        </div>
    </div>

    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        <!-- ===== Sidebar Start ===== -->
        @include('dashboard.sidebar')

        <!-- ===== Sidebar End ===== -->

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <!-- ===== Header Start ===== -->
            @include('dashboard.header')

            <!-- ===== Header End ===== -->

            <!-- ===== Main Content Start ===== -->
            @yield('content')
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script defer src="{{ asset('bundle.js') }}"></script>
    {{-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"87231e5d1ffb8208","version":"2024.3.0","r":1,"token":"67f7a278e3374824ae6dd92295d38f77","b":1}'
        crossorigin="anonymous"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#fileInput').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = new Image();
                        img.onload = function() {
                            const canvas = document.createElement('canvas');
                            const ctx = canvas.getContext('2d');
                            const maxSize = 150; // Maximum size for width or height
                            let width = img.width;
                            let height = img.height;

                            if (width > height) {
                                if (width > maxSize) {
                                    height *= maxSize / width;
                                    width = maxSize;
                                }
                            } else {
                                if (height > maxSize) {
                                    width *= maxSize / height;
                                    height = maxSize;
                                }
                            }

                            canvas.width = width;
                            canvas.height = height;
                            ctx.drawImage(img, 0, 0, width, height);

                            $('#imagePreview')
                                .attr('src', canvas.toDataURL())
                                .attr('width', '150px')
                                .attr('height', '150px');
                        };
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#imagePreview').attr('src', 'noProfile.png');
                }
            });
        });
    </script>


    {{-- toastr --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SweetAlert2 JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    @if (Session::has('success'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ Session::get('success') }}")
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error("{{ $error }}")
            </script>
        @endforeach
    @endif

    {{-- sweetalert --}}

    <script>

        var editor1 = new RichTextEditor("#div_editor1");
        editor1.setWidth("500px");
        editor1.setHeight("300px");

        var editor2 = new RichTextEditor("#div_editor2");
        editor2.setWidth("500px");
        editor2.setHeight("300px");
        editor2.setReadOnly(true);

        function confirmation(ev) {

            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href'); //get the URL to redirect to

            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "Cancel",
                            value: null,
                            visible: true,
                            className: "",
                            closeModal: true,
                        },
                        confirm: {
                            text: "Delete",
                            value: true,
                            visible: true,
                            className: "bg-red-500 hover:bg-red-600",
                            closeModal: false,
                        },
                    },
                    dangerMode: true,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = urlToRedirect;
                    } else {
                        swal("Your imaginary file is safe!", {
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                    }
                });




        }
    </script>



</body>


</html>
