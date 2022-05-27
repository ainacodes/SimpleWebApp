{{View:: make('title')}}
{{View:: make('menu')}}

<div class="container">
    <div class="card1">
        <h4 class="text-center">Edit Profile</h4>
        <br>
        <form action="useredit?rid={{ $users->id }}" method="post">
        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success')}}</div>
        @endif
        @csrf
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Full name</label>
                <input maxlength="100" value="{{ $users->name }}" type="text" name="fullname" id="exampleInputName1" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Emaill Address</label>
                <input maxlength="100" value="{{ $users->email }}" type="email" name="email" id="exampleInputEmail1" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input maxlength="50" value="{{ $users->password }}" type="password" name="password" id="exampleInputPassword1" class="form-control">
            </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" onclick="window.location='/'" class="btn btn-secondary">Back</button>
        </form>
    </div>
</div>
{{View:: make('footer')}}