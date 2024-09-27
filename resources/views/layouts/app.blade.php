<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.head')

<body>
    @include('layouts.partials.navbar')

    <div class="container mt-9">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

    @include('layouts.partials.scripts')
</body>
</html>
