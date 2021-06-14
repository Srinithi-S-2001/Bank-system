<?php include('partials/menu.php'); ?>
<div class="customer" style="width:100%;height:100vh">
    <br><br><br><br><br><br><h1 style="text-align:center;color:#3c514e">Transaction History</h1>
    <table class="custtable" >
        <tr>
            <th>Sno</th>
            <th>From</th>
            <th>To</th>
            <th>Amount</th>
            <th>Time</th>
        </tr>
        <?php 
            //sql to get all customers
            $sql="SELECT * FROM tbl_history";

            //executing the sql
            $res=mysqli_query($conn,$sql);
            
            //counting the rows
            $count=mysqli_num_rows($res);
            if($count==0){
                echo "<tr><td colspan=3 style='width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;'>Data Not Found</td></tr>";
            }else{
                $i=1;
                while($row=mysqli_fetch_assoc($res)){
                    $id=$row['id'];
                    $name=$row['name'];
                    $endname=$row['endname'];
                    $value=$row['value'];
                    $time=$row['time'];
                    ?>
                    <tr>
                        <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $i; ?></td>
                        <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $name;?></td>
                        <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $endname; ?></td>
                        <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $value; ?></td>
                        <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $time; ?></td>
                    </tr>
                    <?php
                    $i++;
                }
            }
        ?>
    </table>
    <br><br>
</div>
<?php include('partials/footer.php') ; ?>