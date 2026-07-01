<nav class="topbar d-flex justify-content-between align-items-center px-4">

    <div class="d-flex align-items-center">

        <button class="btn btn-light me-3 d-lg-none"
            onclick="document.getElementById('sidebar').classList.toggle('show')">

            <i class="bi bi-list"></i>

        </button>

        <h4 class="mb-0 fw-bold">

            @yield('title','Dashboard')

        </h4>

    </div>

    <div class="d-flex align-items-center gap-4">

        <div>

            <i class="bi bi-bell fs-5"></i>

        </div>

        <div>

            <i class="bi bi-hdd-network text-success"></i>

            Online :
            <strong>0</strong>

        </div>

        <div class="dropdown">

            <a href="#"

               class="dropdown-toggle text-decoration-none text-dark"

               data-bs-toggle="dropdown">

                <i class="bi bi-person-circle fs-4"></i>

                {{ Auth::user()->name }}

            </a>

            <ul class="dropdown-menu dropdown-menu-end">

                <li>

                    <a href="{{ route('profile.edit') }}" class="dropdown-item">

                        <i class="bi bi-person"></i>

                        Profile

                    </a>

                </li>

                <li><hr class="dropdown-divider"></li>

                <li>

                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button class="dropdown-item">

                            <i class="bi bi-box-arrow-right"></i>

                            Logout

                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</nav>
