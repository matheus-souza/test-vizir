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

        @if($mensagem = Session::get('success'))
            <div id="modalResultado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Modal dados da chamada" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TituloModalCentralizado">Dados da chamada</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Origem</th>
                                        <th scope="col">Destino</th>
                                        <th scope="col">Tempo</th>
                                        <th scope="col">Plano FaleMais</th>
                                        <th scope="col">Com FaleMais</th>
                                        <th scope="col">Sem FaleMais</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $mensagem['origem'] }}</td>
                                        <td>{{ $mensagem['destino'] }}</td>
                                        <td>{{ $mensagem['tempo'] }}</td>
                                        <td>{{ $mensagem['plano'] }}</td>
                                        <td>$ {{ number_format($mensagem['valor_com_plano'], 2, ',', '.') }}</td>
                                        <td>$ {{ number_format($mensagem['valor_sem_plano'], 2, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer align-items-center">
                            <button type="button" class="btn btn-dark mr-auto ml-auto" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif



        <div class="container">
            <form class="col-12" action="{{ route('valorchamada') }}" method="POST">
                @csrf

                <div class="row mt-5">
                    <div class="col-3 d-inline-flex">
                        <label class="my-1 mr-2" for="origem">Origem</label>
                        <select class="col-10" name="origem">
                            @foreach($origens as $origem)
                                <option value="{{ $origem }}">{{ $origem }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3 d-inline-flex">
                        <label class="my-1 mr-2" for="destino">Destino</label>
                        <select class="col-10" name="destino">
                            @foreach($destinos as $destino)
                                <option value="{{ $destino }}">{{ $destino }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-2 d-inline-flex" style="height: 28px">
                        <label class="my-1 mr-2" for="tempo">Tempo</label>
                        <input class="form-control col-8 h-100" type="time" name="tempo" style="border: 1px solid #aaa" required>
                    </div>

                    <div class="col-3 d-inline-flex">
                        <label class="my-1 mr-2" for="plano">Plano</label>
                        <select class="col-10" name="plano" value="{{ old('plano') }}">
                            @foreach($planos as $id => $plano)
                                <option value="{{ $id }}">{{ $plano }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary my-1 btn-lg">Calcular</button>
                </div>
            </form>
        </div>

        <div class="container fixed-bottom">
            <hr>
            <footer>
                <p>&copy; Matheus Henrique de Souza 2019</p>
            </footer>
        </div>
    </body>
</html>
