<?php include('partials/menu.php') ; ?>
<div class="customer">
    <br><br><br><br><br><br><h1 style="text-align:center;color:#3c514e">Happy Customers!!</h1>
    <?php 
        if(isset($_SESSION['money'])){
            echo $_SESSION['money'];
            unset($_SESSION['money']);
        }
     ?>
    <table class="custtable" >
        <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Email</th>
            <th>Current Balance</th>
            <th>Action</th>
        </tr>
        <?php 
            //sql to get all customers
            $sql="SELECT * FROM tbl_customer WHERE balance>0";

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
                    $balance=$row['balance'];
                    $email=$row['email'];
                    ?>
                    <tr>
                        <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $i; ?></td>
                        <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $name;?></td>
                        <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $email; ?></td>
                        <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $balance; ?></td>
                        <td style="width:auto;height:auto;padding:10px;text-align:center;background: #00b894;color:#0B1C48;font-weight:bold;"><a href="<?php echo SITEURL; ?>transfer.php?id=<?php echo $id; ?>&s_no=<?php echo $i;?>" style="color:#0B1C48">Tranfer Amount</a></td>
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