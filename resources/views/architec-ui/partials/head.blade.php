<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


    <meta name="app-locale" content="{{ App::getLocale() }}">
    <link rel="icon" type="image/icon" href="{{asset('/favicon.ico')}}"/>


<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}</title>

    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />


    <meta name="description" content="">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('admin-form/admin-forms.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('architec-ui/css/base.css')}}">

    <!-- Kendo Grid CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('kendo/css/kendo.common.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kendo/css/kendo.dataviz.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kendo/css/kendo.bootstrap.css') }}">
    <style>
        @media (min-width: 992px) {
            .modal-lg {
                max-width: 80%;
            }
        }

        .select2.select2-container{
            width: 100%;
        }
        .select2-selection.state-error {
            background: #fee9ea;
            border: 1px solid #de888a;
        }

        .select2-selection.state-success {
            background: #F0FEE9;
            border-color: #A5D491;
        }

        .select2-container span.selection .select2-selection.state-error {
            border: 1px solid #de888a;
        }

        span.twitter-typeahead .tt-menu,
        span.twitter-typeahead .tt-dropdown-menu {
            cursor: pointer;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            list-style: none;
            font-size: 14px;
            text-align: left;
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            background-clip: padding-box;
        }
        span.twitter-typeahead .tt-suggestion {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: normal;
            line-height: 1.42857143;
            color: #333333;
            white-space: nowrap;
        }
        span.twitter-typeahead .tt-suggestion.tt-cursor,
        span.twitter-typeahead .tt-suggestion:hover,
        span.twitter-typeahead .tt-suggestion:focus {
            color: #ffffff;
            text-decoration: none;
            outline: 0;
            background-color: #3f6ad8;
        }
        .input-group.input-group-lg span.twitter-typeahead .form-control {
            height: 46px;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
        }
        .input-group.input-group-sm span.twitter-typeahead .form-control {
            height: 30px;
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
        span.twitter-typeahead {
            width: 100%;
        }
        .input-group span.twitter-typeahead {
            display: block !important;
            height: 34px;
        }
        .input-group span.twitter-typeahead .tt-menu,
        .input-group span.twitter-typeahead .tt-dropdown-menu {
            top: 32px !important;
        }
        .input-group span.twitter-typeahead:not(:first-child):not(:last-child) .form-control {
            border-radius: 0;
        }
        .input-group span.twitter-typeahead:first-child .form-control {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .input-group span.twitter-typeahead:last-child .form-control {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .input-group.input-group-sm span.twitter-typeahead {
            height: 30px;
        }
        .input-group.input-group-sm span.twitter-typeahead .tt-menu,
        .input-group.input-group-sm span.twitter-typeahead .tt-dropdown-menu {
            top: 30px !important;
        }
        .input-group.input-group-lg span.twitter-typeahead {
            height: 46px;
        }
        .input-group.input-group-lg span.twitter-typeahead .tt-menu,
        .input-group.input-group-lg span.twitter-typeahead .tt-dropdown-menu {
            top: 46px !important;
        }
    </style>
</head>
