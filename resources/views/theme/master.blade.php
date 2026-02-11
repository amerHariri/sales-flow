<!DOCTYPE html>
<html lang="en">

@include('theme.partials.head')



<body class="is-preload">

    <div id="wrapper">
        <div id="main">
            <div class="inner">
                @include('theme.partials.header')
                <div class="content">
                    @yield('archive_btn')
                    <h3 class="modal-title text-center" style="font-size:25px;margin: 15px 0 30px 0;">@yield('title')
                    </h3>
                    @yield('content')
                </div>
            </div>
        </div>

        @include('theme.partials.sidebar')

    </div>

    @include('theme.partials.scripts')


    <style>
        .content {
            margin: 0 auto;
            padding: 0;
            /* موبايل افتراضيًا */
        }

        @media (min-width: 768px) {
            .content {
                padding: 0 0rem;
            }
        }

        /* form width responsive */

        .content .form-responsive {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        @media (min-width: 992px) {
            .content .form-responsive {
                width: 60%;
            }
        }
    </style>
</body>


</html>