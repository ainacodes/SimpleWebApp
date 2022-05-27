<div class="container">
    <div class="card2">
        <div class="mb-3">
            <h3 class="text-center">Profile</h3>

            Logged in as {{ session()->get('user')->name }}
            | <a href="/editmyuser?rid={{ session()->get('user')->id }}" class="btn btn-primary">
                <i style='font-size:12px' class='far'>&#xf044;</i>
            </a>
            <br>
            Email address: {{ session()->get('user')->email }}
            <br>
            <a href='/userlist'>View all participants</a>

        </div>
        <button type="button" onclick="window.location='/logout'" class="btn btn-outline-dark">Log out</button>
    </div>
</div>
