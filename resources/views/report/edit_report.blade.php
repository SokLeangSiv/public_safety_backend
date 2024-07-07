@extends('master')
@section('content')
<div class="mx-10 md:mx-10 lg:mx-24 xl:mx-48 max-w-screen-xl p-4 md:p-6 lg:p-10">
    <div class="container rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <h1 class="title text-black dark:text-white">Update Incident Report</h1>
        <form action="{{ route('report.update', ['id' => $reports->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <table id="incident-reports">
                <tbody>

                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Report By</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" type="text" name="report_by" value="{{ $reports->report_by }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Report Date</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" type="date" name="report_date" value="{{ $reports->report_date }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Incident Type</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" type="text" name="incident_type" value="{{ $reports->incident_type }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Date of Incident</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" type="date" name="date_incident" value="{{ $reports->date_incident }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Province</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <select name="province" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                @foreach(['Banteay Meanchey', 'Battambang', 'Kampong Cham', 'Kampong Chhnang', 'Kampong Speu', 'Kampong Thum', 'Kampot', 'Kandal', 'Kep', 'Koh Kong', 'Kratie', 'Mondulkiri', 'Oddar Meanchey', 'Pailin', 'Phnom Penh', 'Preah Sihanouk', 'Preah Vihear', 'Prey Veng', 'Pursat', 'Ratanakiri', 'Siem Reap', 'Stung Treng', 'Svay Rieng', 'Takeo', 'Tboung Khmum'] as $province)
                                    <option value="{{ $province }}" {{ $reports->province == $province ? 'selected' : '' }}>{{ $province }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Incident Location</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" type="text" name="incident_location" value="{{ $reports->incident_location }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Incident Description</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <textarea id="div_editor1" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" name="incident_description" rows="4">{{ $reports->incident_description }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Latitude</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" type="text" name="lat" value="{{ $reports->lat }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Longitude</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" type="text" name="long" value="{{ $reports->long }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Report Status</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <select class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" name="report_status" class="text-black ">
                                <option value="pending" {{ $reports->report_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="progress" {{ $reports->report_status == 'progress' ? 'selected' : '' }}>progress</option>
                                <option value="completed" {{ $reports->report_status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Report Image</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
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
                            <input class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" type="file" name="report_image[]" multiple id="report_image" class="rounded text-black border border-gray-300 p-2">
                        </td>
                    </tr>

                    <tr>
                        <div id="map" style="height: 500px;" class="mb-12"></div>
                        <input type="hidden" name="lat" id="latitude" value="{{ $location->lat }}">
                        <input type="hidden" name="long" id="longitude" value="{{ $location->long }}">

                    </tr>
                </tbody>
            </table>
            <div class="button-container">
                <button type="submit" class="w-2xl cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90" >Update Report</button>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        mapboxgl.accessToken = 'pk.eyJ1IjoibmVha3NlbiIsImEiOiJjbHh2bjN5aDEybDljMmlweDM1eThwdGlmIn0.ufFA_P5GOQFOpVzlQlsVJw';

        const latitude = parseFloat(document.getElementById('latitude').value);
        const longitude = parseFloat(document.getElementById('longitude').value);

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [longitude, latitude],
            zoom: 14,
            pitch: 45,
            bearing: -17.6
        });

        map.dragRotate.enable();
        map.touchZoomRotate.enableRotation();
        map.addControl(new mapboxgl.NavigationControl());
        map.addControl(new mapboxgl.FullscreenControl());

        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            marker: false
        });
        map.addControl(geocoder, 'top-left');

        const marker = new mapboxgl.Marker({
            draggable: true
        })
        .setLngLat([longitude, latitude])
        .addTo(map);

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

        function updateLatLngInputs(lat, lng) {
            console.log('Updating hidden fields with latitude:', lat);
            console.log('Updating hidden fields with longitude:', lng);
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
            console.log('Hidden field latitude value:', document.getElementById('latitude').value);
            console.log('Hidden field longitude value:', document.getElementById('longitude').value);
        }

        marker.on('dragend', () => {
            const lngLat = marker.getLngLat();
            console.log('Marker dragged to latitude:', lngLat.lat);
            console.log('Marker dragged to longitude:', lngLat.lng);
            updateLatLngInputs(lngLat.lat, lngLat.lng);
        });

        map.on('click', (e) => {
            const lngLat = e.lngLat;
            marker.setLngLat(lngLat);
            console.log('Map clicked at latitude:', lngLat.lat);
            console.log('Map clicked at longitude:', lngLat.lng);
            updateLatLngInputs(lngLat.lat, lngLat.lng);
        });

        map.on('load', () => {
            const lngLat = marker.getLngLat();
            console.log('Initial latitude:', lngLat.lat);
            console.log('Initial longitude:', lngLat.lng);
        });

        function error(err) {
            console.warn(`ERROR(${err.code}): ${err.message}`);
            alert('Unable to retrieve your location. Please ensure location services are enabled and try again.');
        }
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

    input[type="text"],
    input[type="date"],
    input[type="file"],
    textarea,
    select {
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
    body.dark-mode textarea,
    body.dark-mode select {
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
