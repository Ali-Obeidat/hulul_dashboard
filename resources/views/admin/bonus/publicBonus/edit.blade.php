{{--@dd('ahmad')--}}
<x-admin-master>


    @section('content')
    <form action="{{route('public-Bonus.update',$bonus->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-6 m-auto mt-5 ">
            <div class="card mb-4">
                <h5 class="card-header">Add New Bonus</h5>
                <div class="card-body pb-0">
                    <div class="form-floating">
                        <input value="{{$bonus->quantity}}" type="text" class="form-control" id="floatingInput" placeholder="10$" aria-describedby="floatingInputHelp" name="quantity" />
                        <label for="floatingInput">Bonus Amount</label>
                        <div id="floatingInputHelp" class="form-text">How Much Bonus You Need To add </div>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <label for="defaultSelect" class="form-label">Bonus status</label>
                    <select name='status' id="defaultSelect" class="form-select">

                        <option @if($bonus->status == 'inactive') selected @endif value="inactive">inactive</option>
                        <option @if($bonus->status == 'active') selected @endif value="active">active</option>
                    </select>
                </div>
                <div class="row justify-content-center m-2 w-100">
                    <div class="">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>

        </div>

    </form>
    @endsection


</x-admin-master>