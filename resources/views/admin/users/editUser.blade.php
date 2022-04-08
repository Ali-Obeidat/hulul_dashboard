<x-admin-master>
    @section('style')

    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Users /</span> Edit
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
      <h5 class="card-header">Bootstrap Validation</h5>
      <div class="card-body">
        <form class="needs-validation" action="{{route('users.update',$user->id)}}" method="post" novalidate>
            @csrf
            @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="bs-validation-name">Name</label>
            <input name="name" value="{{$user->name}}" type="text" class="form-control" id="bs-validation-name" placeholder="user name" required />
            <div class="valid-feedback"> Looks good! </div>
            <div class="invalid-feedback"> Please enter your name. </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="bs-validation-email">Email</label>
            <input name="email" value="{{$user->email}}" type="email" id="bs-validation-email" class="form-control" placeholder="john.doe" aria-label="john.doe" required />
            <div class="valid-feedback"> Looks good! </div>
            <div class="invalid-feedback"> Please enter a valid email </div>
          </div>
          <div class="row">
          <div class="mb-3 col-3">
            <label class="form-label" for="bs-validation-country">Country</label>
            <select name="country" class="form-select" id="bs-validation-country" required>
              <option value="{{$user->country}}" selected>{{$user->country}}</option>
              <option value="usa">USA</option>
              <option value="uk">UK</option>
              <option value="france">France</option>
              <option value="australia">Australia</option>
              <option value="spain">Spain</option>
            </select>
            <div class="valid-feedback"> Looks good! </div>
            <div class="invalid-feedback"> Please select your country </div>
          </div>
          <div class="mb-3 col-9">
              <label class="form-label" for="bs-validation-email">phone</label>
              <input name="phone" value="{{$user->phone}}" type="number" id="bs-validation-phone" class="form-control" placeholder="john.doe" aria-label="john.doe" required />
              <div class="valid-feedback"> Looks good! </div>
              <div class="invalid-feedback"> Please enter a valid email </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="bs-validation-country">Type</label>
            <select name="type" class="form-select" id="bs-validation-country" required>
              <option value="">Select Country</option>
              <option value="individual" @if($user->type == 'individual') selected @endif > Individual</option>
              <option value="Corporate" @if($user->type == 'Corporate') selected @endif >Corporate</option>
              <option value="Partner" @if($user->type == 'Partner') selected @endif> Partner</option>
              
            </select>
            <div class="valid-feedback"> Looks good! </div>
            <div class="invalid-feedback"> Please select your country </div>
          </div>
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="bs-validation-password">Password</label>
            <div class="input-group input-group-merge">
              <input name="password" type="password" id="bs-validation-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"  />
              <span class="input-group-text cursor-pointer" id="basic-default-password4"><i class="bx bx-hide"></i></span>
            </div>
            <div class="valid-feedback"> Looks good! </div>
            <div class="invalid-feedback"> Please enter your password. </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Bootstrap Validation -->
</div>


            
          </div>

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