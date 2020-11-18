<!-- Authentication Links -->
<ul class="govuk-list">
    @guest
        <li>
            <a class="govuk-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li>
            <a class="govuk-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @else
        <li>
            <a id="navbarDropdown" class="govuk-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>
        </li>
        <li>
            <a class="govuk-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    @endguest
</ul>
