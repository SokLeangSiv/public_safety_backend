<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.tailadmin.com/analytics by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 13:35:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Analytics Dashboard | TailAdmin - Tailwind CSS Admin Dashboard Template
    </title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url('css/Feedback.css') }}">
    <link rel="stylesheet" href="{{ url('css/Profile.css') }}">
    <link rel="icon" href="favicon.ico">
    <link href="style.css" rel="stylesheet">
    <script nonce="6f72f06d-9fdc-4111-b28d-ba7c021664bc">
        try {
            (function(w, d) {
                ! function(b, c, d, e) {
                    b[d] = b[d] || {};
                    b[d].executed = [];
                    b.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    b.zaraz.q = [];
                    b.zaraz._f = function(f) {
                        return async function() {
                            var g = Array.prototype.slice.call(arguments);
                            b.zaraz.q.push({
                                m: f,
                                a: g
                            })
                        }
                    };
                    for (const h of ["track", "set", "debug"]) b.zaraz[h] = b.zaraz._f(h);
                    b.zaraz.init = () => {
                        var i = c.getElementsByTagName(e)[0],
                            j = c.createElement(e),
                            k = c.getElementsByTagName("title")[0];
                        k && (b[d].t = c.getElementsByTagName("title")[0].text);
                        b[d].x = Math.random();
                        b[d].w = b.screen.width;
                        b[d].h = b.screen.height;
                        b[d].j = b.innerHeight;
                        b[d].e = b.innerWidth;
                        b[d].l = b.location.href;
                        b[d].r = c.referrer;
                        b[d].k = b.screen.colorDepth;
                        b[d].n = c.characterSet;
                        b[d].o = (new Date).getTimezoneOffset();
                        if (b.dataLayer)
                            for (const o of Object.entries(Object.entries(dataLayer).reduce(((p, q) => ({
                                    ...p[1],
                                    ...q[1]
                                })), {}))) zaraz.set(o[0], o[1], {
                                scope: "page"
                            });
                        b[d].q = [];
                        for (; b.zaraz.q.length;) {
                            const r = b.zaraz.q.shift();
                            b[d].q.push(r)
                        }
                        j.defer = !0;
                        for (const s of [localStorage, sessionStorage]) Object.keys(s || {}).filter((u => u
                            .startsWith("_zaraz_"))).forEach((t => {
                            try {
                                b[d]["z_" + t.slice(7)] = JSON.parse(s.getItem(t))
                            } catch {
                                b[d]["z_" + t.slice(7)] = s.getItem(t)
                            }
                        }));
                        j.referrerPolicy = "origin";
                        j.src = "cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(b[d])));
                        i.parentNode.insertBefore(j, i)
                    };
                    ["complete", "interactive"].includes(c.readyState) ? zaraz.init() : b.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body x-data="{ page: 'analytics', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
    <!-- ===== Preloader Start ===== -->
    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
        class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent">
        </div>
    </div>

    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        <!-- ===== Sidebar Start ===== -->
        <aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
            class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear lg:static lg:translate-x-0"
            @click.outside="sidebarToggle = false">
            <!-- SIDEBAR HEADER -->
            @include('dashboard.sidebar_header')
            <!-- SIDEBAR HEADER -->

            <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
                <!-- Sidebar Menu -->
                @include('dashboard.sidebar_menu')
                <!-- ===== Sidebar End ===== -->

                <!-- ===== Content Area Start ===== -->
                <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                    <!-- ===== Header Start ===== -->
                    <header class="sticky top-0 z-999 flex w-full bg-white drop-shadow-1">
                        @include('dashboard.header')
                    </header>

                    <!-- ===== Header End ===== -->

                    <!-- ===== Main Content Start ===== -->
                    @yield('dashboard.content')
                    <!-- ===== Main Content End ===== -->
                </div>
                <!-- ===== Content Area End ===== -->
            </div>
            <!-- ===== Page Wrapper End ===== -->
            <script defer src="bundle.js"></script>
            <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
                integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
                data-cf-beacon='{"rayId":"87231e6889af6032","version":"2024.3.0","r":1,"token":"67f7a278e3374824ae6dd92295d38f77","b":1}'
                crossorigin="anonymous"></script>
</body>

<!-- Mirrored from demo.tailadmin.com/analytics by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 13:35:54 GMT -->

</html>
