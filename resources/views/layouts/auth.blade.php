<!DOCTYPE html>
<html lang="en">

@include('layouts.section.styles')

<body class="bg-light">
    <main class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    @include('layouts.section.scripts')
</body>


</html>
