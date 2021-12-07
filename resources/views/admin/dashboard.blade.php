@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-name', 'Dashboard')

@section('content')

    <div class="row pt-3">
        <admin-card action="{{ '' }}" name="Quiz" icon="weekend" data="{{ $quizCount }}"></admin-card>
        <admin-card action="{{ '' }}" name="User" icon="person" data="{{ $userCount }}"></admin-card>
        <admin-card action="{{ '' }}" name="Attemp" icon="check" data="{{ $attempCount }}"></admin-card>
        {{-- <admin-card action="{{ '' }}" name="Quiz" icon="weekend" data="{{ $quizCount }}"></admin-card> --}}
    </div>
    <div class="pt-5 mb-4">
        <div class="card z-index-2 mt-5">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 ">User Attemps For Last 7 Days</h6>
            </div>
        </div>
    </div>
    <div id="chartData" data-json="{{ json_encode($timestamps) }}"></div>
@endsection

@section('scripts')
    <script>
        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        var chartData = JSON.parse(document.getElementById('chartData').dataset.json);
        console.log(chartData);

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: Object.keys(chartData).reverse(),
                datasets: [{
                    label: "Attemps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: Object.values(chartData).reverse(),
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endsection
