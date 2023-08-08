 <?php   /* Custom Ajax */
    function data_custom_ajax(){    
        $trackid = $_POST['text'];

        global $wpdb;
        
        $table_name = $wpdb->prefix . 'hs_applications';
        $results = $wpdb->get_row( "SELECT * FROM $table_name WHERE reference_number=$trackid ");
           
        if(!empty($results)){
            
            $testdomin_result = '<table>';
            $testdomin_result .= '<tr><th>Reference Number : </th><td>'.$results->reference_number.'</td></tr>';
            $testdomin_result .= '<tr><th>DOB : </th><td>'.$results->date_of_birth.'</td></tr>';
            $testdomin_result .= '<tr><th>Passport Number : </th><td>'.$results->passport_number.'</td></tr>';
            $testdomin_result .= '<tr><th>Nationality : </th><td>'.$results->nationality.'</td></tr>';
            $testdomin_result .= '<tr><th>First Name : </th><td>'.$results->first_name.'</td></tr>';
            $testdomin_result .= '<tr><th>Last Name : </th><td>'.$results->last_name.'</td></tr>';
            $testdomin_result .= '<tr><th>Position : </th><td>'.$results->position.'</td></tr>';
            $testdomin_result .= '<tr><th>Salary : </th><td>'.$results->salary.'</td></tr>';
            $testdomin_result .= '<tr><th>Joining Date : </th><td>'.$results->joining_date.'</td></tr>';
            $testdomin_result .= '<tr><th>Expiry Date : </th><td>'.$results->expiry_date.'</td></tr>';
          
           
            
        }
        else
        {
            $testdomin_result = '<div class="alert-danger"> Sorry No Data Found</div>';
        }

        echo $testdomin_result;
        die;
    }
    add_action('wp_ajax_nopriv_data_custom_ajax', 'data_custom_ajax');
    add_action('wp_ajax_data_custom_ajax', 'data_custom_ajax');