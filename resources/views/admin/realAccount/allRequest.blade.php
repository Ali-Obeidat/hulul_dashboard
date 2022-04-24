<x-admin-master>
    @section('style')
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y" style="padding-left: 85px; padding-right: 85px;">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Manage Users /</span> View All Users
        </h4>

        <!-- Ajax Sourced Server-side -->
        <div class="card">
            <h5 class="card-header">Deposit & Withdraw Requests Table</h5>
            <form action="/api/UsersRequests/filter" method="get">
                
            <div class="mb-3" hidden>
          <label for="exampleFormControlSelect1" class="form-label">Deposit & Withdraw Filter</label>
          <select name="agreed" onchange="this.form.submit()" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
            <option @if(!empty($requestStatus)) @if($requestStatus == 'all') selected @endif @endif value="all" >all</option>
            <option @if(!empty($requestStatus)) @if($requestStatus == 'Accept') selected @endif  @endif value="Accept">Accepted</option>
            <option @if(!empty($requestStatus)) @if($requestStatus == 'Reject') selected @endif  @endif value="Reject">Rejected</option>
          </select>
        </div>
        </form>
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
                            <th>#</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>group</th>
                            <th>leverage</th>
                            <th>account status</th>
                            <th>date</th>
                            <th>Edit</th>
                            <th>Accept</th>
                            <th>Reject</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingRealAccounts as $value)
                        <tr>
                            <th scope="row">{{$value->id}}</th>
                            <td>{{$value->user->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->group}}</td>
                            <td> 1:{{$value->leverage}} </td>
                            <td>{{$value->account_status}}</td>
                            <td>{{$value->created_at}}</td>
                            <td>
                            <a href="">
                                    <button type="button" class="btn rounded-pill btn-label-dark">Edit</button>
                                </a>
                            </td>
                            <td>

                                <form method="post" action="{{route('accept',$value->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <!-- <input hidden type="text" name="agreed" value="Accepted"> -->
                                    <button @if($value->agreed !== null && $value->agreed == 'Accepted' ) disabled @endif class="btn btn-primary">Accept</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="">
                                    @csrf
                                    @method('PUT')
                                    <input hidden type="text" name="agreed" value="Rejected">
                                    <button @if($value->agreed !== null && $value->agreed == 'Rejected' ) disabled @endif class="btn btn-danger">Reject</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach



                    </tbody>
                    <tfoot>
                        <tr>
                        <th>#</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>group</th>
                            <th>leverage</th>
                            <th>account status</th>
                            <th>date</th>
                            <th>Edit</th>
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