@extends('home.layouts.app')

@push('after-style')
    <style>
        .article .article-header {
            width: 150px;
            height: 120px;
        }

        .article .article-details {
            width: calc(100% - 150px);
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            justify-content: center;
        }
    </style>

<style>
    #map {
        width: 100%;
        height: 350px;
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
    .circle-icon {
        background-color: #b0d4f1;
        display: inline-flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }

</style>


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content pt-0 mt-0">
        <section class="section pt-0"> 
            <div class="jumbotron text-white rounded text-center" style="background-image: url({{ asset('img/websig.jpg') }})">
                <div class="col-md-12 px-0 text-black-50 text-center">
                    <h1 class="display-4 font-italic text-center" style="color: #000 !important;">Sistem Informasi Geografis Penyebaran Epidemi Muntaber</h1>
                    <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
{{--                    <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>--}}
                </div>
            </div>
            <div class="pt-120 pt-lg-210 pb-5">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-6 offset-lg-3 text-center"><span class="badge bg-light text-dark mb-20" data-show="startbox">Informasi Keseluruhan</span>
                            <h2 class="m-0 mt-2" data-show="startbox" data-show-delay="100">Angka Kasus Muntaber Disamarinda</h2>
                        </div>
                    </div>
                    <div class="row gy-30 justify-content-center bg-info">
                        <div class="col-12 col-md-6 col-lg-3" data-show="startbox" data-show-delay="200">
                            <!-- Service box-->
                            <div class="service-box lift position-relative rounded-4 bg-gray-light text-center p-lg-5" style="background-color: #D3D3D3;">
                                <!-- Circle icon-->
                                <div class="circle-icon bg-danger text-white bg-accent-2 mb-3"><img src="{{ asset('img/chart-up-svgrepo-com.svg')}}"></div>
                                <h4 id="semua_umur" class="service-box-title mb-15"></h4>
                                <h4 class="service-box-title mb-15">Semua Umur</h4>
                                <p class="service-box-text font-size-15 mb-30">Total Balita Yang terjangkit penyakit muntaber</p><a class="service-box-arrow stretched-link mt-30" href="service-single.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" fill="none">
                                        <path stroke="currentColor" stroke-width="1.7" d="M0 7h18m0 0-6.75-6M18 7l-6.75 6"></path>
                                    </svg></a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3" data-show="startbox" data-show-delay="300">
                            <!-- Service box-->
                            <div class="service-box lift position-relative rounded-4 bg-gray-light text-center p-lg-5" style="background-color: #D3D3D3;">
                                <!-- Circle icon-->
                                <div class="circle-icon bg-danger text-white bg-accent-2 mb-3"><img src="{{ asset('img/chart-svgrepo-com.svg')}}"></div>
                                <h4 id="balita" class="service-box-title mb-15"></h4>
                                <h4 class="service-box-title mb-15">Balita</h4>
                                <p class="service-box-text font-size-15 mb-30">Total Balita Yang terjangkit penyakit muntaber</p><a class="service-box-arrow stretched-link mt-30" href="service-single.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" fill="none">
                                        <path stroke="currentColor" stroke-width="1.7" d="M0 7h18m0 0-6.75-6M18 7l-6.75 6"></path>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header pt-4">
                                <h3>Statistik</h3>
                            </div>
                            <div class="card-body p-0">
                                <canvas id="myChart" style="min-height: 250px;"></canvas>
                            </div>
                        </div>
                    </div>

                   {{-- <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header pt-4">
                                <h3>Peta</h3>
                            </div>
                            <div class="card-body p-0">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="card">
                    <div class="card-header pt-4">
                        <h3>Berita Terbaru</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($blogs as $blog)
                                <div class="col-12 col-lg-4">
                                    <div class="article-wrapper">
                                        <article class="article shadow-sm d-flex flex-column">
                                            <div class="article-header p-0 w-100">
                                                <div class="article-image" data-background="{{ asset('img/news/'. $blog->image) }}" style="background-image: url(&quot;{{ asset('img/news/'. $blog->image) }}&quot;);">
                                                </div>
                                            </div>
                                            <div class="article-details w-100">
                                                <div class="article-title">
                                                    <h5 class="my-0">
                                                        <a href="{{ route('home.blog', [$blog->slug]) }}">
                                                            {{ $blog->title }}
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="article-content">
                                                    {!! Str::words(strip_tags($blog['content']), 30) !!}
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('after-script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $.get('/stats/fetch', (data) => {
            //$('h').text(text);
            $('#balita').text(data.toddler);
            $('#semua_umur').text(data.died);
            var statistics_chart = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(statistics_chart, {
                type: 'line',
                data: {
                    labels: data.labels,
                    datasets: [
                        {
                            label: 'Total Kasus',
                            data: data.total,
                            backgroundColor: '#ef476f',
                            tension: 0.1,
                        }
                    ]
                }
            });
        });

    </script>

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
@endpush
