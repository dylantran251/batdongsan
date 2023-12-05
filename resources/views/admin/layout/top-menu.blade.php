<!-- BEGIN: Top Menu -->
<nav class="top-nav mt-2">
    <ul class="text-lg font-medium">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="top-menu top-menu__title">
                <div class="top-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" icon-name="aperture" data-lucide="aperture" class="lucide lucide-aperture block mx-auto">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                        <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                        <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                        <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                        <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                        <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                    </svg>
                </div>
                <div class="top-menu__title">Tổng quan</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="top-menu">
                <div class="top-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" icon-name="layers" data-lucide="layers" class="lucide lucide-layers block mx-auto">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>
                </div>
                <div class="top-menu__title">
                    Bài đăng
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down top-menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
            </a>
            <ul class="top-menu__sub-open">
                <li>
                    <a href="{{ route('admin.posts.index', ['type'=> 1]) }}" class="top-menu">Danh sách </a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.create', ['type' => 1]) }}" class="top-menu">Thêm mới</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="top-menu">
                <div class="top-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" icon-name="edit" data-lucide="edit" class="lucide lucide-edit block mx-auto">
                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                </div>
                <div class="top-menu__title">
                    Tin tức
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down top-menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
            </a>
            <ul class="top-menu__sub-open">
                <li>
                    <a href="{{ route('admin.posts.index', ['type' => 0]) }}" class="top-menu">Danh sách </a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.create', ['type' => 0]) }}" class="top-menu">Thêm mới</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}" class="top-menu">
                <div class="top-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" icon-name="users" data-lucide="users" class="lucide lucide-users block mx-auto">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 010 7.75"></path>
                    </svg>
                </div>
                <div class="top-menu__title">Người dùng</div>
            </a>
        </li>
    </ul>
</nav>
<!-- END: Top Menu -->
