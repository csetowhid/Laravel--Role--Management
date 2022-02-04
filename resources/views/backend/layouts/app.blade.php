<!doctype html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="images/DB_16х16.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Multi Role Management')</title>

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">


    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('backend/css/lib/getmdl-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/lib/nv.d3.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/application.min.css')}}">
    <!-- endinject -->

</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer"></div>
            <!-- Search-->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                    <i class="material-icons">search</i>
                </label>

                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search"/>
                    <label class="mdl-textfield__label" for="search">Enter your query...</label>
                </div>
            </div>

            <div class="avatar-dropdown" id="icon">
                <span>Luke</span>
                <img src="{{asset('backend/images/Icon_header.png')}}">
            </div>
            <!-- Account dropdawn-->
            <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
                for="icon">
                <li class="mdl-list__item mdl-list__item--two-line">
                    <span class="mdl-list__item-primary-content">
                        <span class="material-icons mdl-list__item-avatar"></span>
                        <span>Luke</span>
                        <span class="mdl-list__item-sub-title">Luke@skywalker.com</span>
                    </span>
                </li>
                <li class="list__item--border-top"></li>
                <li class="mdl-menu__item mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">account_circle</i>
                        My account
                    </span>
                </li>
                <li class="mdl-menu__item mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">check_box</i>
                        My tasks
                    </span>
                    <span class="mdl-list__item-secondary-content">
                      <span class="label background-color--primary">3 new</span>
                    </span>
                </li>
                <li class="mdl-menu__item mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">perm_contact_calendar</i>
                        My events
                    </span>
                </li>
                <li class="list__item--border-top"></li>
                <li class="mdl-menu__item mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">settings</i>
                        Settings
                    </span>
                </li>
                <a href="login.html">
                    <li class="mdl-menu__item mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
                            Log out
                        </span>
                    </li>
                </a>
            </ul>

        </div>
    </header>

    <div class="mdl-layout__drawer">
        <header>darkboard</header>
        <div class="scroll__wrapper" id="scroll__wrapper">
            <div class="scroller" id="scroller">
                <div class="scroll__container" id="scroll__container">
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link mdl-navigation__link--current" href="index.html">
                            <i class="material-icons" role="presentation">dashboard</i>
                            Dashboard
                        </a>
                        <div class="sub-navigation">
                            <a class="mdl-navigation__link">
                                <i class="material-icons">view_comfy</i>
                                UI
                                <i class="material-icons">keyboard_arrow_down</i>
                            </a>
                            <div class="mdl-navigation">
                                <a class="mdl-navigation__link" href="ui-buttons.html">
                                    Buttons
                                </a>
                                <a class="mdl-navigation__link" href="ui-cards.html">
                                    Cards
                                </a>
                                <a class="mdl-navigation__link" href="ui-colors.html">
                                    Colors
                                </a>
                                <a class="mdl-navigation__link" href="ui-form-components.html">
                                    Forms
                                </a>
                                <a class="mdl-navigation__link" href="ui-icons.html">
                                    Icons
                                </a>
                                <a class="mdl-navigation__link" href="ui-typography.html">
                                    Typography
                                </a>
                                <a class="mdl-navigation__link" href="ui-tables.html">
                                    Tables
                                </a>
                            </div>
                        </div>
                        <a class="mdl-navigation__link" href="{{route('roles.index')}}">
                            <i class="material-icons">developer_board</i>
                            Roles
                        </a>
                        <a class="mdl-navigation__link" href="forms.html">
                            <i class="material-icons" role="presentation">person</i>
                            Account
                        </a>
                        <a class="mdl-navigation__link" href="maps.html">
                            <i class="material-icons" role="presentation">map</i>
                            Maps
                        </a>
                        <a class="mdl-navigation__link" href="charts.html">
                            <i class="material-icons">multiline_chart</i>
                            Charts
                        </a>
                        <div class="sub-navigation">
                            <a class="mdl-navigation__link">
                                <i class="material-icons">pages</i>
                                Pages
                                <i class="material-icons">keyboard_arrow_down</i>
                            </a>
                            <div class="mdl-navigation">
                                <a class="mdl-navigation__link" href="login.html">
                                    Sign in
                                </a>
                                <a class="mdl-navigation__link" href="sign-up.html">
                                    Sign up
                                </a>
                                <a class="mdl-navigation__link" href="forgot-password.html">
                                    Forgot password
                                </a>
                                <a class="mdl-navigation__link" href="404.html">
                                    404
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class='scroller__bar' id="scroller__bar"></div>
        </div>
    </div>

    <main class="mdl-layout__content">
        @yield('content')
    </main>

</div>

<!-- inject:js -->
<script src="{{asset('backend/js/d3.min.js')}}"></script>
<script src="{{asset('backend/js/getmdl-select.min.js')}}"></script>
<script src="{{asset('backend/js/material.min.js')}}"></script>
<script src="{{asset('backend/js/nv.d3.min.js')}}"></script>
<script src="{{asset('backend/js/layout/layout.min.js')}}"></script>
<script src="{{asset('backend/js/scroll/scroll.min.js')}}"></script>
<script src="{{asset('backend/js/widgets/charts/discreteBarChart.min.js')}}"></script>
<script src="{{asset('backend/js/widgets/charts/linePlusBarChart.min.js')}}"></script>
<script src="{{asset('backend/js/widgets/charts/stackedBarChart.min.js')}}"></script>
<script src="{{asset('backend/js/widgets/employer-form/employer-form.min.js')}}"></script>
<script src="{{asset('backend/js/widgets/line-chart/line-charts-nvd3.min.js')}}"></script>
<script src="{{asset('backend/js/widgets/map/maps.min.js')}}"></script>
<script src="{{asset('backend/js/widgets/pie-chart/pie-charts-nvd3.min.js')}}"></script>
<script src="{{asset('backend/js/widgets/table/table.min.js')}}"></script>
<script src="{{asset('backend/js/widgets/todo/todo.min.js')}}"></script>
<!-- endinject -->

</body>
</html>
