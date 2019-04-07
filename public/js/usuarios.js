function UsuariosViewModel() {

	var self = this;
  self.verfication=sessionStorage.getItem("usuario");
  self.url=ko.observable('https://mybusllc.000webhostapp.com/api/');
  self.name=ko.observable('');
  self.email=ko.observable('');
  self.password=ko.observable('');
  self.id=ko.observable('');
  self.listado_usuarios=ko.observableArray([]);
  

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

  self.save=function(){

  		if(self.name()=='' || self.email()=='' || self.password()==''){
  			Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Todos los campos no deben estar vacio!'
					})
			return
  		}

  		Swal.showLoading()

		
		

		if(self.id()==0){
				var data = {name:self.name(),email: self.email(),password:self.password()};

				fetch(self.url()+"usuarios/create", {
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
			var data = {id:self.id(),name:self.name(),email: self.email(),password:self.password()};

			fetch(self.url()+"usuarios/edit", {
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

			fetch(self.url()+"usuarios/destroy", {
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


		fetch(self.url()+"usuarios/show", {
		  method: 'GET', // or 'PUT'
		  headers:{
		    'Content-Type': 'application/json'
		  }
		}).then(res => res.json().then(
			response=>{

				//Swal.showLoading(true);

				if(response.error==false){
					self.listado_usuarios(response.data);
				}
			}
		))
		.catch(error => console.error('Error:', error))
		.then(response => console.log('Success:', response));
  }


 	self.modificar=function(item){

 		self.name(item.name);
 		self.password("xxxxxx");
 		self.email(item.email);
 		self.id(item.id);
  	}


  self.limpiar=function(){
  	self.name('');
  	self.email('');
  	self.password('');
  	self.id('');
  }


}

var usuarios = new UsuariosViewModel();
usuarios.listado();

ko.applyBindings(usuarios);