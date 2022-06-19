<x-admin-master>
    @section('style')

    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y" style="padding-left: 85px; padding-right: 85px;">


        <h4 class="fw-bold py-3 mb-4">
            <span class="fw-light">Managers /</span> Send Email
        </h4>
        @if(Session('user_updated'))
        <div class="alert alert-primary alert-dismissible col-6" role="alert">
            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Edit User</h6>
            <p class="mb-0">You successfully Edited the user.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @endif
        <div class="row mb-4">


            <!-- Bootstrap Validation -->
            <div class="col-md">
                <div class="card">
                    <h5 class="card-header">Send New Email</h5>
                    <div class="card-body">
                        <form class="" action="{{route('ManagerEmails.store')}}" method="post" novalidate>
                            @csrf
                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Email body</label>
                                <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Bootstrap Validation -->
        </div>



    </div>
    @include('sweetalert::alert')

    @endsection
    @section('script')


    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/libs/tagify/tagify.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->

    <!-- Page JS -->
    <script src="../../assets/js/form-validation.js"></script>
    @endsection

</x-admin-master>