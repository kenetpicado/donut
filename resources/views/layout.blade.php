<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="{{ config('app.name') }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
        @media only screen and (max-width:800px) {

            #no-more-tables tbody,
            #no-more-tables tr,
            #no-more-tables td {
                display: block;
            }

            #no-more-tables thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            #no-more-tables td {
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #fff;
            }

            #no-more-tables td:before {
                content: attr(data-title);
                position: absolute;
                left: 6px;
                font-weight: bold;
            }

            #no-more-tables tr {
                border-bottom: 1px solid #aaaa;
            }
        }
    </style>

</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="justify-content-center">
            <div class="card o-hidden border-1 my-4" style="border-radius: 20px">
                <div class="card-body p-0 pb-5">
                    <div class="p-4">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>
