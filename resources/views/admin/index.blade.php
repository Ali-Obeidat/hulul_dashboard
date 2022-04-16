<x-admin-master>
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">



        <div class="row">
            <div class="col-lg-6 col-md-12 col-ms-12">
                <div class="card-header header-elements">
                    <h5 class="card-title mb-0">Number of users last two weeks</h5>

                </div>
                <div>
                    <canvas id="myChart" width=""></canvas>
                </div>


            </div>
            <div class="col-lg-6 col-md-12 col-ms-12 ml-3">
                <div class="card">
                    <div class="card-header header-elements">
                        <h5 class="card-title mb-0">Withdrawals in last two weeks</h5>

                    </div>
                    <div class="card-body">
                        <canvas id="barChart" class="chartjs" height="340px"></canvas>
                    </div>
                </div>

            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-ms-12">
                <div>
                    <h5 class="card-title mb-0">Affiliates</h5>
                    <small class="text-muted">Number of affiliates users last two weeks</small>
                </div>
                <div class="card-body">
                    <div id="lineChart"></div>
                </div>


            </div>
            <div class="col-lg-6 col-md-12 col-ms-12 ml-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <small class="text-muted">Last Visitors</small>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="lineAreaChart"></div>
                    </div>
                </div>

            </div>

        </div>


        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-ms-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-md-center align-items-start">
                        <h5 class="card-title mb-0">Deposits</h5>

                    </div>
                    <div>
                        <canvas id="BarChart" width="500px"></canvas>
                    </div>
                </div>


            </div>
            <div class="col-lg-6 col-md-12 col-ms-12 ml-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <small class="text-muted">Total withdrawals</small>
                        </div>

                    </div>
                    <div class="card-body">
                        <canvas id="TotalWithdrawals" width="500px"></canvas>
                    </div>
                </div>

            </div>

        </div>
        <hr>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-ms-12">
                <div class="card">
                    <h5 class="card-header">Top 10 Affiliates Table</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>type</th>
                                    <th>country</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                @foreach($finalTen as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->type}}</td>
                                    <td>{{$user->country}}</td>
                                    <td>{{$user->created_at}}</td>


                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>


        </div>

        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-ms-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-md-center align-items-start">
                        <h5 class="card-title mb-0">Companies</h5>

                    </div>
                    <div>
                        <canvas id="companyChart"></canvas>
                    </div>
                </div>


            </div>
            <div class="col-lg-6 col-md-12 col-ms-12 ml-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5 class="text-muted">Top Five Countries</h5>
                        </div>

                    </div>
                    <div class="card-body">
                        <canvas id="polarChart" class="chartjs" data-height="337"></canvas>

                    </div>
                </div>

            </div>

        </div>

    </div>

    @endsection
    @section('script')
    <script>
        var day = JSON.parse('{!! json_encode($twoWeeks) !!}');
        var userNum = JSON.parse('{!! json_encode($userNum) !!}');
        var WithdrawNum = JSON.parse('{!! json_encode($WithdrawNum) !!}');
        var affiliatesNum = JSON.parse('{!! json_encode($affiliatesNum) !!}');
        var visitorsNum = JSON.parse('{!! json_encode($visitorsNum) !!}');
        var DepositsNum = JSON.parse('{!! json_encode($DepositsNum) !!}');
        var CompaniesNum = JSON.parse('{!! json_encode($CompaniesNum) !!}');
        var maxUserCount = JSON.parse('{!! json_encode($maxUserCount) !!}');
        var WithdrawalsSumNum = JSON.parse('{!! json_encode($WithdrawalsSumNum) !!}');
        var maxWithdrawCount = JSON.parse('{!! json_encode($maxWithdrawCount) !!}');
        var maxAffiliatesCount = JSON.parse('{!! json_encode($maxAffiliatesCount) !!}');
        var maxVisitorsCount = JSON.parse('{!! json_encode($maxVisitorsCount) !!}');
        var maxDepositsCount = JSON.parse('{!! json_encode($maxDepositsCount) !!}');
        var maxWithdrawalsSumNum = JSON.parse('{!! json_encode($maxWithdrawalsSumNum) !!}');
        var maxCompaniesNum = JSON.parse('{!! json_encode($maxCompaniesNum) !!}');
        var finalFiveCountries = JSON.parse('{!! json_encode($finalFiveCountries) !!}');
        var finalCountriesNum = JSON.parse('{!! json_encode($finalCountriesNum) !!}');
        console.log(WithdrawalsSumNum);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../assets/vendor/libs/chartjs/chartjs.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/charts-apex.js"></script>

    <script src="../../assets/js/charts-chartjs.js"></script>
    <script>
        const labels = day
        const companyData = {
            labels: labels,
            datasets: [{
                label: 'Number of Companies in last two weeks',
                data: CompaniesNum,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };
        const companyConfig = {
            type: 'line',
            data: companyData,
        };

        const companyChart = new Chart(
            document.getElementById('companyChart'),
            companyConfig
        );
    </script>


    <script>
        const data = {
            labels: day,
            datasets: [{
                label: 'Number of users last two weeks',
                backgroundColor: '#6149CD',
                borderColor: '#6149CD',
                data: userNum,
            }]

        };


        const numUser = {
            type: 'line',
            data: data,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: { // defining min and max so hiding the dataset does not change scale range
                        label: 'users Num',
                        min: 0,
                        max: maxUserCount + 2
                    }
                }
            }
        };
        // console.log(config);
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            numUser
        );
    </script>

    <script>
        // const labels = Utils.months({count: 7});
        const Deposits = {
            labels: day,
            datasets: [{
                label: 'Deposits in last two weeks ',
                data: DepositsNum,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        const DepositsConfig = {
            type: 'bar',
            data: Deposits,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: maxDepositsCount + 2
                    }
                }
            },
        };
    </script>
    <script>
        const BarChart = new Chart(
            document.getElementById('BarChart'),
            DepositsConfig
        );
    </script>



    <script>
        const TotalWithdrawalsData = {
            labels: day,
            datasets: [{
                label: 'Withdrawals Sum users last two weeks',
                backgroundColor: '#6149CD',
                borderColor: '#6149CD',
                data: WithdrawalsSumNum,
            }]

        };
        const WithdrawalsSum = {
            type: 'line',
            data: TotalWithdrawalsData,
            options: {
                animations: {
                    tension: {
                        duration: 0,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: { // defining min and max so hiding the dataset does not change scale range
                        label: 'Withdrawals Sum',
                        min: 0,
                        max: maxWithdrawalsSumNum + 500
                    }
                }
            }
        };
        // console.log(config);
    </script>
    <script>
        const myChartWithdrawalsSums = new Chart(
            document.getElementById('TotalWithdrawals'),
            WithdrawalsSum
        );
    </script>



    @endsection
</x-admin-master>