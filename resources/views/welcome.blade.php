<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Books</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Books
                </div>
                <!--Section: Contact v.2-->
                <section class="mb-4">
                    <p class="text-center w-responsive mx-auto mb-1">Upload your file here.</p>
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-2">
                            <form id="contact-form" name="contact-form" action="{{route('importBookData')}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <input type="file" id="books-data-file" name="books-data-file" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center text-md-center">
                                <a class="btn btn-primary" style="color:#ffffff" onclick="document.getElementById('contact-form').submit();">Import</a>
                            </div>
                            <div class="status"></div>
                        </div>
                        <!--Grid column-->
                    </div>

                </section>
                <!--Section: Contact v.2-->
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            {{$dataTable->table()}}
                        </div>
                    </div>
                </section>




            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        @stack('scripts')
        {{$dataTable->scripts()}}
    </body>
</html>
