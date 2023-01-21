@extends('admin.index')
@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
    
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
    
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>
    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
    
                <div class="card-body">
                    <h5 class="card-title">Sales <span>| Today</span></h5>
    
                    <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $sale }}</h6>
                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
    
                    </div>
                    </div>
                </div>
    
                </div>
            </div><!-- End Sales Card -->
    
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
    
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>
    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
    
                <div class="card-body">
                    <h5 class="card-title">Revenue <span>| This Month</span></h5>
    
                    <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                        <h6>Rp. {{ number_format($revenue) }} </h6>
                        <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
    
                    </div>
                    </div>
                </div>
    
                </div>
            </div><!-- End Revenue Card -->
    
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
    
                <div class="card info-card customers-card">
    
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>
    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
    
                <div class="card-body">
                    <h5 class="card-title">Customers <span>| This Year</span></h5>
    
                    <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $customer }}</h6>
                        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
    
                    </div>
                    </div>
    
                </div>
                </div>
    
            </div><!-- End Customers Card -->
    
            <!-- Reports -->
            <div class="col-12">
                <div class="card">
    
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>
    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
    
                <div class="card-body">
                    <h5 class="card-title">Reports <span>/Today</span></h5>
    
                    <!-- Line Chart -->
                    <div id="reportsChart"></div>
    
                    <script>
                    let sales = [@foreach($sales as $sale) '{{$sale->id}}', @endforeach];
                    let revenues = [@foreach($revenues as $revenue) '{{$revenue->total_price,}}', @endforeach];
                    let id = [@foreach($revenues as $revenue) '{{$revenue->id,}}', @endforeach];
                    let user = [@foreach($revenues as $revenue) '{{$revenue->users_id,}}', @endforeach];
                    let customers = [@foreach($customers as $customer) '{{$customer->id}}', @endforeach];

                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                            name: 'Sales',
                            data: revenues
                        }, {
                            name: 'Revenue',
                            data: id
                        }, {
                            name: 'Customers',
                            data: user
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                            show: false
                            },
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                            type: "gradient",
                            gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        xaxis: {
                            type: 'datetime',
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                            x: {
                            format: 'dd/MM/yy HH:mm'
                            },
                        }
                        }).render();
                    });
                    </script>
                    <!-- End Line Chart -->
    
                </div>
    
                </div>
            </div><!-- End Reports -->
        </div>
    </div>
</section>
@endsection