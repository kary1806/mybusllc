<link rel="stylesheet" href="{{ asset('css/login.css') }}" />

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>



<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{ asset('img/logo.png') }}" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form>
                       
                       <input data-bind="value:usuario" id="email" type="text" class="fadeIn second" name="usuario" placeholder="Usuario">

                        <input data-bind="value:password" id="password" type="password" class="fadeIn third" name="password" placeholder="Clave">

                        <input style="cursor: pointer;" type="button" data-bind="click:autenticar" class="fadeIn fourth" value="Entrar">

                   

    </form>

  </div>
</div>


<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>





