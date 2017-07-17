	<script>
	
	base_url = "<?php echo base_url(); ?>";
	
	</script>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pace.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js"></script>
    
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
	
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
    
    <!-- FastClick 
    <script src="../../plugins/fastclick/fastclick.min.js"></script>-->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/custom-script.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/immanucustom-script.js"></script>
	
	
	 <script src="<?php echo base_url(); ?>assets/js/jquery.raty.min.js"></script>
	
	<!--time picker-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>
	<!--[validation js]-->
		<script src="<?php echo base_url();?>assets/js/parsley.min.js"></script>
    <!--[validation js]-->
	<script>
	 $(function () {
	   $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
	<!--time picker-->

    
    <!-- CK Editor -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
		
		$('.datatable').DataTable({
			"ordering" : $(this).data("ordering"),
			"order": [[ 0, "desc" ]]
        });
		
	  });
	</script>
	
	 <script>
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>

	
	
	
	
