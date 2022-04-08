<x-admin-master>
    @section('style')
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div style="">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Managers Emails /</span> View All Emails
            </h4>
            <a href="{{route('ManagerEmails.create')}}"> <button class="btn rounded-pill btn-dark">Send New Email</button> </a>
        </div>
        <!-- Ajax Sourced Server-side -->
        <div class="card">
            <h5 class="card-header">Managers Emails Table</h5>

            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Email body</th>
                            <th>Created at</th>
                            <th>Send</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($emails as $email)
                        <tr>
                            <td>{{$email->id}}</td>
                            <td>{{$email->body}}</td>
                            <td>{{$email->created_at}}</td>
                            <td>
                                <form action="{{route('sendEmail',$email->id)}}" method="post">
                                    @csrf
                                    <input hidden type="text" value="{{$email->body}}" name="body">
                                    <button type="submit" class="btn rounded-pill btn-dark">Send</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach




                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#id</th>
                            <th>Email body</th>
                            <th>Created at</th>
                            <th>Send</th>
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