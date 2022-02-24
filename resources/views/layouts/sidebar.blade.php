<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('assets/img/catmate/logo.svg')}}" alt="..." class="avatar-img " style="width: 47px">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Admin Catmate
                            <span class="user-level">Tupaitech</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a  href="{{route('dashboard')}}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>  
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Encyclopedia Category</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('encyclopedia.category.table')}}">
                                    <span class="sub-item">Table</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('encyclopedia.category.add')}}">
                                    <span class="sub-item">Add</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#encyclopedia">
                        <i class="fas fa-layer-group"></i>
                        <p>Encyclopedia</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="encyclopedia">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('encyclopedia.table')}}">
                                    <span class="sub-item">Table</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('encyclopedia.add')}}">
                                    <span class="sub-item">Add</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#admin">
                        <i class="fas fa-user"></i>
                        <p>Admin</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="admin">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('admin.table')}}">
                                    <span class="sub-item">Table</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.add')}}">
                                    <span class="sub-item">Add</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item logout">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item" style="cursor:pointer;"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> <span> Logout</span></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->