<div class="flex items-center justify-between">
    <p>Hiện có {{ $postsCount }} bất động sản</p>
    <select class="px-4 py-2 border rounded" id="choose-sort-by" >
        <option value="0" >Thông thường</option>
        @foreach (config('filter_params.orderBy') as $key => $value)
            <option value="{{ (request('sort_by') && request('sort_by') === $key) ? request('sort_by') : $key }}"
            {{ (request('sort_by') && $key == request('sort_by')) ? 'selected' : '' }}
            >{{ $value }}</option>
        @endforeach
    </select>
</div>