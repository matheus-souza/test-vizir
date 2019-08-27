<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <i class="fa fa-codepen" aria-hidden="true"></i>
                Teste Vizir
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3 ml-3 mr-3" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-6 mt-5">
                    <form class="form-inline">
                        <div class="form-group col-12">
                            <label for="origem">Origem</label>
                            <select id="origem" class="form-control mx-sm-3 col-8">
                                <option>Select padrão</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-6 mt-5">
                    <form class="form-inline">
                        <div class="form-group col-12">
                            <label for="destino">Destino</label>
                            <select id="destino" class="form-control mx-sm-3 col-8">
                                <option>Select padrão</option>
                            </select>
                        </div>
                    </form>
                </div>


            </div>
        </div>

        <div class="container">

            <hr>

            <footer>
                <p>&copy; Matheus Henrique de Souza 2019</p>
            </footer>
        </div>

    </body>
</html>
