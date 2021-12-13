<?php




Class User extends Controller {
  public function __construct() {
        $this->view('header');
        $this->import = $this->model('Import');
  }	

  public function index() {

    $data =[ 'title' => "MVC framewaork"];
    $this->view('index',$data);

  }

  public function csvimport() {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $file =$_FILES['upload']['tmp_name'];
      //$rowCount = 0;
       
        
      if (($handle = fopen ( $file, 'r' )) !== FALSE) {
        $size=filesize($file);
        $row1 =true;
         $csvData = array();
        //$csvdata =array();
        while ( ($data = fgetcsv ( $handle, $size, ",")) !== FALSE ) {
          //$csvdata[] = $data;
         // print_r($csvdata);
          if($row1){
            $csvData =$data;

            $row1 =false;
          }else {
            
          $final_ata = array_combine($csvData, array_values($data));
            
            $d =array($final_ata);
            
            $change_date = $d[0]['date'];
           $newDate = date("Y-m-d", strtotime($change_date));
           
                      
            $servername = "localhost";
        $username = "root";
         $password = "";
        $dbname = "stock_trading";


          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
             
          $sql = "INSERT INTO company_data (company_name, stock_price, created_at)
          VALUES ('".$d[0]['stock_name']."', '".$d[0]['price']."', '".$newDate."')";

          if ($conn->query($sql) === TRUE) {
           echo "New record created successfully";
          } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          }

           $conn->close();
           
          // }
             
           

          }
         
            
          }
         
           
          
            
        }
        fclose($handle);
      }
      
      header('location:' . URLROOT );

     
    
    }
    


    public function track(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
          if (empty ($_POST['company_name'])) {  
        $errMsg = "Error! You didn't enter the Name.";  
                 echo $errMsg;  
    } else {  
          $company =$_POST['company_name'];
    }  
     if (empty ($_POST['from_date'])) {  
        $errMsg = "Error! You didn't enter the Name.";  
                 echo $errMsg;  
    } else {  
      
            $change_from =$_POST['from_date'] ;
           $from_date= date("Y-m-d", strtotime($change_from));
    }  
     if (empty ($_POST['end_date'])) {  
        $errMsg = "Error! You didn't enter the Name.";  
                 echo $errMsg;  
    } else {  
          $change_end =$_POST['end_date'] ;
           $end_date= date("Y-m-d", strtotime($change_end));
    } 



     $servername = "localhost";
        $username = "root";
         $password = "";
        $dbname = "stock_trading";


          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
             
         $sql = "SELECT * FROM company_data WHERE company_name = '".$company."' AND created_at >= '".$from_date."' AND created_at <= '".$end_date."'";
         $result = $conn->query($sql);
          $max=0; 
          $max_date =0;
          //$min =PHP_INT_MAX;
          $min_date =0;
          $max_value;
          $min_value;
$sqli = "SELECT stock_price FROM company_data WHERE company_name = '".$company."' AND created_at >= '".$from_date."' AND created_at <= '".$end_date."'";
         $resultavg = $conn->query($sqli);
           if ($resultavg->num_rows > 0) {
  
         $rowavg = $resultavg->fetch_array();
         $avg = array_sum($rowavg)/count($rowavg);
         echo "mean stock price is ".$avg.",";
       }

       if ($result->num_rows > 0) {
  
         $row = $result->fetch_all();

        
         for ($i=0; $i <count($row) ; $i++) {
           $min =PHP_INT_MAX;
           $local_min_date;
           for ($j=0; $j <$i-1 ; $j++) { 
             if($min > $row[$j][2]){
              $min  = $row[$j][2];
               $local_min_date  = $row[$j][3];
                }
            }
          if($min < $row[$i][2] && $max < $row[$i][2]-$min){
            //if($max < $row[$i][2]){
            $max  = $row[$i][2]-$min;//profit
            $max_date  = $row[$i][3];//max date selling
            $min_date =$local_min_date;//min date buying
            $max_value=$row[$i][2];//max value
            $min_value = $min;//min value
          //}
          }


          
         }

         
         
          
          
        echo "Joe's Profit-".$max.",Joe should sell his stocks on-".$max_date.",Joe should buy his stock on".$min_date."to get maximum profit";

       
       
         } else {
         echo "0 results";
          }
          
           $conn->close(); 
      
    


    }
   }
  
 
}