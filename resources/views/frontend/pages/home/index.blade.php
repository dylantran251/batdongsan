@extends('frontend.layout.main')
{{-- Title --}}
@section('title') 
    {{ $title }}
@endsection
{{-- Content --}}
@section('subcontent')
    <div id="homepage">
        {{-- Form search --}}
        @include('frontend.pages.home.components.form_search')

        {{-- News --}}
        @include('frontend.pages.home.components.list_news')

        {{-- Posts --}}
        @include('frontend.pages.home.components.list_posts')
    </div>
@endsection 

