function RutasViewModel() {

  var self = this;
  self.verfication=sessionStorage.getItem("usuario");
  self.url=ko.observable('https://mybusllc.000webhostapp.com/api/');

  self.nombre_ruta=ko.observable('');
  self.destino=ko.observable('');
  self.origen=ko.observable('');
  self.bus_id=ko.observable(0);
  self.valor=ko.observable(0);
  self.id=ko.observable('');

  self.listado_buses=ko.observableArray([]);
  self.listado_rutas=ko.observableArray([]);


  self.listado_cotizacion=ko.observableArray([]);

  self.sw=ko.observable(0);
  

  self.dashboard =function(){
      window.location="/";
  }

  self.login =function(){
      window.location="/login";
  }

   self.logout=function(){
     
      sessionStorage.clear();
      data=[]

      fetch(self.url()+"logout", {
      method: 'POST', // or 'PUT'
      body: JSON.stringify(data), // data can be `string` or {object}!
      headers:{
        'Content-Type': 'application/json'
      }
      }).then(res => res.json().then(
        response=>{

         window.location="/";
        }
      ))
      .catch(error => console.error('Error:', error))
      .then(response => console.log('Success:', response));

  }


  self.cotizar=function(){

  	if(self.destino()=='' || self.origen()==''){
  			Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Todos los campos no deben estar vacio!'
					})
			return
  		}

  	  var data = {destino: self.destino(),origen: self.origen()};

				fetch(self.url()+"rutas/cotizar", {
				  method: 'POST', // or 'PUT'
				  body: JSON.stringify(data), // data can be `string` or {object}!
				  headers:{
				    'Content-Type': 'application/json'
				  }
				}).then(res => res.json().then(
					response=>{

						if(response.error==false){
							self.listado_cotizacion(response.data);
						}


						if(self.listado_cotizacion().length==0){
							self.sw(1);
						}else{
							self.sw(0);
						}
					}
				))
				.catch(error => console.error('Error:', error))
				.then(response => console.log('Success:', response));
  }

  //save or edit depend if self.id() is 0

  self.save=function(){
  		if(self.nombre_ruta()=='' || self.destino()=='' || self.origen()=='' || self.bus_id()==0 || self.valor()==0 ){
  			Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Todos los campos no deben estar vacio!'
					})
			return
  		}

  		Swal.showLoading()

		

		if(self.id()==0){
				var data = {nombre_ruta:self.nombre_ruta(),destino: self.destino(),
					valor: self.valor(),origen: self.origen(),bus_id: self.bus_id()};

				fetch(self.url()+"rutas/create", {
				  method: 'POST', // or 'PUT'
				  body: JSON.stringify(data), // data can be `string` or {object}!
				  headers:{
				    'Content-Type': 'application/json'
				  }
				}).then(res => res.json().then(
					response=>{

						if(response.error==true){
							Swal.fire({
							  type: 'error',
							  title: 'Oops...',
							  text: 'Se presentaron errores al procesar la solicitud'
							})
						}else{
							self.limpiar();
							self.listado();
							Swal.fire({
							  type: 'success',
							  text: 'El registro ha sido guardado exitosamente'
							})
						}
					}
				))
				.catch(error => console.error('Error:', error))
				.then(response => console.log('Success:', response));
		}else{
			var data = {id:self.id(),nombre_ruta:self.nombre_ruta(),destino: self.destino(),
					valor: self.valor(),origen: self.origen(),bus_id: self.bus_id()};

			fetch(self.url()+"rutas/edit", {
				  method: 'POST', // or 'PUT'
				  body: JSON.stringify(data), // data can be `string` or {object}!
				  headers:{
				    'Content-Type': 'application/json'
				  }
				}).then(res => res.json().then(
					response=>{

						if(response.error==true){
							Swal.fire({
							  type: 'error',
							  title: 'Oops...',
							  text: 'Se presentaron errores al procesar la solicitud'
							})
						}else{
							self.limpiar();
							self.listado();
							Swal.fire({
							  type: 'success',
							  text: 'El registro ha sido guardado exitosamente'
							})
						}
					}
				))
				.catch(error => console.error('Error:', error))
				.then(response => console.log('Success:', response));
		}

		
  }

  self.borrar=function(item){

  		var data = {id:item.id};

  		Swal.showLoading()

			fetch(self.url()+"rutas/destroy", {
				  method: 'POST', // or 'PUT'
				  body: JSON.stringify(data), // data can be `string` or {object}!
				  headers:{
				    'Content-Type': 'application/json'
				  }
				}).then(res => res.json().then(
					response=>{

						if(response.error==true){
							Swal.fire({
							  type: 'error',
							  title: 'Oops...',
							  text: 'Se presentaron errores al procesar la solicitud'
							})
						}else{
							self.limpiar();
							self.listado();
							Swal.fire({
							  type: 'success',
							  text: 'El registro ha sido guardado exitosamente'
							})
						}
					}
				))
				.catch(error => console.error('Error:', error))
				.then(response => console.log('Success:', response));
  }


  self.listado_select_buses=function(){


  		//Swal.showLoading();


		fetch(self.url()+"buses/show", {
		  method: 'GET', // or 'PUT'
		  headers:{
		    'Content-Type': 'application/json'
		  }
		}).then(res => res.json().then(
			response=>{

				//Swal.showLoading(true);

				if(response.error==false){
					self.listado_buses(response.data);
				}
			}
		))
		.catch(error => console.error('Error:', error))
		.then(response => console.log('Success:', response));
  }

  self.listado=function(){


  		//Swal.showLoading();


		fetch(self.url()+"rutas/show", {
		  method: 'GET', // or 'PUT'
		  headers:{
		    'Content-Type': 'application/json'
		  }
		}).then(res => res.json().then(
			response=>{

				//Swal.showLoading(true);

				if(response.error==false){
					self.listado_rutas(response.data);
				}
			}
		))
		.catch(error => console.error('Error:', error))
		.then(response => console.log('Success:', response));
  }


 	self.modificar=function(item){

 		  self.nombre_ruta(item.nombre_ruta);
		  self.destino(item.destino);
		  self.origen(item.origen);
		  self.bus_id(item.bus_id);
		  self.valor(item.valor);
		  self.id(item.id);
  	}


  self.limpiar=function(){
  	  self.nombre_ruta('');
	  self.destino('');
	  self.origen('');
	  self.bus_id('');
	  self.valor(0);
	  self.id('');
  }


}

var rutas = new RutasViewModel();
rutas.listado_select_buses();
rutas.listado();

ko.applyBindings(rutas);

