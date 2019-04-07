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
                           <label>Usuario</label>
                        </div>

                         <div class="form-group">
                            <input type="text" 
                            name="name" data-bind="value:name" class="form-control" placeholder="Nombre Completo">
                            </input>
                        </div>

                        <div class="form-group">
                            <input type="text" 
                            name="email" data-bind="value:email" class="form-control" placeholder="Email">
                            </input>
                        </div>

                        <div class="form-group">
                            <input type="password" 
                            name="clave" data-bind="value:password" class="form-control" placeholder="Clave">
                            </input>
                        </div>

                        <button type="button" data-bind="click:save" class="btn btn-primary">Guardar</button>
                        <button type="button" data-bind="click:limpiar" class="btn btn-primary">limpiar</button>
                    </form>
                </div>
              </div>

              <div class="col-md-9">
                 <div class="row" data-bind="foreach:{data:listado_usuarios, as:'item'}">

                     <div class="col-md-4" >
                          <div class="card mt-4">
                            <div class="card-header">
                               <h3> Usuario </h3>
                            </div>

                            <div class="card-body">
                               <p>Nombre Completo: <span data-bind="text:item.name"></span></p> 
                               <p>Email: <span data-bind="text:item.email"></span></p> 
                            </div>


                            <div class="card-footer">
                               <button class="btn btn-primary" data-bind="click:$root.modificar">
                               Modificar</button>

                               <button class="btn btn-danger" data-bind="click:$root.borrar">
                               Borrar</button>
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
    <script type="text/javascript" src="{{ asset('js/usuarios.js') }}"></script>
</html>
