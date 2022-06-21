<x-admin-master>


    @section('content')
    <form action="{{route('ChangeLeverage',$account->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-6 m-auto mt-5 ">
            <div class="card mb-4 p-3">
                <h5 class="card-header">Change Account leverage</h5>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Real Account</label>
                    <input disabled type="text" name="title" class="form-control" value="{{$account->login.' MT5 '.$account->group}}" placeholder="">
                </div>
            
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Currant leverage</label>
                    <input disabled type="text" name="title" class="form-control" value="1:{{$account->leverage}}" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">New Leverage</label>
                    <select name="leverage" id="defaultSelect" class="form-select">
                        <option selected value="">select the new leverage</option>
                        <option value="100">1:100</option>
                        <option value="200">1:200</option>
                        <option value="300">1:300</option>
                        <option value="400">1:400</option>
                        <option value="500">1:500</option>
                    </select>
                </div>
                <div class="row justify-content-center m-2 w-100">
                    <div class="">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>

        </div>

    </form>
    @endsection
    @section('script')
    @include('sweetalert::alert')

    @endsection

</x-admin-master>