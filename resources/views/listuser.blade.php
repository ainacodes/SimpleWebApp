{{View:: make('title')}}
{{View:: make('menu')}}

<div class="container">
    <!--
    <form action="userlist" method="post" enctype="multipart/form-data">
        @csrf
        <input value="{{request()->input('search')}}" name="search" type="search" placeholder="Search..." style="height: 40px; border: none; border-radius: 5px; margin: 4px; padding: 4px">
        <button type="submit" style='font-size:24px' class="btn btn-info"> <i class='fas fa-search'></i></button>
            <input type="submit" value="search">
    -->
    </form>

    <form action="userlist" method="post" enctype="multipart/form-data">
    @csrf    
        <div class="d-inline-flex">
        <input value="{{request()->input('search')}}"  type="search" class="form-control" placeholder="Search..." name="search" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="submit">
            <i class='fas fa-search'></i>
        </button>
        </div>
    </form>

    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success')}}</div>
    @endif



<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Password</th>
                <th scope="col">Created Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listofuser as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ date('D, d F Y',strtotime($user->created_at)) }}</td>
                <td>
                    <a href="editmyuser?rid={{ $user->id }}" class="btn btn-primary">
                        <i style='font-size:12px' class='far'>&#xf044;</i>
                    </a>
                    <!--
                    <a href="userdelete?rid={{ $user->id }}" class="btn btn-danger">
                        <i style='font-size:12px' class='far'> &#xf2ed;</i>
                    </a>
                    -->


                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i style='font-size:12px' class='far'> &#xf2ed;</i>
                    </button>


                    <!-- Modal -->
                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this user?</p>
                        </div>
                        <div class="modal-footer">
                            <button onclick="window.location='userdelete?rid={{ $user->id }}'" class="btn btn-danger" data-bs-dismiss="modal" >Yes, delete it</button>
                        </div>
                        </div>
                    </div>
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
</div>
<style>
    .h-5 {
        height: 1em;
    }

    .flex {
        text-align: center;
        width: 100%
    }

    .leading-5 {
        padding: 0.7em;

    }
</style>
<br>

<!-- If didnn't include search bar, use this for pagination function:
<div class="pagination">
{{ $listofuser->links() }}
</div>
-->

<div class="pagination">
    {{ $listofuser->appends(['search' => Request::get('search')])->links() }}
</div>


{{View:: make('footer')}}

