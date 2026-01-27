<!DOCTYPE html>
<html lang="en">

@include('theme.partials.head')



<body class="is-preload">

    <div id="wrapper">
        <div id="main">
            <div class="inner">
                @include('theme.partials.header')

                @yield('content')
            </div>
        </div>

        @include('theme.partials.sidebar')

    </div>

    @include('theme.partials.scripts')
</body>


</html>