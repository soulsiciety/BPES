<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/vendor/bootstrap-icons/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        p {
            margin-bottom: 2px;
        }

        .ps {
            width: 100%;
            min-height: 100vh;
            position: relative;
            padding: 50px 0 30px 0;
            display: flex;
            align-items: center;
            /* background: url(/assets/img/bg-ps.png) top center no-repeat;
            background-size: cover; */

        }

        .ps-img {
            max-width: 200px;
        }

        .div-circle {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .circle {
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 250px;
            width: 250px;
        }

        .img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 50%;
        }

        .circle-background {
            background-color: #0d6efd;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            align-items: center;
            justify-content: center;
            margin-left: 1px;
        }

        .flex {
            display: flex;
        }

        .progress-container {
            width: 100%;
        }

        .svg {
            width: 100%;
            height: 24px;
        }

        .progress-bar-bg {
            fill: none;
            stroke: #0d6efd;
            stroke-width: 2;
            rx: 10;
            /* Rounded corners */
            ry: 10;
        }

        .progress-bar {
            fill: #0d6efd;
            height: 16px;
            rx: 8;
            /* Rounded corners */
            ry: 8;
        }

        .svg-background {
            /* width: 100%;
            height: 100%; */
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
</head>

<body>
    @foreach ($kualifikasi_pi as $key => $item)
        <section class="ps">
            <svg class="svg-background" viewBox="0 0 800 600" preserveAspectRatio="none">
                <circle cx="50" cy="230" r="230" fill="#D2A07B" />
            </svg>

            <div class="p-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="div-circle">
                            <div class="circle">
                                <img src="{{ url('') }}/assets/img/testimonials/testimonials-1.jpg"
                                    class="mx-auto d-block img">

                            </div>
                        </div>
                        <div class="m-3 text-center">
                            <h2>{{ $item['pi'] }}</h2>
                            <h2>Rp. {{ $item['penghasilan'] }}</h2>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div>
                            <h2>Description</h2>
                            <p>{{ $item['ds'] }}</p>
                            <h2>Persona Problems</h2>
                            <ul>
                                @foreach ($item['pr'] as $items)
                                    <li>
                                        <p>{{ $items->jawaban }}</p>
                                    </li>
                                @endforeach
                            </ul>

                            <h2>Persona Needs</h2>
                            <ul>
                                @foreach ($item['ne'] as $items)
                                    <li>
                                        <p>{{ $items->jawaban }}</p>
                                    </li>
                                @endforeach
                            </ul>
                            <h2>Story</h2>
                            <p>{{ $item['st'] }}</p>
                            <ul>
                                @foreach ($item['sy'] as $items)
                                    <li>
                                        <p>{{ $items->jawaban }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <div>
                                <h2>Product Preferences</h2>
                                <div class="row">
                                    @foreach ($item['bl'] as $items)
                                        <div class="col-md-3">
                                            <p style="margin-bottom: 2px">Soal {{ $items['id'] }}
                                                <i class="bi bi-info-circle" data-toggle="tooltip" data-placement="top"
                                                    title="{{ $items['pertanyaan'] }}"></i>
                                            </p>
                                            <div class="flex">

                                                @if ($items['nilai'] <= 1.7)
                                                    <svg width="100" height="20">
                                                        <circle cx="10" cy="10" r="10" fill="#0d6efd" />
                                                    </svg>
                                                @elseif($items['nilai'] <= 2.5)
                                                    <svg width="100" height="20">
                                                        <circle cx="10" cy="10" r="10" fill="#0d6efd" />
                                                        <circle cx="{{ 20 * 1 + 10 + 1 }}" cy="10" r="10"
                                                            fill="#0d6efd" />

                                                    </svg>
                                                @elseif($items['nilai'] <= 3)
                                                    <svg width="100" height="20">
                                                        <circle cx="10" cy="10" r="10" fill="#0d6efd" />
                                                        <circle cx="{{ 20 * 1 + 10 + 1 }}" cy="10" r="10"
                                                            fill="#0d6efd" />
                                                        <circle cx="{{ 20 * 2 + 10 + 2 }}" cy="10" r="10"
                                                            fill="#0d6efd" />
                                                    </svg>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <div class="chart-container">
                                    <canvas id="myChart"></canvas>
                                </div> --}}
                                <br>
                                <div class="row">
                                    <div class="col">
                                        @foreach ($item['pm'] as $item)
                                            <div>
                                                <p style="margin-bottom: 2px">{{ $item['jawaban'] }}</p>
                                                {{-- <div class="progress">
                                                    <div class="progress-bar progress-bar-striped" role="progressbar"
                                                        style="width: {{ ($item['nilai'] / $item['tl']) * 100 }}%"
                                                        aria-valuenow="{{ $item['nilai'] }}" aria-valuemin="0"
                                                        aria-valuemax="{{ $item['tl'] }}">
                                                    </div>
                                                </div> --}}
                                                <div class="progress-container">
                                                    <svg class="svg">
                                                        <rect class="progress-bar-bg" x="2" y="2" width="99%"
                                                            height="16" />
                                                        <rect class="progress-bar" x="2" y="2"
                                                            width="{{ ($item['nilai'] / $item['tl']) * 99 }}%"
                                                            height="16" id="myProgressBar" />
                                                    </svg>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    {{-- <script src="{{ url('') }}/main/assets/js/plugin/chart.js/chart.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const data = {
            labels: ['Red', 'Orange', 'Yellow', 'Green'],
            datasets: [{
                label: 'Dataset 1',
                data: [20, 20, 20, 20],
                backgroundColor: [
                    "#f38b4a",
                    "#56d798",
                    "#ff8397",
                    "#6970d5"
                ],
            }]
        };
        new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                    }
                },
            },
        });
    </script> --}}
    <div class="p-2">
        <button class="w-100 btn btn-primary" onclick="window.print()"> Print</button>
    </div>

</body>

</html>
