<nav class="navbar navbar-expand-lg fixed-top trans-navigation">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="" class="img-fluid b-logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fa fa-bars"></i>
            </span>
        </button>

        <!-- Logout -->
        <form action="{{ url('/logout') }}" method="POST" id="formLogout">{{ csrf_field() }}</form>
        <div class="collapse navbar-collapse justify-content-end" id="mainNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link smoth-scroll" href="{{ url('/pengajuan/cuti') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smoth-scroll" href="{{ url('/pengajuan/cuti/form') }}">Pengajuan Cuti</a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link smoth-scroll" href="{{ url('/profile/front/' . Auth::user()->id) }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smoth-scroll" href="#" onclick="logout()">Sign Out</a>
                    </li>
                @else 
                    <li class="nav-item">
                        <a class="nav-link smoth-scroll" href="{{ url('/login') }}">Sign In</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>