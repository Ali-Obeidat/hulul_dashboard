{{--@dd('ahmad')--}}
<x-admin-master>


          @section('content')
        <form action="{{route('bonus.store')}}" method="post">
            @csrf
        <div class="col-md-6 m-auto mt-5 ">
            <div class="card mb-4">
                <h5 class="card-header">Add Bonus Code</h5>
                <div class="card-body pb-0">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="ahkod1235" aria-describedby="floatingInputHelp" name="code" />
                        <label for="floatingInput">Bonus Code</label>
                        <div id="floatingInputHelp" class="form-text">Try To Add New Bonus</div>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="10$" aria-describedby="floatingInputHelp" name="quantity" />
                        <label for="floatingInput">Bonus</label>
                        <div id="floatingInputHelp" class="form-text">How Much Bonus You Need To add </div>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <label for="html5-datetime-local-input" class="col-md-2 col-form-label">from</label>
                    <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" id="html5-datetime-local-input" name="from" min={{$time}} />
                </div>
                <div class="card-body">
                    <label for="html5-datetime-local-input" class="col-md-2 col-form-label">to</label>
                    <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" id="html5-datetime-local-input" name="to"/>
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
