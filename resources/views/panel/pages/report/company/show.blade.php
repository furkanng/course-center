@extends('panel.layout.app')

@section('navigation-bar')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="javascript:;">Raporlar</a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kurum Raporları</li>
@endsection
@section('navigation-name')
    <h6 class="font-weight-bolder mb-0">Kurum Rapor Detay</h6>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <button class="btn bg-gradient-info mb-0" onClick="window.print()" type="button" name="button">Yazdır</button>
    </div>
    <div class="printer">
        <h4 class="font-weight-bolder mb-2 text-center flex-grow-1 rapor-title">Kurum Rapor Detay</h4>
        <div class="row">
            <div class="col-xl-7 grafik">
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>Aylık Grafik</h6>
                        <p class="text-sm">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">Aylık Ziyaret ve Talepler</span>
                        </p>
                    </div>
                    <div class="card-body p-3" style="height: 372px">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 ms-auto mt-xl-0 mt-4 move-to-top">
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-gradient-primary">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8 my-auto">
                                        <div class="numbers">
                                            <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">
                                                {{$company->getCompanyTypeName()}}</p>
                                            <h5 class="text-white font-weight-bolder mb-0">
                                                {{strtoupper($company->name)}}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <h5 class="mb-0 text-white text-end me-1">{{ \Carbon\Carbon::now()->format('d-m-Y') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1 class="text-gradient text-primary">
                                    <span id="status1"
                                          countto="{{$company->total_visits}}"
                                          data-print-value="{{$company->total_visits}}">
                                    {{$company->total_visits}}</span>
                                    <span
                                        class="text-lg ms-n2">Defa</span></h1>
                                <h6 class="mb-0 font-weight-bolder">Toplam Ziyaret</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1 class="text-gradient text-primary">
                                    <span id="status2" countto="{{$company->unique_visits}}"
                                          data-print-value="{{$company->unique_visits}}">
                                    {{$company->unique_visits}}</span>
                                    <span
                                        class="text-lg ms-n1">Kişi</span></h1>
                                <h6 class="mb-0 font-weight-bolder">Tekil Ziyaret</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1 class="text-gradient text-primary"><span
                                        id="status3" countto="{{$company->contact->count()}}"
                                        data-print-value="{{$company->contact->count()}}">
                                        {{$company->contact->count()}}</span>
                                    <span
                                        class="text-lg ms-n2">Öğrenci</span></h1>
                                <h6 class="mb-0 font-weight-bolder">Toplam Talep</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1 class="text-gradient text-primary">
                                    <span id="status4" countto="{{$company->contact->where("review",1)->count()}}"
                                          data-print-value="{{$company->contact->where("review",1)->count()}}">
                                        {{$company->contact->where("review",1)->count()}}</span>
                                    <span
                                        class="text-lg ms-n2">Öğrenci</span></h1>
                                <h6 class="mb-0 font-weight-bolder">Toplam Kayıt</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6 ms-auto">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">Taleplerin Şehir Dağılımı</h6>
                        </div>
                    </div>
                    <div class="card-body p-3" style="height: 218px">
                        <div class="row">
                            <div class="col-5 text-center">
                                <div class="chart">
                                    <canvas id="chart-consumption" class="chart-canvas" height="197"></canvas>
                                </div>
                                <h4 class="font-weight-bold mt-n8 toplam-sehir">
                                    <span>{{$company->contact->count()}}</span>
                                    <span class="d-block text-body text-sm">TOPLAM</span>
                                </h4>
                            </div>
                            <div class="col-7">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <tbody>
                                        @foreach ($topCities as $city)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-0">
                                                        <span class="badge bg-gradient-primary me-3"></span>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $city->customer_city }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-xs font-weight-bold">{{ $city->total_requests }} Talep</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-lg-0 mt-4">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card h-100">
                            <div class="card-body p-3">
                                <h6>Hangiderslig Ziyaret Grafiği</h6>
                                <div class="chart pt-3">
                                    <canvas id="chart-monthly-visits" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-sm-0 mt-4">
                        <div class="card h-100">
                            <div class="card-body text-center p-3">
                                <h6 class="text-start">Bilgi Doluluk Seviyesi</h6>
                                <round-slider
                                    value="{{ \App\Service\Helper::calculateCompletionRate($company->id) }}"
                                    valueLabel="seviye"
                                    min="0"
                                    max="100">
                                </round-slider>
                                <h4 class="font-weight-bold mt-n7">
                                <span class="text-dark" id="value">
                                    {{\App\Service\Helper::calculateCompletionRate($company->id)}}
                                </span><span
                                        class="text-body">%</span></h4>
                                <p class="ps-1 mt-5 mb-0"><span class="text-xs">0%</span><span
                                        class="px-3">Yüzdelik</span><span class="text-xs">100%</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0 p-3 mb-2">
                        <div class="d-flex justify-content-center align-items-center">
                            <h6 class="mb-0">Son 30 Günde Alınan Taleplerin Özeti</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    İsim Soyisim
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    E Mail
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Kayıt Yaptırdı
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Şehir
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    İlçe
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Telefon
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($monthContactUser as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$user->customer_name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm text-secondary mb-0">{{$user->customer_email}}</p>
                                    </td>
                                    <td>
                                  <span class="badge badge-dot me-4">
                                    <i class="{{$user->review == 1 ? "bg-success" : "bg-danger"}}"></i>
                                    <span class="text-dark text-xs">{{$user->review == 1 ? "Evet" : "Hayır"}}</span>
                                  </span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-secondary mb-0 text-sm">{{$user->customer_city}}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm">{{$user->customer_district}}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm">{{$user->customer_phone}}</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media print {

            .printer {
                display: flex;
                flex-direction: column;
            }

            .grafik {
                margin-top: 155px;
            }

            /* Move the specified div to the top */
            .move-to-top {
                order: -1;
            }

            body * {
                visibility: hidden;
            }

            .btn-print {
                display: none;
            }

            /* Yeni eklenecek stiller */
            @page {
                size: auto;
                margin: 0mm;  /* sayfada kenar boşluğu olmasın */
            }

            /* Header ve footer'ı gizle */
            @page :first {
                margin-top: 0;
            }

            @page :left {
                margin-left: 0;
            }

            @page :right {
                margin-right: 0;
            }

            .card {
                visibility: visible;
            }

            .rapor-title {
                visibility: visible;
            }

            .card * {
                visibility: visible;
            }

            /* Kart header'ındaki boşlukları düzelt */
            .card-header {
                padding-top: 10px !important;
            }

            .toplam-sehir {
                margin-right: 60px;
            }

            .chart {
                margin-top: 0 !important;
                padding-top: 0 !important;
            }

            /* Yazdırma sırasında butonları gizle */
            .btn-print {
                display: none;
            }

            .text-gradient.text-primary {
                background: none !important;
                color: #000 !important;
                -webkit-text-fill-color: #000 !important;
            }

            /* Counter değerlerinin doğrudan görünmesi için */
            [id^="status"] {
                visibility: visible !important;
                color: #000 !important;
            }

            /* Yeni eklenecek stiller */
            @page {
                size: auto;
                margin: 0mm;  /* sayfada kenar boşluğu olmasın */
            }

            /* Header ve footer'ı gizle */
            @page :first {
                margin-top: 0;
            }

            @page :left {
                margin-left: 0;
            }

            @page :right {
                margin-right: 0;
            }

            /* Chrome/Safari/Opera için header/footer gizleme */
            html {
                -webkit-print-color-adjust: exact;
            }

            /* Header ve footer bilgilerini gizle */
            head, header, footer {
                display: none !important;
            }
        }

    </style>
@endsection

@push('scripts')
    <script src="{{asset("panel/assets/js/plugins/round-slider.min.js")}}"></script>
    <script src="{{asset("panel/assets/js/plugins/countup.min.js")}}"></script>
    <script>
        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var visitData = @json($visitData);
        var requestData = @json($requestData);

        var labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Ziyaretler",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 3,
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: visitData,
                        maxBarThickness: 6
                    },
                    {
                        label: "Talepler",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 3,
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: requestData,
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
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
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
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
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var ctx1 = document.getElementById("chart-consumption").getContext("2d");

        // Dinamik veriler Blade'den alınıyor
        var cityLabels = @json($cityLabels); // Şehir isimleri
        var cityData = @json($cityData); // Talep sayıları

        new Chart(ctx1, {
            type: "doughnut",
            data: {
                labels: cityLabels, // Dinamik şehir isimleri
                datasets: [{
                    label: "Consumption",
                    weight: 9,
                    cutout: 90,
                    tension: 0.9,
                    pointRadius: 2,
                    borderWidth: 2,
                    backgroundColor: ['#FF0080', '#A8B8D8', '#21d4fd', '#98ec2d', '#ff667c'], // Renkler
                    data: cityData, // Dinamik talep sayıları
                    fill: false
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
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false,
                        }
                    },
                },
            },
        });
    </script>
    <script>
        // Rounded slider
        const setValue = function (value, active) {
            document.querySelectorAll("round-slider").forEach(function (el) {
                if (el.value === undefined) return;
                el.value = value;
            });
            const span = document.querySelector("#value");
            span.innerHTML = value;
            if (active)
                span.style.color = 'red';
            else
                span.style.color = 'black';
        }

        document.querySelectorAll("round-slider").forEach(function (el) {
            el.addEventListener('value-changed', function (ev) {
                if (ev.detail.value !== undefined)
                    setValue(ev.detail.value, false);
                else if (ev.detail.low !== undefined)
                    setLow(ev.detail.low, false);
                else if (ev.detail.high !== undefined)
                    setHigh(ev.detail.high, false);
            });

            el.addEventListener('value-changing', function (ev) {
                if (ev.detail.value !== undefined)
                    setValue(ev.detail.value, true);
                else if (ev.detail.low !== undefined)
                    setLow(ev.detail.low, true);
                else if (ev.detail.high !== undefined)
                    setHigh(ev.detail.high, true);
            });
        });

        function initializeCounters() {
            ['status1', 'status2', 'status3', 'status4'].forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    // Print modunda direkt değeri göster
                    if (window.matchMedia('print').matches) {
                        element.textContent = element.getAttribute('countTo');
                    } else {
                        const countUp = new CountUp(id, element.getAttribute('countTo'));
                        if (!countUp.error) {
                            countUp.start();
                        } else {
                            // Hata durumunda direkt değeri göster
                            element.textContent = element.getAttribute('countTo');
                        }
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', initializeCounters);

        // Print öncesinde
        window.onbeforeprint = function () {
            ['status1', 'status2', 'status3', 'status4'].forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    element.textContent = element.getAttribute('countTo');
                }
            });
        };

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var labels = @json($labels);
            var data = @json($data);

            var ctx = document.getElementById("chart-monthly-visits").getContext("2d");

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels, // Dinamik ay + yıl
                    datasets: [{
                        label: "Ziyaret Sayısı",
                        tension: 0.4,
                        borderWidth: 0,
                        borderRadius: 4,
                        borderSkipped: false,
                        backgroundColor: "#3A416F",
                        data: data,
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
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#9ca2b7'
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false
                            },
                            ticks: {
                                font: {
                                    size: 12,
                                    family: "Open Sans",
                                    style: 'normal',
                                },
                                color: "#9ca2b7"
                            },
                        },
                    },
                },
            });
        });
    </script>

@endpush
