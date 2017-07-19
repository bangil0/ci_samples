

<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>View Installer</title>
      <link href="<?php echo base_url();?>assets/css/yp.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
       <link href="<?php echo base_url();?>assets/css/parsley/parsley.css" rel="stylesheet" type="text/css">
      <script src="<?php echo base_url();?>assets/js/parsley/parsley.min.js"></script>
   </head>


   <body>
      <div class="container mar_top">

            <div class="smtp_dtl db">MYSQL DATABASE</div>
            <BR>
              <form method='post' id='dbValues' data-parsley-validate>
            <div class="panel-body fix db">
               <!-- <div class="md_site">Action </div>
                  <input type="checkbox">&nbsp;  connect and Remove all Data<br> -->

               <br>
                <div class="md_site">Admin Email</div>
               <input class="yp-install-input" type="text" placeholder="Admin Email" name="admin_email" value="no-reply@techware.co.in" required> <br>
               <br>
               <div class="md_site">Database Host</div>
               <input class="yp-install-input" type="text" placeholder="Localhost" name="db_host" value="localhost" required> <br>
               <br>
               <div class="md_site">Database Name</div>
               <input class="yp-install-input" type="text" placeholder="New or Existing Database name" name="db_name"  value="my_directory" required> <br>  <br>
               <div class="md_site">   User</div>
               <input class="yp-install-input" type="text" placeholder="Valid database username" name="db_user" value="root" data-parsley-trigger="change" required> <br><br>
               <div class="md_site">Password</div>
               <input class="yp-install-input" type="text" placeholder="Valid database user password" name="db_password" > <br>
               <div class="save_ourt">
                  <button type="button" class="ms_save_ch" id="save_ch" onClick='installer()'>SAVE CHANGES</button>
               </div>
           </form>
            </div>

           <!--  <div class="smtp_dtl smtp">SMTP DETAILS</div>
         <br>
         <div class="panel-body fix smtp">
          <form method='post' id='smtpDtls' >

            <br>

               <br>
               <div class="md_site">Smtp Username</div>
               <input class="yp-install-input" type="text" placeholder="Smtp Username" name="smtp_username" value="no-reply@tecware.in" required> <br>
               <br>
               <div class="md_site">Smtp Host</div>
               <input class="yp-install-input" type="text" placeholder="Smtp Host" name="smtp_host" value="mail@tecware.co.in" required> <br>  <br>
               <div class="md_site">Smtp Port</div>
               <input class="yp-install-input" type="text" placeholder="587" name="smtp_port" value="587" required> <br><br>
               <div class="md_site">Smtp Password</div>
               <input class="yp-install-input" type="password" placeholder="*********" name="smtp_password" value="Golden@reply" required> <br>
               <div class="save_ourt">
                  <button type="button" class="ms_save_ch" onClick='installerSmtp()'>SAVE CHANGES</button>
               </div>
           </form>
               <div class='msg'></div>
            </div> -->

            <div class="loader1" >
                      <img src="<?php echo base_url();?>assets/images/loader.gif" />
                    </div>
            <br>


         </div>
      </div>
      </div>
   </body>
</html>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
    $('.smtp').hide();

 function  installer(){



//if ($('#dbValues').parsley().validate() ) {

  $('.loader1').show();
 var value =$("#dbValues").serialize() ;

$.ajax({
  url:'<?php echo base_url();?>Installer/dbconnect',
  type:'post',
  data:value,
  success:function(res){
   // $('.smtp').show();
    $('.loader1').hide();
   // $('.db').hide();


    $(".db-result").html(res);

    window.location.href ='Installer/addData';



     }
   });
 //}
}

</script>
<script type="text/javascript">

 /*function  installerSmtp(){
  $('.loader1').show();
var value =$("#smtpDtls").serialize() ;


$.ajax({

 url:'<?php echo base_url();?>Installer/addData',
 type:'post',
 data:value,
 success:function(res){
  $('.loader1').hide();
  if(res==0){
    window.location.href ='Login/first_show';
  }
  else{
    $(".msg").html('<p class="success">Error</p>');
  }
  }

 });

}*/

</script>

<div class="db-result"></div>