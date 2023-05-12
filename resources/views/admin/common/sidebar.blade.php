<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="/theme-admin/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{Auth::user() -> name}}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="/admin/permission" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>All Permission</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/role" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>All Role</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/user" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>All User</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/website" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>All Website</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/layout" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>All Layout</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/websiteType" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Website type</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/listingType" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Listing type</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>