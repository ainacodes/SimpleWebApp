{{View:: make('title')}}
{{View:: make('menu')}}

<div class="container">
    <div class="card1">
    <h4 class="text-center">Create an Account</h4>
    <br>
    <form action="register" method="post">
        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success')}}</div>
        @endif
    @csrf
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Full Name</label>
            <input type="text" name="fullname" class="form-control" id="exampleInputName1" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
        </div>

        <div class="mb-3">
            <label class="form-label"l>Password</label>
            <input class="form-control" name="password" id="password" type="password" onkeyup='check();' required />   
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input class="form-control" type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' required/>
            <span id='message'></span>   
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
        <br>
        <p style="font-size: small">Already have an account?
        <a href='/login'>Login</a>
        </p>
        
    </form>
    </div>
</div>
{{View:: make('footer')}}