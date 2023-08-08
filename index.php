<?php
   /*
   Plugin Name: Track APP 
   Plugin URI: https://website2999.com
   description: Track  application
   Version: 1.2
   Author: Mr.Hakimuddin Saifee
   Author URI: https://www.linkedin.com/in/hakimuddin-saifee-656718192/
   */
   // Function to create the table
function create_hs_applications_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'hs_applications'; // Add WordPress table prefix
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        reference_number VARCHAR(255) NOT NULL,
        date_of_birth DATE NOT NULL,
        passport_number VARCHAR(255) NOT NULL,
        nationality VARCHAR(255) NOT NULL,
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        position VARCHAR(255) NOT NULL,
        salary DECIMAL(10, 2) NOT NULL,
        joining_date DATE NOT NULL,
        expiry_date DATE NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

// Hook the table creation function to the WordPress installation
register_activation_hook( __FILE__, 'create_hs_applications_table' );


   
    function data_table_admin_menu_option()
   {
       add_menu_page('Import Application','Import Application','manage_options','data_table_admin_menu','data_table_Import','dashicons-editor-table','15');
     
       add_submenu_page('data_table_admin_menu','View Application','View','manage_options','data_table_admin_sub_menu','data_table_view');
       
       
   }
    add_action('admin_menu','data_table_admin_menu_option');
    
     function data_table_Import()
    {
      //  echo 'Add here your New Item';
     
       ?>
        <?php
global $wpdb ;
$table_name = $wpdb->prefix . 'hs_applications';
$output = '';


if(isset($_POST["submit"]))
{
    


     $reference_number =   $_POST['reference_number'];
     
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
    
      $sql = "SELECT * FROM hs_applications WHERE reference_number = '$reference_number'";
        $res = $wpdb->get_results($sql);
       if(!empty($res))  {
             $output = '<label class="text-danger">Reference number Already Inserted</label>';
             ?>
             <script>alert('Reference number Already Inserted')</script>
             <?php
            //$duplicate = true;
        }
      else{
         
        $quey=  $wpdb->insert($table_name, $insertApp);
       

         $output .= '<label class="text-success">Application Inserted SuccessFully</label>';
    ?>

    <script> alert('Application Inserted') </script>
    <?php
    }
  
    
   
}
else
{
      //$output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
}

?>

<html>
 <head>
  <title>Import  Application</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <?=  wp_enqueue_media(); ?>
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:700px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }
  input[type='text'],select,input[type='date'], input[type='email'], input[type='password'], textarea {
    width: calc(100% - 20px);
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-family: inherit;
    font-size: 14px;
    margin-top: 10px;
}
input[type='submit'] {
    padding: 10px 25px 8px;
    color: #fff;
    background-color: #0067ab;
    text-shadow: rgba(0,0,0,0.24) 0 1px 0;
    font-size: 16px;
    box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset, #fff 0 1px 0 0;
    border: 1px solid #0164a5;
    border-radius: 2px;
    margin-top: 10px;
    cursor: pointer;
}
  .view a {
    background: #0067ab;
    color: #fff;
    padding: 10px;
}
  </style>
 </head>
 <body>
  <div class="container box">
     
   <h3 align="center">Visa Application Manager</h3><br />
   <div class="view">
    <a  href="<?= bloginfo('url') ?>/wp-admin/admin.php?page=data_table_admin_sub_menu">View All Applications</a>
    </div>
    <br>
    <p><?= $output; ?></p>
    <br>
   <form name="form" method="post" action=""> 
<label>Reference Number</label>   
<p><input type="text" name="reference_number" placeholder="Enter Reference Number" required=""></p>
<label>DOB</label>   
<p><input type="date" name="date_of_birth" placeholder="Enter DOB" required=""></p>
<label>Passport Number</label>   
<p><input type="text" name="passport_number" placeholder="Enter Passport Number" required=""></p>
<label>Nationality</label>   
<p><input type="text" name="nationality" placeholder="Enter NAtionality" required=""></p>
<label>First Name</label>   
<p><input type="text" name="first_name" placeholder="Enter First Name" required=""></p>
<label>Last Name</label>   
<p><input type="text" name="last_name" placeholder="Enter Last Name" required=""></p>
<label>Position</label>   
<p><input type="text" name="position" placeholder="Enter Position" required=""></p>
<label>Salary</label>   
<p><input type="text" name="salary" placeholder="Enter Salary" required=""></p>
<label>Joining Date</label>   
<p><input type="date" name="joining_date" placeholder="Enter Joining Date" required=""></p>
<label>Expiry Date</label>   
<p><input type="date" name="expiry_date" placeholder="Enter Expiry Date" required=""></p>


<p><input name="submit" type="submit" value="Submit"></p>
</form>
   
  </div>
 </body>
 
</html>

    <?php
    }
    
    function data_table_view()
    {
        
         global $wpdb;
       
       if(isset($_REQUEST['cert_edit_id']) || isset($_REQUEST['cert_delete_id']))
       {
          
          //echo $_REQUEST['course_edit_id'];
          include_once('edit_and_delete_row.php');
            //echo "Edit Vendor Details........";
       }
       else
      {
        ?>
        <link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js" ></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" ></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" ></script>
        <style>
             .view a {
    background: #0067ab;
    color: #fff;
    padding: 10px;
    
}
.view{
    margin:30px ;
}
        </style>
        <div class="wrap">
            <center><h2> View All Application Data</h2></center>
            <!-- <div class="view">
    <a  href="http://www.bmqac.com/wp-admin/admin.php?page=data_table_admin_menu">Import  Data</a>
    </div> -->
        </div>
        <div class="col-md-12">
        <div class="table-responsive">
            
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
          
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Reference Number</th>
                        <th>DOB</th>
                        <th>Passport Number</th>
                        <th>Nationality</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
                        <th>Salary</th>
                        <th>Joining Date</th>
                        <th>Expiry Date</th>
                        
                        
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    $table_name = $wpdb->prefix . 'hs_applications';
                    
                    $results = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY id ASC");
                    $i=1;
                    foreach($results as $row){
                       
                     ?>
                    <tr>
                        <td style="text-transform: uppercase;"><?php echo $i;  ?></td>
                        <td style="text-transform: uppercase;"><?php echo $row->reference_number;  ?></td>
                        <td style="text-transform: uppercase;"><?php echo $row->date_of_birth;  ?></td>
                        <td style="text-transform: uppercase;"><?php echo $row->passport_number;  ?></td>
                        <td style="text-transform: uppercase;"><?php echo $row->nationality;  ?></td>
                        <td style="text-transform: uppercase;"><?php echo $row->first_name;  ?></td>
                        <td style="text-transform: uppercase;"><?php echo $row->last_name;  ?></td>
                        <td style="text-transform: uppercase;"><?php echo $row->position;  ?></td>
                        <td style="text-transform: uppercase;"><?php echo $row->salary;  ?></td>
                        <td style="text-transform: uppercase;"><?php echo $row->joining_date;  ?></td>
                        <td style="text-transform: uppercase;"><?php echo $row->expiry_date;  ?></td>
                        
                        
                        
                        <td style="text-align: center;text-transform: uppercase;">
                           <a href="admin.php?page=data_table_admin_sub_menu&cert_edit_id=<?php echo $row->id;  ?>">Edit</a>
                           /  
                            <a href="admin.php?page=data_table_admin_sub_menu&cert_delete_id=<?php echo $row->id;  ?>">Delete</a> /

                           
                        </td>
                    </tr>
                     <?php
                     $i++;
                     }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
        <script>
            $(document).ready(function() {
            var table = $('#example').DataTable( {
            responsive: true
            } );
            
            new $.fn.dataTable.FixedHeader( table );
            } );
        </script>
        <?php
      }
    }
 