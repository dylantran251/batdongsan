<form class="form-search" action="{{ route('search', ['category_name' => $post->category->name]) }}">
    @include('frontend.layout.search_bar')   
    @include('frontend.search_attributes.components.check_request')
</form>