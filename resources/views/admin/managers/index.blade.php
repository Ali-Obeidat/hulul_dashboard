<x-admin-master>
    @section('style')
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y" style="padding-left: 85px; padding-right: 85px;">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Manage Managers /</span> View All Managers
        </h4>

        <!-- Ajax Sourced Server-side -->
        <div class="card">
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
          <p class="mb-0">You successfully Create manager.</p>
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
                            <th>Role</th>
                            <th>Created at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($managers as $manager)
                        <tr>
                            <td>{{$manager->id}}</td>
                            <td>{{$manager->name}}</td>
                            <td>{{$manager->email}}</td>
                            <td>{{$manager->role}}</td>
                            <td>{{$manager->created_at}}</td>

                            <td>
                                <a href="{{route('Managers.edit',$manager->id)}}">
                                    <button type="button" class="btn rounded-pill ">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('Managers.destroy',$manager->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn rounded-pill">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach




                    </tbody>
                    <tfoot>
                        <tr>
                        <th>#id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created at</th>
                            <th>Edit</th>
                            <th>Delete</th>
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