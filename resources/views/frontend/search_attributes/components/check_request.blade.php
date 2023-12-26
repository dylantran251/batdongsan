@if(request('price-range'))
    <input type="hidden" name="price-range" value="{{ request('price-range') }}">
@endif

@if(request('area-range'))
    <input type="hidden" name="area-range" value="{{ request('area-range') }}">
@endif

@if(request('location'))
    <input type="hidden" name="location" value="{{ request('location') }}">
@endif

@if(request('bedroom'))
    @foreach (request('bedroom') as $value)
        <input type="hidden" name="bedroom[]" value="{{ $value }}">
    @endforeach
@endif

@if(request('toilet'))
    @foreach (request('toilet') as $value)
        <input type="hidden" name="toilet[]" value="{{ $value }}">
    @endforeach
@endif

@if(request('house-direction'))
    @foreach (request('house-direction') as $value)
        <input type="hidden" name="house-direction[]" value="{{ $value }}">
    @endforeach
@endif

@if(request('sort_by'))
    <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
@endif

