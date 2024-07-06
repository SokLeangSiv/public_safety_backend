@extends('master')
@section('content')
<div class="mx-10 md:mx-10 lg:mx-24 xl:mx-64 max-w-screen-xl p-4 md:p-6 lg:p-10">
    <div class="container rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <h1 class="title text-black dark:text-white">Incident Report</h1>
        <form action="{{ route('report.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <table id="incident-reports">
                <tbody>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Report By</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input type="text" name="report_by" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" placeholder="Enter your name" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Report Date</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input type="date" name="report_date" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Incident Type</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            {{-- <input type="text" name="incident_type" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" placeholder="Enter incident type" required> --}}
                            <select name="incident_type" id="incident-type" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" required>
                                <option disabled selected>What Crime?</option>
                                <option value="cyber_fraud" {{ old('incident_type') == 'cyber_fraud' ? 'selected' : '' }}>Cyber Fraud</option>
                                <option value="identity_theft" {{ old('incident_type') == 'identity_theft' ? 'selected' : '' }}>Identity Theft</option>
                                <option value="vandalism" {{ old('incident_type') == 'vandalism' ? 'selected' : '' }}>Vandalism</option>
                                <option value="shoplifting" {{ old('incident_type') == 'shoplifting' ? 'selected' : '' }}>Shoplifting</option>
                                <option value="embezzlement" {{ old('incident_type') == 'embezzlement' ? 'selected' : '' }}>Embezzlement</option>
                                <option value="drug_possession" {{ old('incident_type') == 'drug_possession' ? 'selected' : '' }}>Drug Possession</option>
                                <option value="drunk_driving" {{ old('incident_type') == 'drunk_driving' ? 'selected' : '' }}>Drunk Driving</option>
                                <option value="domestic_violence" {{ old('incident_type') == 'domestic_violence' ? 'selected' : '' }}>Domestic Violence</option>
                                <option value="robbery" {{ old('incident_type') == 'robbery' ? 'selected' : '' }}>Robbery</option>
                                <option value="art_theft" {{ old('incident_type') == 'art_theft' ? 'selected' : '' }}>Art Theft</option>
                                <option value="other" {{ old('incident_type') == 'other' ? 'selected' : '' }}>Other (Specify)</option>
                            </select>
                            <div id="other_crime_input" style="display: none;" class="mt-4">
                                <label for="other_crime_description" class="block text-sm font-semibold leading-6 text-black dark:text-white">Describe the Crime:</label>
                                <input type="text" id="other_crime_description" name="other_crime_description" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                            </div>

                            @error('incident_type')
                                <div class="text-red-500 mt-2.5">{{ $message }}</div>
                            @enderror
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Date of Incident</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input type="date" name="date_incident" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Province</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <select name="province" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" required>
                                <option value="" disabled selected>Select a province</option>
                                <option value="Phnom Penh">Phnom Penh</option>
                                <option value="Banteay Meanchey">Banteay Meanchey</option>
                                <option value="Battambang">Battambang</option>
                                <option value="Kampong Cham">Kampong Cham</option>
                                <option value="Kampong Chhnang">Kampong Chhnang</option>
                                <option value="Kampong Speu">Kampong Speu</option>
                                <option value="Kampong Thom">Kampong Thom</option>
                                <option value="Kampot">Kampot</option>
                                <option value="Kandal">Kandal</option>
                                <option value="Kep">Kep</option>
                                <option value="Koh Kong">Koh Kong</option>
                                <option value="Kratie">Kratie</option>
                                <option value="Mondulkiri">Mondulkiri</option>
                                <option value="Oddar Meanchey">Oddar Meanchey</option>
                                <option value="Pailin">Pailin</option>
                                <option value="Preah Sihanouk">Preah Sihanouk</option>
                                <option value="Preah Vihear">Preah Vihear</option>
                                <option value="Pursat">Pursat</option>
                                <option value="Ratanakiri">Ratanakiri</option>
                                <option value="Siem Reap">Siem Reap</option>
                                <option value="Stung Treng">Stung Treng</option>
                                <option value="Svay Rieng">Svay Rieng</option>
                                <option value="Takéo">Takéo</option>
                                <option value="Tboung Khmum">Tboung Khmum</option>
                                <option value="Prey Veng">Prey Veng</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Incident Location</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input type="text" name="incident_location" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" placeholder="Enter incident location" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Incident Description</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <textarea name="incident_description" rows="4" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" placeholder="Describe the incident" required></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Report Status</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <select name="report_status" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" required>
                                <option value="pending">Pending</option>
                                <option value="progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-black dark:text-white border-b border-stroke px-6.5 py-4 dark:border-strokedark">Report Image</th>
                        <td class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                            <input type="file" name="report_image[]" multiple class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                        </td>
                    </tr>
                    <tr>


                                            <input type="hidden" id="latitude" name="lat">
                                            <input type="hidden" id="longitude" name="long">

                                            <div id="map" style="height: 500px;" class="mb-12"></div>
                    </tr>

                </tbody>
            </table>
            <div class="button-container">
                <button type="submit" class="w-2xl cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90" >Submit Report</button>
            </div>
        </form>
    </div>
</div>


<script>
    document.getElementById('incident-type').addEventListener('change', function() {
        var otherCrimeInput = document.getElementById('other_crime_input');
        if (this.value === 'other') {
            otherCrimeInput.style.display = 'block';
        } else {
            otherCrimeInput.style.display = 'none';
        }
    });
</script>



<script>
   mapboxgl.accessToken = 'pk.eyJ1IjoibmVha3NlbiIsImEiOiJjbHh2bjN5aDEybDljMmlweDM1eThwdGlmIn0.ufFA_P5GOQFOpVzlQlsVJw';

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(success, error, {
        enableHighAccuracy: true,
        timeout: 10000,
        maximumAge: 0
    });
} else {
    alert('Geolocation is not supported by your browser.');
}

function success(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    console.log('User\'s current position:', { latitude, longitude });

    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/outdoors-v12',
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
        zoom: 16,
        placeholder: 'Enter an address or place name',
        marker: false
    });

    map.addControl(geocoder, 'top-left');

    const marker = new mapboxgl.Marker({
            draggable: true
        })
        .setLngLat([longitude, latitude])
        .addTo(map);

    // Set initial coordinates in hidden fields
    updateLatLngInputs(latitude, longitude);

    geocoder.on('result', function(e) {
        const coords = e.result.geometry.coordinates;
        marker.setLngLat(coords);
        map.flyTo({
            center: coords,
            zoom: 16,
            pitch: 45,
            bearing: -17.6,
            essential: true
        });
        updateLatLngInputs(coords[1], coords[0]);  // Swap coords to get [lat, lng]
    });

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

    const myLocationButton = new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true,
        showUserHeading: true
    });

    map.addControl(myLocationButton);

    myLocationButton.on('geolocate', (e) => {
        const lngLat = [e.coords.longitude, e.coords.latitude];
        marker.setLngLat(lngLat);
        map.flyTo({
            center: lngLat,
            zoom: 14
        });
        console.log('User location found at latitude:', e.coords.latitude);
        console.log('User location found at longitude:', e.coords.longitude);
        updateLatLngInputs(e.coords.latitude, e.coords.longitude);
    });

    document.getElementById('geolocate-btn').addEventListener('click', function() {
        navigator.geolocation.getCurrentPosition(success, error, {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0
        });
    });

    function setStyle(style) {
        map.setStyle(style);
    }

    function enable3D() {
        map.setStyle('mapbox://styles/mapbox/satellite-v9');

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
    }

    const styleSelector = document.getElementById('map-style');
    styleSelector.addEventListener('change', function() {
        const selectedStyle = this.querySelector(':checked').value;
        if (selectedStyle === '3d') {
            enable3D();
        } else {
            setStyle(selectedStyle);
        }
    });
}

function updateLatLngInputs(lat, lng) {
    console.log('Updating hidden fields with latitude:', lat);
    console.log('Updating hidden fields with longitude:', lng);
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;
}

function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
    alert('Unable to retrieve your location. Please ensure location services are enabled and try again.');
}
</script>

<script>
     // Show other crime input field if "Other" is selected
     document.getElementById('incident-type').addEventListener('change', function () {
        var otherCrimeInput = document.getElementById('other_crime_input');
        if (this.value === 'other') {
            otherCrimeInput.style.display = 'block';
        } else {
            otherCrimeInput.style.display = 'none';
        }
    });

    window.addEventListener('load', function () {
        var incidentType = document.getElementById('incident-type');
        if (incidentType.value === 'other') {
            document.getElementById('other_crime_input').style.display = 'block';
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


