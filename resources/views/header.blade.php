{{View:: make('title')}}
{{View:: make('menu')}}

<div class="container">
@if(session()->has('user'))
    {{View:: make('user')}}
@else
    @yield('login')
@endif
</div>

{{View:: make('footer')}} 