<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="header">
                     <h4 class="title">Class & Section</h4>
                  </div>
                  <div class="content">
                     <div class="row">
                        <?php
                           if(empty($exam_name)){   ?>
                        <div class="col-md-2">
                           <p>No Marks Added</p>
                        </div>
                        <?php  }  else{ 
                                  foreach($exam_name as $rows){
 					    ?>
                        
                        <div class="col-md-2">
                           <a rel="tooltip" href="<?php echo base_url(); ?>examination/marks_status" class="btn btn-wd"><?php echo $rows->exam_name; ?></a>
                        </div>
						<input type="hidden" name="msta_id" value="<?php echo $rows->exam_status_id; ?>"/>
                        <?php  } }  ?>

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- row -->
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
   $('#exammenu').addClass('collapse in');
        $('#exam').addClass('active');
        $('#exam3').addClass('active');
    $('#classsection').validate({ // initialize the plugin
        rules: {
            test_type:{required:true },
			title:{required:true },
			subject_name:{required:true },
			tet_date:{required:true },
			details:{required:true },
			class_id:{required:true }
        },
        messages: {
              test_type: "Please Select Type Of Test",
			  title: "Please Enter Title Name",
			  subject_name: "Please Select Subject Name",
			  tet_date: "Please Select Date",
			  details: "Please Enter Details",
			  class_id: "Please Enter Class Name"

            }
    });
   });
   
</script>



