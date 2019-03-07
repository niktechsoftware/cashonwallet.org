<?php  
 //filter.php  
 /*if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "cashon_wallet");  
      $output = '';  
      $query = "  
           SELECT * FROM inner_daybook  
           WHERE order_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                 <tr>
                                                <th>#</th>
                                                <th>Cid</th>
                                                <th>Amount</th>
                                                <th>Debit Credit</th>
                                                <th>Remark</th>
                                                <th>Date/Time</th>
                                                <th>Invoice Number</th>
                                                 <th>Plan Number</th>
                                                
                                               
                                            </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>   <td></td>	
                          <td>'. $row["cid"] .'</td>  
                          <td>'. $row["amount"] .'</td>  
                          <td>'. $row["debit_credit"] .'</td>  
                          <td>$ '. $row["remark"] .'</td>  
                          <td>'. $row["date_time"] .'</td>
<td>'. $row["invoice_number"] .'</td>  
                          <td>$ '. $row["plan_number"] .'</td>  
                         					  
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  */
 //$fromdate = $this->input->post('from_date');

 if($this->input->post('from_date') && $this->input->post('to_date')){
 $i = 1;
// $condition = order_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'

  $res = $this->db->get("inner_daybook")->result();
  // $res =$this->db->where($condition);
   $output = '';
 $output .= '  
           <div class="table-responsive">  <table id="example" class="display table table-striped" style="width: 100%; cellspacing: 0;">
                 <tr>
                                                <th>#</th>
                                                <th>Cid</th>
                                                <th>Amount</th>
                                                <th>Debit Credit</th>
                                                <th>Remark</th>
                                                <th>Date/Time</th>
                                                <th>Invoice Number</th>
                                                 <th>Plan Number</th>
                                                
                                               
                                            </tr>  
      ';  
 foreach($res as $row):

                                              $output .= '<tr><td> '. $i .' </td>
                                                <td>'.  $row->cid .' </td>
                                                 <td> '.  $row->amount .' </td>
                                                <td> '. $row->debit_credit .'</td>
                                                <td> '. $row->remark .'</td>
                                                <td> '. $row->date_time .'</td>
                                                 <td>  '. $row->invoice_number .'</td>
                                                  <td>  '. $row->plan_number .'</td></tr>';
												  
												  
												 
 endforeach;
 $output .= '</table></div>';  
  echo $output; 
 }
 
 ?>
