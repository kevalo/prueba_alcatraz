<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

        <script type="text/javascript" src="{{ URL::asset('js/form.js') }}"></script>

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <br>
            @if(session()->has('successMsg'))
                <div class="alert alert-success">
                    {{ session()->get('successMsg') }}
                </div>
            @endif

            @if(session()->has('errorMsg'))
                <div class="alert alert-danger">
                    {{ session()->get('errorMsg') }}
                </div>
            @endif

            <br>
           <form class="form-horizontal" id="form" method="post" action="{{ route('saveForm') }}" data-url="{{ route('getToken') }}">

            {{ csrf_field() }}
               
               <fieldset>
                   <legend>Contacto</legend>

                   <div class="form-group">
                       <label class="control-label col-md-3">Nombres *</label>
                       <div class="col-md-9">
                           <input class="form-control" type="text" id="nombres" name="nombres" required></input>
                       </div>
                   </div>

                   <div class="form-group">
                       <label class="control-label col-md-3">Apellidos *</label>
                       <div class="col-md-9">
                           <input class="form-control" type="text" id="apellidos" name="apellidos" required></input>
                       </div>
                   </div>

                   <div class="form-group">
                       <label class="control-label col-md-3">Departamento *</label>
                       <div class="col-md-9">
                           <select class="form-control" type="text" id="departamento" name="departamento" data-url="{{ route('getDepts') }}" required>
                            <option value="">Seleccionar</option>
                           </select>
                       </div>
                   </div>

                   <div class="form-group">
                       <label class="control-label col-md-3">Ciudad *</label>
                       <div class="col-md-9">
                           <select class="form-control" type="text" id="ciudad" name="municipio" data-url="{{ route('getCities', ['']) }}" required>
                               <option value="">Seleccionar</option>
                           </select>
                       </div>
                   </div>

                   <div class="form-group">
                       <label class="control-label col-md-3">Observaciones *</label>
                       <div class="col-md-9">
                           <textarea class="form-control" type="text" id="observaciones" name="observaciones" required></textarea>
                       </div>
                   </div>

               </fieldset>

               <div class="form-group text-center">
                   <input type="submit" class="btn btn-primary" id="btnSave" value="Guardar">
                   <input type="button" class="btn btn-secondary" id="btnSend" value="Enviar E-mail">
               </div>

           </form>
        </div>

    </body>
</html>
