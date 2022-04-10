<x-admin-master>
  @section('content')
        <div class="card m-5" style="margin-top: 15vh !important;">
            <h5 class="card-header">Top 10 Affiliates Table</h5>
            @if(Session('user_deleted'))
                <div class="alert alert-danger alert-dismissible col-6" role="alert">
                    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">User Deleted!!</h6>
                    <p class="mb-0">Aww yeah, you successfully Deleted the user.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>

                </div>
            @elseif(Session('user_updated'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Edit User</h6>
                    <p class="mb-0">You successfully Edited the user.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
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
                    <tbody>
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
                    <tfoot>
                    <tr>
                        <th>#id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>type</th>
                        <th>country</th>
                        <th>Created at</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="container-xxl flex-grow-1 container-p-y">



    <div class="row">
      <div class="col-lg-6 col-md-12 col-ms-12">
        <div>
          <canvas id="myChart" width="500px"></canvas>
        </div>


      </div>
      <div class="col-lg-6 col-md-12 col-ms-12 ml-3">
        <div>
          <canvas id="BarChart" width="500px"></canvas>
        </div>

      </div>

    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-ms-12">
        <div>
          <canvas id="affiliates" width="500px"></canvas>
        </div>


      </div>
      <!-- <div class="col-lg-6 col-md-12 col-ms-12 ml-3">
        <div>
          <canvas id="BarChart" width="500px"></canvas>
        </div>

      </div> -->

    </div>


  </div>

  @endsection
  @section('script')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var day=JSON.parse('{!! json_encode($twoWeeks) !!}');
    var userNum=JSON.parse('{!! json_encode($userNum) !!}');
    var WithdrawNum=JSON.parse('{!! json_encode($WithdrawNum) !!}');
    var affiliatesNum=JSON.parse('{!! json_encode($affiliatesNum) !!}');
    var maxUserCount=JSON.parse('{!! json_encode($maxUserCount) !!}');
    var maxWithdrawCount=JSON.parse('{!! json_encode($maxWithdrawCount) !!}');
    var maxAffiliatesCount=JSON.parse('{!! json_encode($maxAffiliatesCount) !!}');
    console.log(day);
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
const Withdrawals = {
  labels: day,
  datasets: [{
    label: 'Withdrawals in last two weeks ',
    data: WithdrawNum,
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
const Withdraw = {
  type: 'bar',
  data: Withdrawals,
  options: {
    scales: {
      y: {
        beginAtZero: true,
        max: maxWithdrawCount + 2
      }
    }
  },
};
    </script>
<script>
  const BarChart = new Chart(
    document.getElementById('BarChart'),
    Withdraw
  );
</script>

<script>
  const affiliatesData = {
    labels: day,
    datasets: [{
      label: 'Number of affiliates users last two weeks',
      backgroundColor: '#6149CD',
      borderColor: '#6149CD',
      data: affiliatesNum,
    }]

  };


  const numAffiliates = {
  type: 'line',
  data: affiliatesData,
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
        max: maxAffiliatesCount + 2
      }
    }
  }
};
// console.log(config);
</script>
<script>
    const myChartAffiliates = new Chart(
      document.getElementById('affiliates'),
      numAffiliates
    );
  </script>

  @endsection

</x-admin-master>
