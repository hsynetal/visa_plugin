<?php


    if(isset($_REQUEST['cert_edit_id']))
    {
    
     $cert_edit_id = $_REQUEST['cert_edit_id'];
    
    if (isset($_POST['update'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'hs_applications';
    $insertApp['reference_number'] = $_POST['reference_number'];      
    $insertApp['date_of_birth'] = $_POST['date_of_birth'];      
    $insertApp['passport_number'] = $_POST['passport_number'];      
    $insertApp['nationality'] = $_POST['nationality'];      
    $insertApp['first_name'] = $_POST['first_name'];      
    $insertApp['last_name'] = $_POST['last_name'];      
    $insertApp['position'] = $_POST['position'];      
    $insertApp['salary'] = $_POST['salary'];      
    $insertApp['joining_date'] = $_POST['joining_date'];      
    $insertApp['expiry_date'] = $_POST['expiry_date'];      
   
 
    
    //die();
    // $table_name='wp_courses';
    
    $quey=  $wpdb->update($table_name, $insertApp ,array( 'id' => $cert_edit_id )
);
   

    //echo $data = $wpdb->query( $wpdb->prepare("UPDATE $table_name SET course_title='$course_title' WHERE courseid = $course_update_id"));
    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';
    ?>
    <script type="text/javascript">
    alert('data Updated');
    location.href='<?php echo bloginfo('url'); ?>/wp-admin/admin.php?page=data_table_admin_sub_menu'
    </script>
    <?php
    }
    ?>
    <link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <?=  wp_enqueue_media(); ?>
    <div style="float:left;width:100%;padding:40px 0px;margin-bottom:20px;">
       <div class="col-md-8 col-md-offset-2">
		<div class="panel panel-danger">
			<div class="panel-heading">Edit  Application here		</div>
			<div class="panel-body">
				<form name="myform" action="" method="post">
				     <?php
                    global $wpdb;
                    $cert_edit_id = $_REQUEST['cert_edit_id'];
                    $table_name = $wpdb->prefix . 'hs_applications';
                    $results = $wpdb->get_results( "SELECT * FROM $table_name WHERE id=$cert_edit_id ");
                    $i=1;
                    foreach($results as $row)
                    {
    
                    }
                    ?>
                    
                        <div class="row"> 

                            <!--<div class="col-md-6 " >
            				    <div class="form-group" >
            				    <label for="gender">City</label>
            				    <br>
                                <input type="text" value="<?php //echo $row->city_name; ?>" >
                                </div>
                            </div>-->
  
                        </div>
                        
                        <div class="row"> 
        				    <div class="col-md-6 ">
            				    <div class="form-group">
            				        <label for="reference_number"> Reference Number </label>
            				        <br>
                                    <input required type="text"  class="form-control" name="reference_number" id="reference_number" value="<?php echo $row->reference_number; ?>" >
                                </div>
                            </div>
                            
        				    <div class="col-md-6 ">
            				    <div class="form-group">
            				        <label for="date_of_birth"> DOB </label>
            				        <br>
                                    <input required type="date"  class="form-control" name="date_of_birth" id="date_of_birth" value="<?php echo $row->date_of_birth; ?>" >
                                </div>
                            </div>
                            
        				    <div class="col-md-6 ">
            				    <div class="form-group">
            				        <label for="passport_number"> Passport Number </label>
            				        <br>
                                    <input required type="text"  class="form-control" name="passport_number" id="passport_number" value="<?php echo $row->passport_number; ?>" >
                                </div>
                            </div>
                            
        				    <div class="col-md-6 ">
            				    <div class="form-group">
            				        <label for="nationality"> Nationality </label>
            				        <br>
                                    <input required type="text"  class="form-control" name="nationality" id="nationality" value="<?php echo $row->nationality; ?>" >
                                </div>
                            </div>
                            
        				    <div class="col-md-6 ">
            				    <div class="form-group">
            				        <label for="first_name"> First Name </label>
            				        <br>
                                    <input required type="text"  class="form-control" name="first_name" id="first_name" value="<?php echo $row->first_name; ?>" >
                                </div>
                            </div>
                            
        				    <div class="col-md-6 ">
            				    <div class="form-group">
            				        <label for="last_name"> Last Name </label>
            				        <br>
                                    <input required type="text"  class="form-control" name="last_name" id="last_name" value="<?php echo $row->last_name; ?>" >
                                </div>
                            </div>
                            
        				    <div class="col-md-6 ">
            				    <div class="form-group">
            				        <label for="position"> Position </label>
            				        <br>
                                    <input required type="text"  class="form-control" name="position" id="position" value="<?php echo $row->position; ?>" >
                                </div>
                            </div>
                            
        				    <div class="col-md-6 ">
            				    <div class="form-group">
            				        <label for="salary"> Salary </label>
            				        <br>
                                    <input required type="text"  class="form-control" name="salary" id="salary" value="<?php echo $row->salary; ?>" >
                                </div>
                            </div>
                            
        				    <div class="col-md-6 ">
            				    <div class="form-group">
            				        <label for="joining_date"> Joining Date </label>
            				        <br>
                                    <input required type="date"  class="form-control" name="joining_date" id="joining_date" value="<?php echo $row->joining_date; ?>" >
                                </div>
                            </div>
                            
        				    <div class="col-md-6 ">
            				    <div class="form-group">
            				        <label for="expiry_date"> Expiry Date </label>
            				        <br>
                                    <input required type="date"  class="form-control" name="expiry_date" id="expiry_date" value="<?php echo $row->expiry_date; ?>" >
                                </div>
                            </div>
                            
                            
  
                        </div>
                        
                        
                        
                        
                        

    					<div class="row"> 
    						<div class="col-md-12">
            					<div class="form-group text-center">
            					<button id="submit" type="submit" value="submit" class="btn btn-danger center" name="update">Update</button>
            			        </div>
        					</div>
    					</div>
                    
				</form>
                
                    
			</div>
		</div>
	</div>
	       
	       
       </div>
      
    <?php
    }

    
    if(isset($_REQUEST['cert_delete_id']))
    {
        //echo 'Ready For Delete The Data';
        global $wpdb;
        echo $cert_delete_id = $_REQUEST['cert_delete_id'];
        $table_name = $wpdb->prefix . 'hs_applications';
        $wpdb->query("DELETE FROM $table_name WHERE id = $cert_delete_id");
        
        /*$wpdb->update( 
        'wp_vendorlist', 
        array( 
            'status' => '1'
            ), 
        array( 'vid' => $vendor_delete_id )
        );*/
        
            ?>
            <script type="text/javascript">
            alert('data Deleted');
            location.href='<?php echo bloginfo('url'); ?>/wp-admin/admin.php?page=data_table_admin_sub_menu'
            </script>
            <?php
    }
    
    ?>


       
     