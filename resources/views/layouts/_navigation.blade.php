@if(auth()->check())
<aside class="menu">
    <p class="menu-label">
        Registreerimised
    </p>
    <ul class="menu-list">
        <li><a href="{{url('admin/registrations')}}">Registreerimised</a></li>
        <li><a href="{{url('admin/fields')}}">Registreerimise rühmad</a></li>
    </ul>
    <hr class="divider">
    <ul class="menu-list">
        <li>
            <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <i class="fa fa-lock pr5"></i> Logi välja
            </a>
         </li>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </ul>


</aside>
@endif
