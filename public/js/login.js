function LoginViewModel() {

	var self = this;


	self.usuario=ko.observable('');
	self.password=ko.observable('');
	self.url=ko.observable('https://mybusllc.000webhostapp.com/api/autenticar');

	self.autenticar =function(){
	      
		
		if(self.usuario()=='' || self.password()==''){
			Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'El usuario o la clave no deben estar vacio!'
					})
			return
		}

		Swal.showLoading()

		
		var data = {usuario: self.usuario(),password:self.password()};


		fetch(self.url(), {
		  method: 'POST', // or 'PUT'
		  body: JSON.stringify(data), // data can be `string` or {object}!
		  headers:{
		    'Content-Type': 'application/json'
		  }
		}).then(res => res.json().then(
			response=>{

				//Swal.DismissReason.timer
				if(response.error==true){
					Swal.fire({
					  type: 'error',
					  title: 'Oops...',
					  text: 'El usuario o la clave estan incorrecto!'
					})
				}else{
					 sessionStorage.setItem("usuario", self.usuario());
					 window.location="/";
				}
			}
		))
		.catch(error => console.error('Error:', error))
		.then(response => console.log('Success:', response));

	}

	self.login=function(){
		let usuario = sessionStorage.getItem("usuario");
		if(usuario){
			window.location="/";
		}
	}

}

var login = new LoginViewModel();
login.login();

ko.applyBindings(login);