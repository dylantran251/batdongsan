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
                <div class="top-menu__title text-base">Tổng quan</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="top-menu">
                <div class="top-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" viewBox="0 0 512 512" xml:space="preserve" width="24px" height="24px" fill="#000000" stroke="#000000" class="mdl-js"><script xmlns="" async="false" type="text/javascript" src="chrome-extension://fnjhmkhhmkbjkkabndcnnogagogbneec/in-page.js"/>
                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                        <g id="SVGRepo_iconCarrier"> 
                            <style type="text/css"> .st0{fill:#fdfcfc;} </style> 
                            <g> 
                                <path class="st0" d="M497.946,86.465c-7.768,0-14.055,6.285-14.055,14.054v312.41c-0.012,11.282-9.127,20.368-20.368,20.382H48.477 c-11.241-0.014-20.355-9.1-20.368-20.382V85.668L62.01,99.71c3.416,1.414,7.342,1.414,10.76,0l47.97-19.86l47.955,19.86 c3.417,1.414,7.342,1.414,10.76,0l47.941-19.86l47.943,19.86c3.416,1.414,7.329,1.414,10.746,0l48.01-19.86l48.052,19.86 c3.417,1.414,7.315,1.414,10.734,0l33.996-14.054v296.173c0,7.768,6.286,14.054,14.054,14.054s14.054-6.286,14.054-14.054V64.641 c0-4.693-2.333-9.072-6.244-11.679c-3.899-2.621-8.839-3.116-13.176-1.304l-48.052,19.86l-48.051-19.86 c-3.418-1.426-7.316-1.426-10.734,0l-48.01,19.846l-47.941-19.846c-3.418-1.426-7.344-1.426-10.762,0l-47.942,19.846L126.12,51.658 c-3.432-1.426-7.344-1.426-10.76,0L67.39,71.504L19.434,51.658c-4.351-1.798-9.279-1.317-13.19,1.29 C2.333,55.569,0,59.948,0,64.641V412.93c0,26.791,21.699,48.477,48.477,48.491h415.046c26.778-0.014,48.477-21.7,48.477-48.491 V100.52C512,92.75,505.701,86.465,497.946,86.465z"/> <path class="st0" d="M81.197,166.757v125.612H211.97V166.757H81.197z M189.488,269.888h-85.81v-80.649h85.81V269.888z"/> 
                                <rect x="260.351" y="166.564" class="st0" width="111.763" height="22.482"/> 
                                <rect x="260.351" y="222.673" class="st0" width="111.763" height="22.482"/> 
                                <rect x="260.351" y="278.808" class="st0" width="111.763" height="22.482"/> 
                                <rect x="81.197" y="334.916" class="st0" width="290.917" height="22.482"/> 
                            </g> 
                        </g>
                    </svg>
                </div>
                <div class="top-menu__title text-base text-base">
                    Bài đăng
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down top-menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
            </a>
            <ul class="top-menu__sub-open text-base">
                <li>
                    <a href="{{ route('admin.posts.index') }}" class="top-menu text-base">Danh sách </a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.create') }}" class="top-menu text-base">Thêm mới</a>
                </li>
                <li>
                    <a href="" class="top-menu text-base">Chờ duyện</a>
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
                <div class="top-menu__title text-base">
                    Tin tức
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down top-menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
            </a>
            <ul class=" text-base">
                <li>
                    <a href="{{ route('admin.news.index') }}" class="top-menu text-base">Danh sách </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.create') }}" class="top-menu text-base">Thêm mới</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}" class="top-menu">
                <div class="top-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" icon-name="layers" data-lucide="layers" class="lucide lucide-layers block mx-auto">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>
                </div>
                <div class="top-menu__title text-base">Danh mục</div>
            </a>
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
                <div class="top-menu__title text-base">Người dùng</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="top-menu">
                <div class="top-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="">
                        <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                        </path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </div>
                <div class="top-menu__title text-base">
                    Cấu hình SEO
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down top-menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
            </a>
            <ul class=" text-base">
                <li>
                    <a href="#" class="top-menu text-base">Danh mục </a>
                </li>
                <li>
                    <a href="#" class="top-menu text-base">Thêm mới</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- END: Top Menu -->
