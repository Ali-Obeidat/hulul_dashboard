<x-admin-master>
    @section('style')
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y" style="padding-left: 85px; padding-right: 85px;">


        <h4 class="fw-bold py-3 mb-4">
            <span class="fw-light">Manage Real Accounts /</span> View Balance Request
        </h4>

        <!-- Ajax Sourced Server-side -->
        <div class="card" style="padding: 10px;overflow-x: scroll;">
            <h5 class="card-header">Deposit & Withdraw Requests Table</h5>


            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Account Login</th>
                            <th>Request Type</th>
                            <th>Old Value</th>
                            <th>New Value</th>
                            <th>Request Status</th>
                            <th>Accept</th>
                            <th>Reject</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                        <tr>
                            <td>{{$request->name}}</td>
                            <td>{{$request->login}}</td>
                            <td>{{$request->Request_type}}</td>
                            <td>{{$request->old_value}}</td>
                            <td> {{$request->new_value}} </td>
                            <td>{{$request->request_status}}</td>


                            <td>

                                <form method="post" action="{{route('ChangeBalanceStatus',$request->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <input hidden type="text" name="request_status" value="Accepted">
                                    <input hidden type="text" name="new_value" value="{{$request->new_value}}">
                                    <button @if($request->request_status =='Accepted' ) disabled @endif class="btn btn-primary">Accept</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('ChangeBalanceStatus',$request->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <input hidden type="text" name="request_status" value="Rejected">
                                    <button @if($request->request_status =='Rejected' ) disabled @endif class="btn btn-danger">Reject</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>Account Login</th>
                            <th>Request Type</th>
                            <th>Old Value</th>
                            <th>New Value</th>
                            <th>Request Status</th>
                            <th>Accept</th>
                            <th>Reject</th>
                        </tr>
                    </tfoot>
                </table>
                </table>
            </div>
        </div>
        @endsection
        @section('script')
        @include('sweetalert::alert')
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        @endsection

</x-admin-master>