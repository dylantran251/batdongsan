@extends('frontend.layout.app')

@section('content')
<body>
    {{-- Header --}}
    @include('frontend.layout.header')
   

         {{-- Navigation --}}
    @include('frontend.layout.navbar') 

       
    {{-- Content --}}
    @yield('subcontent')   
    {{-- Footer --}}
    @include('frontend.layout.footer.index')     
</body>
@endsection