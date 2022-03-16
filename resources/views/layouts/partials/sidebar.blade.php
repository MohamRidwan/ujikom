<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="{{ asset('img/user.png') }}" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="{{ Request::is('home')? "active":"" }}"><a href="/home"><em class="fa fa-dashboard color-blue" >&nbsp;</em><b> Dashboard</b></a></li>
        <li class="{{ Request::is('supplier')? "active":"" }}"><a href="/pengadaanbarang/supplier"><em class="fa fa-users color-blue">&nbsp;</em><b> Supplier </b></a></li>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
            <em class="fa fa-archive color-blue">&nbsp;</em><b> Barang </b><span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus color-blue"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li class="{{ Request::is('satuan')? "active":"" }}"><a href="/pengadaanbarang/satuan">
                    <span class="fa fa-angle-right">&nbsp;</span> Satuan Barang
                </a></li>
                <li class="{{ Request::is('jenis')? "active":"" }}"><a href="/pengadaanbarang/jenis">
                    <span class="fa fa-angle-right">&nbsp;</span> Jenis Barang
                </a></li>
                <li class="{{ Request::is('barang')? "active":"" }}"><a href="/pengadaanbarang/barang">
                    <span class="fa fa-angle-right">&nbsp;</span> Data Barang
                </a></li>
            </ul>
        </li>
        <li class="{{ Request::is('barang-masuk')? "active":"" }}"><a href="/pengadaanbarang/barang-masuk" ><em class="fa fa-download color-blue">&nbsp;</em> <b> Barang Masuk </b></a></li>
        <li  class="{{ Request::is('barang-keluar')? "active":"" }}"><a href="/pengadaanbarang/barang-keluar"><em class="fa fa-upload color-blue">&nbsp;</em> <b> Barang Keluar </b></a></li>
        <li  class="{{ Request::is('transaksi')? "active":"" }}"><a href="/pengadaanbarang/transaksi"><em > <i class="fa fa-file-text color-blue"></i> &nbsp;</em> <b> Laporan </b></a></li>
        <li  class="{{ Request::is('cetak-laporan')? "active":"" }}"><a href="/pengadaanbarang/cetak-laporan"><em class="fa fa-print color-blue">&nbsp;</em> <b> Cetak Laporan </b></a></li>
        @role('admin')
        <li  class="{{ Request::is('user-management')? "active":"" }}"><a href="/pengadaanbarang/user-management"><em class="fa fa-user color-blue">&nbsp;</em> <b> User Management </b></a></li>
        @endrole
        <!-- Logout -->
                <li class=""><a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        <span><b> Logout </b></span><em class="fa fa-sign-out color-red">&nbsp;</em> 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <!-- end logout -->
    </ul>
</div><!--/.sidebar-->
