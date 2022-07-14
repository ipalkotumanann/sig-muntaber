@extends('home.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Statistik Penderita Muntaber</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart" height="182"></canvas>
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
@endpush

