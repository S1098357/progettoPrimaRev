@if (Auth::check())
    <a href="" class="" style="margin-right: 15px;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{route('logout')}}" method="POST">
        {{csrf_field()}}
    </form>
@endif
