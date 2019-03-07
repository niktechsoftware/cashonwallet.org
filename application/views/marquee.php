
     <!-- <h3 class="replace">Notice Board</h3> -->
     <marquee height="40" behavior="alternate" onmouseover="this.stop();" onmouseout="this.start();">

         <?php $res = $this->db->get("marquee")->result();?>
         <?php foreach($res as $row):?>

         <h4 style="color:red; padding-top:10px;">
             <td><?php echo $row->notice; ?></td>
         </h4>
         <br>
         <?php endforeach;?>

     </marquee>

