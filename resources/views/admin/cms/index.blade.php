<x-admin-master>
    @section('style')
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y" style="padding-left: 20px; padding-right: 20px;">


        <h4 class="fw-bold py-3 mb-4">
            <span class="fw-light">view cms /</span> Documents
        </h4>

     <!-- Ajax Sourced Server-side -->
     <form class="card-body" action="{{route('cms.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value={{$cms->id}} name="id">
  <div class="mb-3">
    <label for="theme-color" class="form-label">Theme Color </label>
    <input type="text" value={{$cms->theme_color}} class="form-control" id="theme-color" name="theme_color">
  </div>
  <div class="mb-3">
    <label for="logo" class="form-label">logo</label>
    <img src={{url($cms->logo)}}/>
    <input type="file" class="form-control" id="logo" value={{$cms->logo}} name="logo">
  </div>
  <div class="mb-3">
    <label for="slider-first-image" class="form-label">Slider first image </label>
    <img src={{$cms->slider_first_image}}/>
    <input type="file" class="form-control" id="slider-first-image" value={{$cms->slider_first_image}} name="slider_first_image">
  </div>
  <div class="mb-3">
    <label for="slider-seconde-image" class="form-label">Slider second image </label>
    <img src={{$cms->slider_second_image}}/>
    <input type="file" class="form-control" id="slider-second-image" value={{$cms->slider_second_image}} name="slider_second_image">
  </div>
  <div class="mb-3">
    <label for="slider-third-image" class="form-label">Slider third image </label>
    <img src={{$cms->slider_third_image}}/>
    <input type="file" class="form-control" id="slider-third-image" value={{$cms->slider_third_image}} name="slider_third_image">
  </div>
  <button type="submit" class="btn btn-primary">save</button>
</form>

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