<x-admin-master>
    @section('style')
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css">
    <!-- Form Validation -->
    <link rel="stylesheet" href="../../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Manage Users /</span> Users Table
        </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
              <h5 class="card-header">Users Table</h5>
              <div class="card-datatable table-responsive">
                <table class="dt-row-grouping table border-top">
                  <thead>

                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>type</th>
                      <th>country</th>
                      <th>Created At</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>

                  <tbody>
                      @foreach($users as $user)
                      <tr>
                          <td></td>
                          <td>{{$user->name}} </td>
                          <td>{{$user->email}} </td>
                          <td>{{$user->phone}} </td>
                          <td>{{$user->type}} </td>
                          <td>{{$user->country}} </td>
                          <td>{{$user->created_at}}</td>
                          <td></td>
                          <td></td>
                      </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>type</th>
                      <th>country</th>
                      <th>Created At</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
        <!-- Modal to add new record -->
        <!-- <div class="offcanvas offcanvas-end" id="add-new-record">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
                    <div class="col-sm-12">
                        <label class="form-label" for="basicFullname">Full Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basicFullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicPost">Post</label>
                        <div class="input-group input-group-merge">
                            <span id="basicPost2" class="input-group-text"><i class='bx bxs-briefcase'></i></span>
                            <input type="text" id="basicPost" name="basicPost" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicEmail">Email</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                        </div>
                        <div class="form-text">
                            You can use letters, numbers & periods
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicDate">Joining Date</label>
                        <div class="input-group input-group-merge">
                            <span id="basicDate2" class="input-group-text"><i class='bx bx-calendar'></i></span>
                            <input type="text" class="form-control dt-date" id="basicDate" name="basicDate" aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicSalary">Salary</label>
                        <div class="input-group input-group-merge">
                            <span id="basicSalary2" class="input-group-text"><i class='bx bx-dollar'></i></span>
                            <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary" placeholder="12000" aria-label="12000" aria-describedby="basicSalary2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>

            </div>
        </div> -->





    </div>

    @endsection
    @section('script')
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="../../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/datatables/jquery.dataTables.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
    <script src="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/jszip/jszip.js"></script>
    <script src="../../assets/vendor/libs/pdfmake/pdfmake.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons/buttons.print.js"></script>
    <!-- Flat Picker -->
    <script src="../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <!-- Row Group JS -->
    <script src="../../assets/vendor/libs/datatables-rowgroup/datatables.rowgroup.js"></script>
    <script src="../../assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js"></script>
    <!-- Form Validation -->
    <script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/tables-datatables-basic.js"></script>
    @endsection

</x-admin-master>
