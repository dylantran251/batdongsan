
<div id="search" class="opacity-100 {{ $style == 0 ? 'lg:flex lg:justify-between lg:items-center gap-4 items-end text-white' : 'flex items-center w-full xl:w-3/5 text-[14px]' }}">
    {{-- Location filter attribute --}}
    @if ($style != 0)
        <div class="w-full border-r">
            @include('frontend.search_attributes.components.real_estate_types', ['style' => $style])
        </div>
    @endif
    <div class="w-full">
        @include('frontend.search_attributes.components.location_attribute', ['style' => $style])
    </div>
    {{-- Price filter attribute --}}
    <div class="w-full ">
        @include('frontend.search_attributes.components.price_attribute', ['style' => $style])
    </div>
    {{-- Area filter attribute --}}
    <div class="w-full">
        @include('frontend.search_attributes.components.area_attribute', ['style' => $style])
    </div>
    {{-- Filter more --}}
    <div class="{{ $style == 0 ? 'w-full' : 'w-auto' }}  ">
        @include('frontend.search_attributes.components.more_attribute', ['style' => $style])
    </div>
    {{--  --}}
    <div class="w-fit h-full">
        @include('frontend.search_attributes.components.button_reset_attributes')
    </div>
</div>

