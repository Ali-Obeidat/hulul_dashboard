<x-admin-master>
    @section('style')
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y" style="padding-left: 85px; padding-right: 85px;">

        <!-- Images -->
        @if(Session('news_deleted'))
        <div class="alert alert-danger alert-dismissible col-6" role="alert">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">News Deleted!!</h6>
                <p class="mb-0">Aww yeah, you successfully Deleted the News.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>

            </div>
        @endif
        <h5 class="pb-1 mb-4">News</h5>
        <div class="row mb-5">
            @foreach($news as $value)
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3">
                    <img width="300px" height="300px" class="card-img-top" src="images/{{$value->img}}" alt="Card image cap" />
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between;">
                            <h5 class="card-title">{{$value->title}}</h5>
                            <div style="    display: flex; align-items: center;">

                              <a href="{{route('news.edit',$value->id)}}">  <i style="margin-left: 5px; cursor: pointer;"  class="fas fa-edit"></i></a>
                            <form method="post" action="{{route('news.destroy',$value->id)}}" >
                        @csrf
                        @method('DELETE')
                        <button style=" all: unset;" type="submit"><i style="margin-left: 5px; cursor: pointer;" class="fa fa-trash" aria-hidden="true"></i></button>
                      </form>
                            </div>
                        </div>
                        <p class="card-text">
                        {{$value->body}}
                        </p>

                        <p class="card-text">
                            <small class="text-muted">{{$value->created_at->diffForHumans()}}</small>
                        </p>


                    </div>
                </div>
            </div>
            @endforeach



        </div>
        {!! $news->appends(Request::all())->links() !!}

        <!--/ Images -->




    </div>

    @endsection
    @section('script')
    @include('sweetalert::alert')

    @endsection

</x-admin-master>