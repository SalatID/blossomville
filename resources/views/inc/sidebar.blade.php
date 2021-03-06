@if(session()->get('userData')['verified']==1)
<ul class="navbar-nav bg-default sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin" >
        <div class="sidebar-brand-icon">
            <img src="{{ asset('/login/images/blossom-logo.png') }}" class="img-fluid" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Blossom Ville </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    {{-- <li class="nav-item {{ explode('/', url()->current())[3] == 'greeting' ? 'active' : '' }}">
        <a class="nav-link" href="/greeting">
            <i class="fas fa-fw icon-2-5vw fa-home"></i>
            <span>Home</span></a>
    </li> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ explode('/', url()->current())[3] == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw icon-2-5vw fa-chart-area"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @if (session()->get('userData')['level'] !=3)
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ explode('/', url()->current())[3] == 'rt/datawarga' ? 'active' : '' }}">
        <a class="nav-link " href="/admin/rt/datawarga">
            <i class="fas fa-fw icon-2-5vw fa-list"></i>
            <span>Data Warga</span>
        </a>
    </li>
    @endif

    <li class="nav-item {{ explode('/', url()->current())[3] == 'report' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-info-warga"
        aria-expanded="true" aria-controls="collapse-info-warga">
            <i class="fas fa-fw icon-2-5vw fa-info-circle"></i>
            <span>Info Warga</span>
        </a>
        <div id="collapse-info-warga" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Info Warga</h6>
                        @if (session()->get('userData')['level'] != 3)
                        <a class="collapse-item" href="/admin/berita">Berita</a>
                        <a class="collapse-item" href="/admin/aktifitas">Aktifitas</a>
                        @endif
                        <a class="collapse-item" href="/admin/testimoni">Testimoni</a>
                        <a class="collapse-item" href="/admin/usaha">Usaha Warga</a>
                    </div>
                </div>
    </li>
    {{-- @if (session()->get('userData')['level'] !=3) --}}
    <li class="nav-item {{ explode('/', url()->current())[3] == 'request' ? 'active' : '' }}">
        <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapse-surat"
        aria-expanded="true" aria-controls="collapse-surat">
            <i class="fas fa-fw icon-2-5vw fa-file-word"></i>
            <span>Surat Menyurat</span>
        </a>
        <div id="collapse-surat" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Surat Menyurat</h6>
                        {{-- <a class="collapse-item" href="/admin/surat/daftar/permohonan">Daftar Permohonan</a>
                        <a class="collapse-item" href="/admin/surat/ajukan">Ajukan Permohonan Surat</a> --}}
                        {{-- @if (session()->get('userData')['level'] != 3) --}}
                        <a class="collapse-item" href="/admin/surat/daftar">Permohonan Surat</a>
                        {{-- @endif --}}
                    </div>
                </div>
    </li>
    {{-- @endif --}}
    @if (session()->get('userData')['level'] == 0)
    <li class="nav-item {{ explode('/', url()->current())[3] == 'request' ? 'active' : '' }}">
        <a class="nav-link " href="/admin/sitesetting">
            <i class="fas fa-fw icon-2-5vw fa-cog"></i>
            <span>Site Setting</span>
        </a>
    </li>
    <li class="nav-item {{ explode('/', url()->current())[3] == 'request' ? 'active' : '' }}">
        <a class="nav-link " href="/admin/logprogram">
            <i class="fas fa-history icon-2-5vw fa-cog"></i>
            <span>Log Program</span>
        </a>
    </li>
    @endif
    {{-- <li class="nav-item">
                <a class="nav-link" href="/user/list" >
                    <i class="fas fa-fw icon-2-5vw fa-user-circle"></i>
                    <span>Admin</span>
                </a>
            </li> --}}
    {{-- @if (session()->get('userData')['level'] == 0)
        <li
            class="nav-item {{ explode('/', url()->current())[3] == 'user' || explode('/', url()->current())[3] == 'category' ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw icon-2-5vw fa-user-circle"></i>
                <span>Admin</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/user/list">User</a>
                    <a class="collapse-item" href="/category">Category</a>
                </div>
            </div>
        </li>
    @endif --}}
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

</ul>

@endif
