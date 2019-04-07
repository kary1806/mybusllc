<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Bus LLC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    
         <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
      
    </head>
    <style type="text/css">
        
        body {
          background: #56baed; 
        }
    </style>
    <body>
       
           <nav class="navbar back" style="background: #a1d038 ">
                <a href="{{ url('/') }}" class="text-white">
                My Bus LLC
                </a>

                  <!--ko if: !verfication -->    
                  <button data-bind="click:login" class="btn btn_sucess">
                   Login</button>
                   <!--/ko--> 

                    <!--ko if: verfication -->  
                  <button class="btn btn_sucess" data-bind="click:logout">
                 Cerrar Sesion</button>
                  <!--/ko--> 

                
            </nav>

            <div class="container">
            <div class="row mt-4">
              <div class="col-md-3">
                  
                  <div class="card">
                     <form class="card-body">
                        <div class="form-group" align="center">
                           <label>Cotizar</label>
                        </div>

                         <div class="form-group">
                            <input type="text" data-bind="value:origen"
                            name="origen" class="form-control" placeholder="Origen de la ruta">
                            </input>
                        </div>

                         <div class="form-group">
                            <input type="text" data-bind="value:destino"
                            name="destino" class="form-control" placeholder="Destino de la ruta">
                            </input>
                        </div>

                        
                        <button type="button" data-bind="click:cotizar" class="btn btn-primary">Cotizar</button>
                    </form>
                </div>
              </div>

              <div class="col-md-9">
                

                <table>
                  <tr>
                    <th>Rutas</th>
                    <th>Valor</th>
                  </tr>

                   <!--ko foreach:{ data:listado_cotizacion, as:'item'} -->
                  <tr>
                   
                    <td data-bind="text:item.ruta"></td>
                    <td data-bind="text:'$'+item.valor"></td>
                  </tr>

                     <!--/ko-->

                </table>

                 <!--ko if: sw()==1  --> 
                <div class="alert alert-warning" role="alert">
                  No hay rutas!
                </div>
                 <!--/ko-->

              </div>
              
            </div>
          </div>

    </body>

      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>
  <script type="text/javascript" src="{{ asset('js/controles.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/rutas.js') }}"></script>

</html>
