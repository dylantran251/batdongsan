@if(request('price-range'))
    <input type="text" name="price-range" value="{{ request('price-range') }}">
@endif

@if(request('area-range'))
    <input type="text" name="area-range" value="{{ request('area-range') }}">
@endif

@if(request('location'))
    <input type="text" name="location" value="{{ request('location') }}">
@endif

@if(request('bedroom'))
    @foreach (request('bedroom') as $value)
        <input type="text" name="bedroom[]" value="{{ $value }}">
    @endforeach
@endif

@if(request('toilet'))
    @foreach (request('toilet') as $value)
        <input type="text" name="toilet[]" value="{{ $value }}">
    @endforeach
@endif

@if(request('house-direction'))
    @foreach (request('house-direction') as $value)
        <input type="text" name="house-direction[]" value="{{ $value }}">
    @endforeach
@endif

@if(request('sort_by'))
    <input type="text" name="sort_by" value="{{ request('sort_by') }}">
@endif

