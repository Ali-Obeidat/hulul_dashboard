{{--@dd('ahmad')--}}
<x-admin-master>


    @section('content')
    <form action="{{route('public-Bonus.store')}}" method="post">
        @csrf
        <div class="col-md-6 m-auto mt-5 ">
            <div class="card mb-4">
                <h5 class="card-header">Add New Bonus</h5>
                <div class="card-body pb-0">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="10$" aria-describedby="floatingInputHelp" name="quantity" />
                        <label for="floatingInput">Bonus Amount</label>
                        <div id="floatingInputHelp" class="form-text">How Much Bonus You Need To add </div>
                    </div>
                </div>

                <div class="row justify-content-center m-2 w-100">
                    <div class="">
                        <button type="submit" class="btn btn-primary">add</button>
                    </div>
                </div>
            </div>

        </div>

    </form>
    @endsection


</x-admin-master>