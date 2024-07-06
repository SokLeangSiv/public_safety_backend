@extends('master')
@section('content')
    <div class="mx-10 md:mx-10 lg:mx-24 xl:mx-48 max-w-screen-xl p-4 md:p-6 lg:p-10">
        <div
            class="container rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <h1 class="title text-black dark:text-white">Incident Report</h1>
            <table id="incident-reports">
                <tbody>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            Report By</th>
                        <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            {{ $reports->report_by }}</td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            Report Date</th>
                        <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            {{ $reports->report_date }}</td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            Incident Type</th>
                        <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            {{ $reports->incident_type }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            Date of Incident</th>
                        <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            {{ $reports->date_incident }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            Province</th>
                        <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            {{ $reports->province }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            Incident Location</th>
                        <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            {{ $reports->incident_location }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            Incident Description</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <div class="w-full rounded-lg bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                {!! $reports->incident_description !!}
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            Latitude</th>
                        <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            {{ $reports->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            Longitude</th>
                        <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            {{ $reports->long }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            Report Status</th>
                        <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            {{ $reports->report_status }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            Report Image</th>
                            <td class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                                @if ($reports->report_image)
                                    @php
                                        $images = explode(',', $reports->report_image);
                                    @endphp
                                    <div>
                                        @foreach ($images as $image)
                                            <a href="{{ asset('public/report_image/' . $image) }}" target="_blank" id="fullscreen_image">
                                                <img src="{{ asset('public/report_image/' . $image) }}" alt="Report Image" style="max-width: 200px; max-height: 200px; margin: 5px;">
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </td>


                    </tr>

                    <tr>
                        <div id="map" style="height: 500px;" class="mb-12"></div>
                        <input type="hidden" id="latitude" value="{{ $location->lat }}">
                        <input type="hidden" id="longitude" value="{{ $location->long }}">

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoibmVha3NlbiIsImEiOiJjbHh2bjN5aDEybDljMmlweDM1eThwdGlmIn0.ufFA_P5GOQFOpVzlQlsVJw';

        // Get the latitude and longitude from the hidden fields
        const latitude = parseFloat(document.getElementById('latitude').value);
        const longitude = parseFloat(document.getElementById('longitude').value);

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11', // Use streets style for a more visually appealing map
            center: [longitude, latitude],
            zoom: 14,
            pitch: 45,
            bearing: -17.6
        });

        map.dragRotate.enable();
        map.touchZoomRotate.enableRotation();

        // Add navigation control (zoom in/out, rotate)
        map.addControl(new mapboxgl.NavigationControl());

        // Add fullscreen control
        map.addControl(new mapboxgl.FullscreenControl());

        // Add search functionality
        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            marker: false
        });
        map.addControl(geocoder, 'top-left'); // Add geocoder to the top-left corner

        // Add the marker at the specified coordinates
        const marker = new mapboxgl.Marker()
            .setLngLat([longitude, latitude])
            .addTo(map);

        // Enable 3D buildings
        map.on('style.load', () => {
            map.addSource('mapbox-dem', {
                'type': 'raster-dem',
                'url': 'mapbox://mapbox.terrain-rgb',
                'tileSize': 512,
                'maxzoom': 14
            });
            map.setTerrain({ 'source': 'mapbox-dem', 'exaggeration': 1.5 });

            map.addLayer({
                'id': 'sky',
                'type': 'sky',
                'paint': {
                    'sky-type': 'atmosphere',
                    'sky-atmosphere-sun': [0.0, 0.0],
                    'sky-atmosphere-sun-intensity': 15
                }
            });

            map.addLayer({
                'id': '3d-buildings',
                'source': 'composite',
                'source-layer': 'building',
                'filter': ['==', 'extrude', 'true'],
                'type': 'fill-extrusion',
                'minzoom': 15,
                'paint': {
                    'fill-extrusion-color': '#aaa',
                    'fill-extrusion-height': [
                        'interpolate',
                        ['linear'],
                        ['zoom'],
                        15,
                        0,
                        15.05,
                        ['get', 'height']
                    ],
                    'fill-extrusion-base': [
                        'interpolate',
                        ['linear'],
                        ['zoom'],
                        15,
                        0,
                        15.05,
                        ['get', 'min_height']
                    ],
                    'fill-extrusion-opacity': 0.6
                }
            });
        });
    </script>
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

    .text-black {
        color: #333;
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

    body.dark-mode .text-black {
        color: #e0e0e0;
    }
</style>
