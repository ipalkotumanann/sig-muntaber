@extends('home.layouts.app')

@push('after-style')
    <style>
        #map {
            width: 100%;
            height: 500px;
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            text-align: left;
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }

    </style>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Persebaran Wilayah Penderita Muntaber</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <form action="#" class="ml-auto d-flex" style="max-width: 300px">

                            <select name="year" class="form-control rounded-sm" id="year-filter">
                                @for ($y=date('Y'); $y>2016; $y--)
                                    <option
                                        {{ Request::get('year') == $y ? 'selected' : '' }}
                                        value="{{ $y }}">
                                        Tahun {{ $y }}
                                    </option>
                                @endfor
                            </select>

                            <select name="district" class="form-control mr-2 rounded-sm" id="district-filter">
                                <option value="null">Pilih Semua</option>
                                @foreach ($districts as $district)
                                    <option {{ request()->get('district') == $district->id ? 'selected' : '' }} value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>

                        </form>
                    </div>

                    <div class="card-body p-0">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('after-script')
    <script>
        const yearUrl = {{ Request::get('year') ?? date('Y') }},
            districtUrl = {{ Request::get('district') ?? 'null' }};

        function getIcon(total) {
            iconSize = total > 35
                ? total
                : 35

            var icon_size = [iconSize, iconSize];   //for dynamic icon size,
            var image_url = '/img/blood-icon.png';        //for dynamic images

            var icon = L.icon({
                iconUrl: image_url,

                iconSize:    icon_size ,
                iconAnchor:   [(iconSize / 2), iconSize],
                popupAnchor:  [0, -35] // point from which the popup should open relative to the iconAnchor
            });

            return icon;
        }

        let customIcon = L.icon({
            iconUrl: '/img/blood-icon.png',
            // shadowUrl: '/images/b',

            iconSize:     [35, 35], // size of the icon
            // shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });


        $.get(`/map/fetch?year=${yearUrl}&district=${districtUrl}`, (data, status) => {

            const map = L.map('map').setView([-0.502106, 117.153709], 12),
                districts = data.districts,
                clinics = data.clinics

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // control that shows state info on hover
            var info = L.control();
            var legend = L.control({position: 'bottomleft'});
            legend.onAdd = function (map) {

                var div = L.DomUtil.create('div', 'info legend');
                labels = ['<strong>Legend</strong>'],
                    categories = ['> 75% ','>= 50%','< 50%'];

                for (var i = 0; i < categories.length; i++) {

                    div.innerHTML +=
                        labels.push(
                            '<i class="fa fa-square" style="color: '+ getColorLegend(i)+ '"></i> ' +
                            (categories[i] ? categories[i] : '+'));

                }
                div.innerHTML = labels.join('<br>');
                return div;
            };
            legend.addTo(map);

            $.each(clinics, function(index, value) {
                marker = new L.marker([value.lat, value.lng])
                    .bindPopup(`<b>PUSKESMAS ${value.name}</b><br>${value.address}<br><strong>Penduduk : ${value.jumlah_penduduk} Orang</strong><hr><strong>Total Kasus Terinfeksi : ${value.cases[0].total_infected} Orang</strong><br><strong>Total Kasus Balita : ${value.cases[0].toddler} Orang</strong><br><strong>Total Kasus Semua Umur : ${value.cases[0].all_ages} Orang</strong><hr><strong>Total CFR : ${value.cfr_total}%</strong>`)
                    .addTo(map);
            });

            info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };

            info.update = function (props) {
                this._div.innerHTML = '<h4>Wilayah Pengidap Muntaber</h4>' +  (props ?
                    '<b>' + props.name + '</b><br/> Jumlah Penduduk <strong>' + props.jumlah_penduduk + '</strong> orang' +
                    '</b><br /> Total Terinfeksi <strong>' + props.cfr_total + ' %</strong>'
                    : 'Arahkan kursor ke kecamatan');
            };

            info.addTo(map);

            // get color depending on population density value
            function getColor(cfr) {
                return cfr >= 75 ? '#ef233c' :
                    cfr >= 50  ? '#eeaf26' :
                        cfr < 50  ? '#31ea15' :
                                    '#FFEDA0';
            }

            function getColorLegend(d) {
                return d === 0  ? "#ef233c" :
                    d === 1 ? "#eeaf26" :
                                "#31ea15";
            }


            function style(feature) {
                // console.info(feature.properties.name);
                return {
                    weight: 2,
                    opacity: 1,
                    color: 'black',
                    dashArray: '3',
                    // fillOpacity: 0,
                    fillColor: getColor(feature.properties.cfr_total)
                };
            }

            function highlightFeature(e) {
                var layer = e.target;
                layer.setStyle({
                    weight: 5,
                    color: '#666',
                    dashArray: '',
                    fillOpacity: 0.7
                });

                if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                    layer.bringToFront();
                }

                info.update(layer.feature.properties);
            }

            var geojson;

            function resetHighlight(e) {
                geojson.resetStyle(e.target);
                info.update();
            }

            function zoomToFeature(e) {
                map.fitBounds(e.target.getBounds());
            }

            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    click: zoomToFeature
                });
            }

            geojson = L.geoJson(districts, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);
            map.fitBounds(geojson.getBounds());

            // const legend = L.control({position: 'bottomright'});

            // legend.onAdd = function (map) {

            //     var div = L.DomUtil.create('div', 'info legend'),
            //         grades = [ 'Rendah', 'Sedang', 'Tinggi'],
            //         labels = []

            //     for (var i = grades.length; i > 0; i--) {
            //         labels.push(
            //             '<i style="background:' + getColor(i) + '"></i> ' + grades[i-1]
            //         );
            //     }

            //     div.innerHTML = labels.join('<br>');
            //     return div;
            // };

            // legend.addTo(map);
        });
    </script>

    <script>
        const year = document.getElementById('year-filter'),
            district = document.getElementById('district-filter');

        let currentYear = {{ request()->get('year') ?? date('Y') }},
            currentDistrict = {{ request()->get('district') ?? 'null' }};

        year.onchange = () => {
            currentYear = year.value
            filter();
        }

        district.onchange = () => {
            currentDistrict = district.value;
            filter();
        }

        function filter() {
            window.location.href = `/map?year=${currentYear}&district=${currentDistrict}`
        }
    </script>
@endpush
