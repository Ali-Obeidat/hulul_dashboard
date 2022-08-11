<x-admin-master>
    @section('style')
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y" style="padding-left: 85px; padding-right: 85px;">


        <h4 class="fw-bold py-3 mb-4">
            <span class="fw-light">Manage Managers /</span> View All Managers
        </h4>

        <!-- Ajax Sourced Server-side -->
        <div class="card" style="padding: 15px;">
            <h5 class="card-header">Managers Table</h5>
            @if(Session('manager_deleted'))
            <div class="alert alert-danger alert-dismissible col-6" role="alert">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Managers Deleted!!</h6>
                <p class="mb-0">Aww yeah, you successfully Deleted the managers.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @elseif(Session('user_updated'))
            <div class="alert alert-primary alert-dismissible" role="alert">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Edit Manager</h6>
                <p class="mb-0">You successfully Edited the managers.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @elseif(Session('manager_created'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Well done :)</h6>
                <p class="mb-0">You successfully Create request.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endif
            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>

                            <th>First Login</th>
                            <th>Secund Login</th>
                            <th>Amount to be transferred</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Accept</th>
                            <th>Reject</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                        <tr>
                            <td>{{$request->First_account_login}}</td>
                            <td>{{$request->second_account_login}}</td>
                            <td>{{$request->Balance_amount}}</td>
                            <td>{{$request->status}}</td>
                            <td>{{$request->created_at}}</td>

                            <td>
                                @if($request->status != 'Accepted')
                                <form action="{{route('balanceTransferStatus',$request->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input hidden type="text" name="status" value="Accepted">
                                    <button type="submit" class="btn rounded-pill ">Accept</button>
                                </form>
                                @endif
                            </td>
                            <td>
                                @if($request->status != 'Rejected')
                                <form action="{{route('balanceTransferStatus',$request->id)}}" method="post">
                                    <input hidden type="text" name="status" value="Rejected">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn rounded-pill">Reject</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach




                    </tbody>
                    <tfoot>
                        <tr>

                            <th>First Login</th>
                            <th>Secund Login</th>
                            <th>Amount to be transferred</th>
                            <th>Status</th>
                            <th>Created at</th>
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