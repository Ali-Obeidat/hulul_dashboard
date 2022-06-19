<x-admin-master>
    @section('style')
        <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
        <div class="container-xxl flex-grow-1 container-p-y" style="padding-left: 85px; padding-right: 85px;">

            <div style="">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="fw-light">Bonuses /</span> View All
                </h4>
                <a href="{{route('bonus.create')}}"> <button class="btn rounded-pill  mb-2">Create New Bonus</button> </a>
            </div>
            <!-- Ajax Sourced Server-side -->
            <div class="card">
                <h5 class="card-header">Bonuses Table</h5>

                <div class="card-datatable text-nowrap p-2">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>#id</th>
                            <th>Bonus Code</th>
                            <th>Bonus Quantity</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bonuses as $bonus)
                            <tr>
                                <td>{{$bonus->id}}</td>
                                <td>{{$bonus->code}}</td>
                                <td>{{$bonus->quantity}}</td>
                                <td>{{$bonus->from}}</td>
                                <td>{{$bonus->to}}</td>
                                <td>
                                    <a href="{{route('bonus.edit',$bonus->id)}}">
                                        <button type="button" class="btn rounded-pill ">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('bonus.destroy',$bonus->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn rounded-pill r">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#id</th>
                            <th>Bonus Code</th>
                            <th>Bonus Quantity</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                    </table>
                    </table>
                </div>
            </div>
            @include('sweetalert::alert')

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
