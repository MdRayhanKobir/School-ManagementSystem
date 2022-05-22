<!DOCTYPE html>
<html lang="en">
  <head>
      {{-- all meta file --}}
   @include('admin.includes.meta')

    <title>@yield('title')</title>

    {{-- all css file --}}
	@include('admin.includes.css')

  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

 {{-- header file --}}
    @include('admin.includes.header')


 {{-- left sidebar --}}
    @include('admin.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
    @yield('content')

  {{-- footer  --}}
    @include('admin.includes.footer')

{{-- right sidebar --}}
    @include('admin.includes.right-sidebar')
  
</div>
<!-- ./wrapper -->

{{-- all js file --}}
    @include('admin.includes.js')

</body>
</html>
