<div class="flex items-center justify-between mb-6">
    <p class="text-[15px]">Hiện có {{ $postsCount }} bất động sản</p>
    <select class="py-2 border rounded" id="choose-sort-by" >
        <option value="0" >Thông thường</option>
        @foreach (config('filter_params.orderBy') as $key => $value)
            <option value="{{ (request('sort_by') && request('sort_by') === $key) ? request('sort_by') : $key }}"
            {{ (request('sort_by') && $key == request('sort_by')) ? 'selected' : '' }}
            >{{ $value }}</option>
        @endforeach
    </select>
</div>