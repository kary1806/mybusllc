<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Bus LLC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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
              <div class="col-md-12">
                 <div class="row">
                     <!--ko if: verfication -->  
                     <div class="col-md-4">
                          <div class="card mt-4">

                            <div class="card-body" align="center">
                               <i class="far fa-user icon_style"></i>
                            </div>


                            <div class="card-footer" align="center">
                              <h4>Usuarios</h4>
                               <button data-bind="click:usuarios" class="btn btn_sucess">
                               Administrar</button>
                            </div>

                          </div>
                      </div>


                      <div class="col-md-4">
                          <div class="card mt-4">

                            <div class="card-body" align="center">
                               <i class="fas fa-bus icon_style"></i>
                            </div>


                            <div class="card-footer" align="center">
                              <h4>Bus</h4>
                               <button data-bind="click:bus" class="btn btn_sucess">
                               Administrar</button>
                            </div>

                          </div>
                      </div>


                      <div class="col-md-4">
                          <div class="card mt-4">

                            <div class="card-body" align="center">
                               <i class="fas fa-route icon_style"></i>
                            </div>


                            <div class="card-footer" align="center">
                              <h4>Rutas</h4>
                               <button data-bind="click:rutas" class="btn btn_sucess">
                               Administrar</button>
                            </div>

                          </div>
                      </div>

                        <!--/ko--> 

                       <div class="col-md-4">
                          <div class="card mt-4">

                            <div class="card-body" align="center">
                               <i class="fas fa-ticket-alt icon_style"></i>
                            </div>


                            <div class="card-footer" align="center">
                              <h4>Tickets</h4>
                               <button class="btn btn_sucess" data-bind="click:tickets">
                               Cotizar</button>
                            </div>

                          </div>
                      </div>


                 </div>
              </div>
              
            </div>
          </div>

    </body>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>
    <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
</html>
