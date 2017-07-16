var App = angular.module('myApp', []);//ng-app name

App.controller('MainCtrl', function ($scope, $http ) {

//login

	$scope.sign_in_funtion = function(){ //function name
		
		if ($('#loginForm').parsley().validate() ) { //check isValid
		
		login = {email:$scope.email, password:$scope.password};
	    
		$http({
          method  : 'POST',
          url     : base_url+'Login',
          data    : login, //forms user object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function(data) {

          $("#loginForm")[0].reset();
			     $("#logmes").show();

			  if (data[0].status=='success') {

               $("#logmes").html('<div class="sucessfull">Successfully Logged in</div>');
               setTimeout(function(){$("#logmes").hide(); }, 3000);
			         location.reload();
			
         }else {

               $("#logmes").html('<div class="unsucessfull">Unknown credential,Please try again!</div>');
               setTimeout(function(){$("#logmes").hide(); }, 3000);
			  
               }
             
        });
		 }
	};
 
 //sign up
     
   $scope.sign_up_funtion = function(){ 
       
       if ($('#regForm').parsley().validate() ) { 

        var value=this.formData;
        
        $http({
          method  : 'POST',
          url     : base_url+'Login/registration',
          data    : value, 
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function(data) {

          $("#regForm")[0].reset();//reset the form fields
          $("#regmes").show();
			
			  if (data[0].status=='success') {

              // $scope.class = data[0].class; //pass class from controller for message
              // $scope.message = data[0].message; //show message
               $("#regmes").html('<div class="sucessfull">Successfully Registered</div>');
               setTimeout(function(){$("#regmes").hide(); }, 3000);
			         location.reload();
			
              }
         else if(data[0].status=='username') {

               $("#regmes").html('<div class="unsucessfull">Username Already Exist</div>');
               setTimeout(function(){$("#regmes").hide(); }, 3000);
        
              }
        else if(data[0].status=='email') {

              $("#regmes").html('<div class="unsucessfull">Email Already Exist</div>');
               setTimeout(function(){$("#regmes").hide(); }, 3000);
        
              }
         else {

              $("#regmes").html('<div class="unsucessfull">Error Occured</div>');
               setTimeout(function(){$("#regmes").hide(); }, 3000);
			  
              }

           });
          }   
    };
	    
 //forget password
     
   $scope.forget_funtion = function(){ 
       
     if ($('#fgtForm').parsley().validate() ) { 

        var value=this.formValue;
       
        $http({
          method  : 'POST',
          url     : base_url+'Login/forgetpassword',
          data    : value, 
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function(data) {

          $("#fgtForm")[0].reset();
           $("#flash").show();
      
        if (data[0].status=='emailsend') {

              // $scope.class = data[0].class; //pass class from controller for message
              // $scope.message = data[0].message; //show message
               //location.reload();
               $("#flash").html('<div class="sucessfull">Please Check Your Email</div>');
               setTimeout(function(){$("#flash").hide(); }, 3000);
      
              }
         
         else {

              //$scope.class = data[0].class; 
              //$scope.message = data[0].message;
              $("#flash").html('<div class="unsucessfull">Email Not Exist</div>');
               setTimeout(function(){$("#flash").hide(); }, 3000);
        
              }

           });
         }   
    };
  

	
});

// review  popup shows

App.controller('checkRating', function ($scope,$http,$timeout) {
  $scope.newRating = function(){
        
   $('#review-pop').modal('show');
    
 };

 //login  popup shows
 $scope.logRating = function(){
       
   $('#myModal').modal('show');
    
};

    
});



// image upload

App.controller('imageUpload', function ($scope,$http,$timeout) {
  
  $scope.imgUpload = function(){
        
   $('#add-photo-pop').modal('show');
    
 };

 //login  popup shows
 $scope.lgnImgUpload = function(){
       
   $('#myModal').modal('show');
    
};


    
});


