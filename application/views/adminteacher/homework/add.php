<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-8">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Teacher Class & Section</h4>

                       </div>

                       <div class="content">
                           <form action="" method="post" enctype="multipart/form-data" id="myformsection">
                              <fieldset>
							 
                                      <div class="form-group">
                                            <label class="col-sm-3 control-label" style="margin-top:05px;">Class Assigned </label>
                                                <div class="col-sm-8">
                                                    <?php 
													 // echo '<pre>';
													//  print_r($res);
													 // exit;
													 
														// echo $c;
													  foreach($res as $res1)
													       {	
														    $c=$res1->class_sec_id;
															echo $c;
															}
                                                 foreach($result as $rows)
                                                 {
                                                     foreach($rows as $row)
                                                      {
														 $a=$row->class_name;
														 $b=$row->sec_name;
														  ?>
											<button class="btn btn-fill"><?php echo $a;?> ( <?php echo $b;?> )</button>	  
                                                      <?php 
                                                 }}

                                                 ?>
                                                </div>
                                      </div>
                                    </fieldset>
									
									
									
									
									
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
     

   </div>


</div>

<script type="text/javascript">

/* $(document).ready(function () {

 $('#myformsection').validate({ // initialize the plugin
     rules: {


         sectionname:{required:true },


     },
     messages: {


           sectionname: "Please Enter Section Name"


         }
 });
});

var $table = $('#bootstrap-table');
      $().ready(function(){
          $table.bootstrapTable({
              toolbar: ".toolbar",
              clickToSelect: true,
              showRefresh: true,
              search: true,
              showToggle: true,
              showColumns: true,
              pagination: true,
              searchAlign: 'left',
              pageSize: 8,
              clickToSelect: false,
              pageList: [8,10,25,50,100],

              formatShowingRows: function(pageFrom, pageTo, totalRows){
                  //do nothing here, we don't want to show the text "showing x of y from..."
              },
              formatRecordsPerPage: function(pageNumber){
                  return pageNumber + " rows visible";
              },
              icons: {
                  refresh: 'fa fa-refresh',
                  toggle: 'fa fa-th-list',
                  columns: 'fa fa-columns',
                  detailOpen: 'fa fa-plus-circle',
                  detailClose: 'fa fa-minus-circle'
              }
          });

          //activate the tooltips after the data table is initialized
          $('[rel="tooltip"]').tooltip();

          $(window).resize(function () {
              $table.bootstrapTable('resetView');
          });


      }); */
</script>
