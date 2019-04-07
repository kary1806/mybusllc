function DashboardViewModel() {

	var self = this;
  self.verfication=sessionStorage.getItem("usuario");
   self.url =ko.observable('https://mybusllc.000webhostapp.com/api/logout');
  

  self.dashboard =function(){
      window.location="/";
  }

  self.login =function(){
      window.location="/login";
  }

  self.usuarios =function(){
      window.location="/usuarios";
  }

  self.bus =function(){
      window.location="/bus";
  }

  self.rutas =function(){
      window.location="/rutas";
  }

  self.tickets =function(){
      window.location="/tickets";
  }


  self.logout=function(){
     
      sessionStorage.clear();
      data=[]

      fetch(self.url(), {
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


}

var dashboard = new DashboardViewModel();


ko.applyBindings(dashboard);