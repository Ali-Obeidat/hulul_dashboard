<x-admin-master>
    @section('style')
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y" style="padding-left: 85px; padding-right: 85px;">


        <h4 class="fw-bold py-3 mb-4">
            <span class="fw-light">Manage Real Accounts /</span> View Deposit Requests
        </h4>

        <!-- Ajax Sourced Server-side -->
        <div class="card" style="padding: 10px;overflow-x: scroll;">
            <h5 class="card-header">Deposit Requests Table</h5>


            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Account Login</th>
                            <th>Request Type</th>
                            <th>Bank Name</th>
                            <th>Recipient Name</th>
                            <th>Account Number</th>
                            <th>Remittance Notices</th>
                            <th>Amount Transferred</th>
                            <th>Request Status</th>
                            <th>Created At</th>

                            <th>Accept</th>
                            <th>Reject</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($depositRequests as $depositRequest)
                        <tr>
                            <td>{{$depositRequest->name}}</td>
                            <td>{{$depositRequest->login}}</td>
                            <td>{{$depositRequest->type}}</td>
                            <td>{{$depositRequest->bank_name}}</td>
                            <td>{{$depositRequest->recipient_name}}</td>
                            <td> {{$depositRequest->account_number}} </td>
                            <td>
                                <a download href="https://www.hululmfx.com/public/files/{{$depositRequest->Remittance_notices}}" target="_blank"> {{$depositRequest->Remittance_notices}}</a>
                            </td>
                            <td>{{$depositRequest->amount_transferred}}</td>
                            <td>{{$depositRequest->status}}</td>
                            <td>{{$depositRequest->created_at}}</td>

                            @if($depositRequest->status == 'Accepted')
                            <td>

                                <form method="post" action="{{route('ChangeDepositStatus',$depositRequest->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <input hidden type="text" name="status" value="deposited">

                                    <button @if($depositRequest->status =='deposited' ) disabled @endif class="btn btn-primary">deposited</button>
                                </form>
                            </td>
                            @elseif($depositRequest->status == 'Pending' || $depositRequest->status == 'Rejected')
                            <td>

                                <form method="post" action="{{route('ChangeDepositStatus',$depositRequest->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <input hidden type="text" name="status" value="Accepted">

                                    <button @if($depositRequest->status =='Accepted' ) disabled @endif class="btn btn-primary">Accept</button>
                                </form>
                            </td>

                            @elseif($depositRequest->status == 'deposited')
                            <td><button disabled class="btn btn-primary">deposited</button></td>


                            @endif

                            @if($depositRequest->status == 'deposited')
                            <td></td>
                            @else
                            <td>
                                <form method="post" action="{{route('ChangeDepositStatus',$depositRequest->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <input hidden type="text" name="status" value="Rejected">
                                    <button @if($depositRequest->status =='Rejected' ) disabled @endif class="btn btn-danger">Reject</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>Account Login</th>
                            <th>Request Type</th>
                            <th>Bank Name</th>
                            <th>Recipient Name</th>
                            <th>Account Number</th>
                            <th>Remittance Notices</th>
                            <th>Amount Transferred</th>
                            <th>Request Status</th>
                            <th>Created At</th>
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