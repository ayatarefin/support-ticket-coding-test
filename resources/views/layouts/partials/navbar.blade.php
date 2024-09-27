<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <a class="navbar-brand" href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                @if(Auth::user()->role == 'admin')
                @else
                <!-- Customer navbar -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tickets.create') }}">Create New Ticket</a>
                    </li>
                @endif
                <!-- log out for admin and customer both -->
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>

