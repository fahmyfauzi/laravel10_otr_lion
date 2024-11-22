<!DOCTYPE html>
<html lang="en">

@include('layouts.section.styles')

<body class="d-flex align-items-center justify-content-center vh-100">

    <main class="text-center ">
        @yield('content')
    </main>

    @include('layouts.section.scripts')
</body>

</html>
