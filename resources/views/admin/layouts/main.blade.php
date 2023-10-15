<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Sabit Ahmad">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href={{asset('admin/assets/images/jsTree/40px.png')}}g">
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->

    @stack('top_css')
    {{-- Icon --}}
    <link rel="stylesheet" href="{{asset('admin/assets/css/libs/fontawesome-icons.css?ver=3.2.3')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/libs/themify-icons.css?ver=3.2.3')}}">
    {{-- Icon --}}
    <link rel="stylesheet" href="{{asset('admin/assets/css/dashlite.css?ver=3.2.3')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('admin/assets/css/theme.css?ver=3.2.3')}}">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        @include('admin.partials.sidebar')
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            @include('admin.partials.header')
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title page-title">@yield('head_title')</h4>
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->

                            @yield('content')
                            <!-- .nk-block -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- content @e -->
            <!-- footer @s -->
            @include('admin.partials.footer')
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{asset('admin/assets/js/bundle.js?ver=3.2.3')}}"></script>
<script src="{{asset('admin/assets/js/scripts.js?ver=3.2.3')}}"></script>

<script>
    (function(NioApp, $){
        'use strict';

        @if(session('success'))
            NioApp.Toast('{{session('success')}}', 'success', {position: 'top-right'});
        @elseif(session('error'))
            NioApp.Toast('{{session('error')}}', 'error', {position: 'top-right'});
        @elseif(session('info'))
            NioApp.Toast('{{session('info')}}', 'info', {position: 'top-right'});
        @endif

    })(NioApp, jQuery);
</script>

@if($errors->any())

    <script>
        @foreach($errors->all() as $error)


        (function(NioApp, $){
            'use strict';

            NioApp.Toast('{{$error}}', 'error', {position: 'bottom-right'});

        })(NioApp, jQuery);


        @endforeach
    </script>

@endif

@stack('bottom_js')


</body>

</html>
