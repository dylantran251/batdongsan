<nav id="navbar_menu" class="p-4 text-xl bg-white shadow sticky top-[0] right-0 left-0 z-[998] font-bold">
    <div class="relative flex justify-center items-center mx-5 lg:justify-between xl:container xl:mx-auto xl:px-20">
        <a href="{{ route('home') }}" class="flex items-center justify-center w-full lg:w-auto">
            <img src="{{asset('images/web/logo.png')}}" class="object-fill" alt="">
        </a>
        <button onclick="toggleNavbarMobile()" data-collapse-toggle="navbar-default" type="button" class="absolute right-[1%] top-[10%] w-auto h-[80%] flex items-center p-2 text-base text-black rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden z-30 lg:block lg:w-auto">
            <ul class="flex flex-col items-center p-4 text-black text-base mt-4 lg:p-0 lg:flex-row lg:space-x-5 xl:space-x-8 lg:mt-0 lg:border-0 lg:bg-white ">
                {{-- @foreach(session('menuSession') as $item) --}}
                    @foreach ($menus as $menu)
                        <li>
                            <a href="{{route('loadPage', ['category_name' => $menu['name']])}}" data-menu-id="{{ $menu['id'] }}"
                                class="nav-menu block py-2 pl-3 pr-4 rounded lg:bg-transparent lg:p-0 hover:underline text-[16px] normal-case
                                {{ (request('category_name') && request('category_name') === $menu['name']) || 
                                isset($post) && $post->category->name === $menu['name'] ? 'text-[#dc2d27] underline' : ''}}" 
                                aria-current="page">
                                {{ $menu['name'] }}
                            </a>
                        </li>
                    @endforeach
                    {{-- @if ($item['count'] > 5)
                        <li class="flex items-center lg:block">
                            <button type="button" class="hover:underline" onclick="toggleMenus()">
                                <span>
                                    <svg width="18" height="5" viewBox="0 0 18 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.00008 4.36301C10.0455 4.36301 10.8334 3.46419 10.8334 2.4315C10.8334 1.39881 10.0455 0.5 9.00008 0.5C7.9547 0.5 7.16675 1.39881 7.16675 2.4315C7.16675 3.46419 7.9547 4.36301 9.00008 4.36301Z" stroke="#EB5757" stroke-linecap="round"/>
                                        <path d="M2.33333 4.36301C3.37872 4.36301 4.16667 3.46419 4.16667 2.4315C4.16667 1.39881 3.37872 0.5 2.33333 0.5C1.28795 0.5 0.5 1.39881 0.5 2.4315C0.5 3.46419 1.28795 4.36301 2.33333 4.36301Z" stroke="#EB5757" stroke-linecap="round"/>
                                        <path d="M15.6666 4.36301C16.712 4.36301 17.4999 3.46419 17.4999 2.4315C17.4999 1.39881 16.712 0.5 15.6666 0.5C14.6212 0.5 13.8333 1.39881 13.8333 2.4315C13.8333 3.46419 14.6212 4.36301 15.6666 4.36301Z" stroke="#EB5757" stroke-linecap="round"/>
                                    </svg>
                                </span>
                            </button>
                            <div id="dropdownContentMenus" class="hidden right-0 p-6 absolute right-0 mt-6 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <div class="py-1" role="none">
                                    @foreach ($item['nextMenus'] as $menu)
                                        <a href="{{route('loadPage', ['categoryID' => $menu['id']])}}" data-menu-id="{{ $menu['id'] }}"
                                            class="nav-menu block py-2 pl-3 pr-4 rounded lg:bg-transparent lg:p-0 hover:underline text-base normal-case" aria-current="page">
                                            {{ $menu['name'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endif --}}
                {{-- @endforeach --}}
            </ul>
        </div>
    </div>
</nav>

{{-- navbar mobile --}}
@include('frontend.layout.components.navbar_mobile')

@push('scripts')
    <script>
        function toggleNavbarMobile(){
            event.stopPropagation();
            const mobileMenu = document.getElementById('navbar_mobile');
            mobileMenu.classList.toggle('hidden');
        }
        function toggleMenus(){
            document.querySelector('#dropdownContentMenus').classList.toggle('hidden')
        }
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.querySelector('[data-collapse-toggle="navbar-default"]');
            const mobileMenu = document.getElementById('navbar_mobile');
            document.addEventListener('click', function (event) {
                if (!mobileMenu.contains(event.target) && event.target !== toggleButton) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>    
@endpush


