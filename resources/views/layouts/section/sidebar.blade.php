<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page"
                        href="{{ auth()->user()->role === 'pic_coordinator'
                            ? route('pic.index')
                            : (auth()->user()->role === 'quality_inspector'
                                ? route('quality-inspector.index')
                                : route('submission.index')) }}">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Home
                    </a>
                </li>
                @if (Auth::user()->role == 'applicant')
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('submission.create') }}">
                            <svg class="bi">
                                <use xlink:href="#file-earmark" />
                            </svg>
                            Create Submission
                        </a>
                    </li>
                @endif
            </ul>



            <hr class="my-3">

            <ul class="nav flex-column mb-auto">

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" id="logoutForm" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link d-flex align-items-center gap-2 border-0 bg-transparent"
                            style="cursor: pointer;">
                            <svg class="bi">
                                <use xlink:href="#door-closed" />
                            </svg>
                            Sign out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
