<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            @if(Auth::user()->avatar == NULL)
                <img src="{{ asset('asset/images/user.png') }}" width="48" height="48" alt="User" />
            @else 
                <img src="{{ asset('asset/images/foto-user/' . Auth::user()->avatar) }}" width="48" height="48" alt="User" />
            @endif 
        </div>
        <form action="{{ url('/logout') }}" method="POST" id="formLogout">{{ csrf_field() }}</form>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{ url('/user/profile/' . Auth::user()->id) }}"><i class="material-icons">person</i>Profile</a></li>
                    <li><a href="#" onclick="logout()"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ setActive(['home*']) }}">
                <a href="{{ url('/home') }}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            @if(Auth::user()->role == 2)
                <li class="{{ setActive(['user*']) }}">
                    <a href="{{ url('/user') }}">
                        <i class="material-icons">person</i>
                        <span>User</span>
                    </a>
                </li>
                <li class="{{ setActive(['pegawai*']) }}">
                    <a href="{{ url('/pegawai') }}">
                        <i class="material-icons">people</i>
                        <span>Pegawai</span>
                    </a>
                </li>
                <li class="{{ setActive(['cuti']) }}">
                    <a href="{{ url('/cuti') }}">
                        <i class="material-icons">layers</i>
                        <span>Cuti</span>
                    </a>
                </li>
                <!-- <li class="{{ setActive(['pengajuan*']) }}">
                    <a href="{{ url('/pengajuan') }}">
                        <i class="material-icons">layers</i>
                    <span>Pengajuan Cuti</span>
                    </a>
                </li> -->
            @elseif(Auth::user()->role == 1)
                <!-- <li class="{{ setActive(['pengajuan*']) }}">
                    <a href="{{ url('/pengajuan') }}">
                        <i class="material-icons">layers</i>
                    <span>Pengajuan Cuti</span>
                    </a>
                </li> -->
                <li class="{{ setActive(['perizinan*']) }}">
                    <a href="{{ url('/perizinan') }}">
                        <i class="material-icons">assignment_ind</i>
                        <span>Perizinan</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; Sistem Pengajuan Cuti Kepegawaian.
        </div>
    </div>
    <!-- #Footer -->
</aside>