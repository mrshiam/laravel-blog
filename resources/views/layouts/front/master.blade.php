<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.front._head')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <div class="header-top">
        <div class="container">
            @include('layouts.front._header')
        </div>

        <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

            <div class="container">
                @include('layouts.front._nav')
            </div>

        </div>

    </div>

    @yield('content')

   @include('layouts.front._newsletter')

    <div class="footer">
        @include('layouts.front._footer')
    </div>


</div>
<!-- .site-wrap -->
@include('layouts.front._scripts')

</body>
</html>
