function BusesViewModel() {

  var self = this;
  self.verfication=sessionStorage.getItem("usuario");
  self.url=ko.observable('https://mybusllc.000webhostapp.com/api/');
  self.name_conductor=ko.observable('');
  self.modelo=ko.observable('');
  self.id=ko.observable('');
  self.listado_buses=ko.observableArray([]);
  

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


  //save or edit depend if self.id() is 0
  self.save=function(){

  		if(self.name_conductor()=='' || self.modelo()==''){
  			Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Todos los campos no deben estar vacio!'
					})
			return
  		}

  		Swal.showLoading()

		
		

		if(self.id()==0){
				var data = {modelo:self.modelo(),name_conductor: self.name_conductor()};

				fetch(self.url()+"buses/create", {
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
			var data = {id:self.id(),name_conductor:self.name_conductor(),modelo: self.modelo()};

			fetch(self.url()+"buses/edit", {
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

			fetch(self.url()+"buses/destroy", {
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


  self.listado=function(){


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


 	self.modificar=function(item){

 		self.name_conductor(item.name_conductor);
 		self.modelo(item.modelo);
 		self.id(item.id);
  	}


  self.limpiar=function(){
  	self.name_conductor('');
  	self.modelo('');
  	self.id('');
  }


}

var buses = new BusesViewModel();
buses.listado();

ko.applyBindings(buses);