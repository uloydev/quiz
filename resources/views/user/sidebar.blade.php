<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-custom-4">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white h-100">
        <a href="/"
            class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none border-bottom w-100">
            <span class="fs-5 d-none d-sm-inline text-custom-1 mx-auto font-weight-bold">Dashboard</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100"
            id="menu">
            <li class="nav-item mb-3 w-100 px-2 rounded-lg @if (Request::url() == route('user.dashboard')) font-weight-bold bg-custom-3 @endif">
                <a href="{{ route('user.dashboard') }}" class="nav-link align-middle px-0 d-flex align-content-center">
                    <i class="bx bx-question-mark bx-sm bg-custom-1 rounded-3 me-3"></i><div class="ms-1 d-none d-sm-inline text-custom-2">Available Quiz</div>
                </a>
            </li>
            <li class="nav-item mb-3 w-100 px-2 rounded-lg @if (Request::url() == route('user.history')) font-weight-bold bg-custom-3 @endif">
                <a href="{{ route('user.history') }}" class="nav-link align-middle px-0 d-flex align-content-center">
                    <i class="bx bx-history bx-sm bg-custom-1 rounded-3 me-3"></i><div class="ms-1 d-none d-sm-inline text-custom-2">History Quiz</div>
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                    class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-light text-small shadow">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">Log out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>