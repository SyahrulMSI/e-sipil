<nav class="navbar navbar-expand">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="header-left">
            <div class="dashboard_bar">
                PT. Sumber Sae Satu
            </div>
        </div>
        <ul class="navbar-nav header-right">
            <li class="nav-item dropdown header-profile">
                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                    @if (Auth::user()->DetailUser()->exists())
                    <img src="{{ Auth::user()->DetailUser()->exists() ? Storage::url(Auth::user()->DetailUser()->first()->profile) : '' }}" width="20" alt=""/>
                    @else
                    <img src="{{ asset('dashboard/images/profile/17.jpg') }}" width="20" alt=""/>
                    @endif

                    <div class="header-info">
                        @if (!empty(Auth::user()))
                            <span class="text-black"><strong>{{  Auth::user()->nama_lengkap }}</strong></span>
                        @endif

                        @if (!empty(Auth::user()))
                            @if (Auth::user()->role == 1 )
                                <span class="fs-12 mb-0 p-1 fw-bold text-white bg bg-success rounded">Super Admin</span>
                            @endif
                        @endif

                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @if (Auth::user()->role == 1)
                        <a href="{{ route('admin.my_profile.index') }}" class="dropdown-item ai-icon">
                            <svg id="icon-user1" xmlns="{{ url('http://www.w3.org/2000/svg') }}" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span class="ml-2">Profil </span>
                        </a>
                    @elseif (Auth::user()->role == 2)
                        <a href="{{ route('petugas.my_profile.index') }}" class="dropdown-item ai-icon">
                            <svg id="icon-user1" xmlns="{{ url('http://www.w3.org/2000/svg') }}" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span class="ml-2">Profil</span>
                        </a>
                    @elseif(Auth::user()->role == 3)
                        <a href="{{ route('customer.my_profile.index') }}" class="dropdown-item ai-icon">
                            <svg id="icon-user1" xmlns="{{ url('http://www.w3.org/2000/svg') }}" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span class="ml-2">Profil </span>
                        </a>
                    @endif

                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();" class="dropdown-item ai-icon">
                        <svg id="icon-logout" xmlns="{{ url('http://www.w3.org/2000/svg') }}" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        <span class="ml-2">Keluar </span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" id="logout">
                        @csrf
                        @method('POST')
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>


