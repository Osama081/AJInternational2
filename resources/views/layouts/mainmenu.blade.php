<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/"> <span class="fontWendy text-danger">AJ</span><span class="fontSherifPro"> International</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">

            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('cars.index')}}">Add A New Car</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('cars.create')}}">View UnSold</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('rep')}}">View Report</a>
            </li>

            <li class="nav-item" >
                <a class="nav-link  text-primary">{{Auth::user()->name}}</a>
            </li>

            <li class="nav-item" >
                <a class="nav-link  btn btn-info mr-md-4 mr-lg-4">Change Password</a>
            </li>


            <li class="nav-item" style="float: right">
                <form action="logout" method="post">
                    @csrf
                    <input class="nav-link btn btn-danger" type="submit" value="LogOut">
                </form>
            </li>


        </ul>
    </div>
</nav>