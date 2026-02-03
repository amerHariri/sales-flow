<!DOCTYPE html>
<html lang="en">

@include('theme.partials.head')



<body class="is-preload">

    <div id="wrapper">
        <div id="main">
            <div class="inner">
                @include('theme.partials.header')
                <div style="width: 70%;margin:0 auto">
                    @yield('archive_btn')
                    <h3 class="modal-title" style="margin: 15px 0;">@yield('title')</h3>
                    @yield('content')
                </div>
            </div>
        </div>

        @include('theme.partials.sidebar')

    </div>

    @include('theme.partials.scripts')
</body>


</html>