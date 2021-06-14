<?php include('partials/menu.php') ; ?>
<div class="transfer">
    <table class="transtable" >
            <tr>
                <th>Sno</th>
                <th>Name</th>
                <th>Email</th>
                <th>Current Balance</th>
            </tr>
            <?php 
            //sql to get all customers
            if(isset($_GET['id'])){
            $id=$_GET['id'];
            $s_no=$_GET['s_no'];
            $sql="SELECT * FROM tbl_customer WHERE id=$id";

            //executing the sql
            $res=mysqli_query($conn,$sql);
            
            //counting the rows
            $row=mysqli_fetch_assoc($res);
            $name=$row['name'];
            $balance=$row['balance'];
            $email=$row['email'];
            
            ?>
            <tr>
                <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $s_no; ?></td>
                <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $name;?></td>
                <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $email; ?></td>
                <td style="width:auto;height:auto;padding:10px;text-align:center;background: rgba(114,127,128, 0.7);color:#3c514e;font-weight:bold;"><?php echo $balance; ?></td>
            </tr>
            <?php 
            } 
            ?>
    </table>
    <br><br><br><br>
    <div>
        <form method="post">
            <table class="none">
                <tr>
                    <td>Transfer to:</td>
                    <td>
                        <select name="enduser" style="width:auto;height:35%"required>
                            <?php 
                                $sql1="SELECT * FROM tbl_customer WHERE NOT id=$id";
                                $res1=mysqli_query($conn,$sql1);
                                $count=mysqli_num_rows($res1);
                                if($count==0){
                                ?><option value="0">No Category Found</option>
                                <?php
                                }else{
                                    while($row1=mysqli_fetch_assoc($res1)){
                                        $id1=$row1['id'];
                                        $name1=$row1['name'];
                                    ?><option value="<?php echo $id1;?>"><?php echo $name1; ?></option>;<?php
                                    }
                                }?></select>
                    </td>
                </tr>
                <tr>
                    <td>Amount To be Transfered:</td>
                    <td><input type="number" name="number" value="0.0"></td>
                </tr>
            </table>
            <input type="submit" name="transfer" value="Transfer" style="margin-left:45%;width:150px;height:50px;font-size:20px;color:#1c524e;font-weight:bold;box-shadow:10px 5px 5px #000000;text-decoration:none;margin-top:4%;"></input>
        </form>
    </div>
    <?php 
        if(isset($_POST['transfer'])){
            $id2=$_POST['enduser'];
            $sql2="SELECT * FROM tbl_customer WHERE id=$id2";

            //executing the sql
            $res2=mysqli_query($conn,$sql2);
            
            //counting the rows
            $row2=mysqli_fetch_assoc($res2);
            $name2=$row2['name'];
            $balance2=$row2['balance'];
            $email2=$row2['email'];
            
            //value to be added
            $value2=$_POST['number'];
            
            $sql3="UPDATE tbl_customer SET balance=balance-'$value2' WHERE name='$name' && balance-'$value2'>0";
            $res3=mysqli_query($conn,$sql3);
            if($res3==true){
                $sql4="UPDATE tbl_customer SET balance=balance+'$value2' WHERE id=$id2 ";
                $res4=mysqli_query($conn,$sql4);
                if($res4==true){
                    $time=date("Y-m-d h:i:sa");
                    $sql5="INSERT INTO tbl_history SET
                    name='$name',
                    endname='$name2',
                    value=$value2,
                    time='$time'";
                    $res5=mysqli_query($conn,$sql5);
                    if($res5==true){
                        header("location:".SITEURL."history.php");
                    }
                }else{
                    $_SESSION['money']='<p class="failure">Failed To Transfer</p>';
                    header("location:".SITEURL."customers.php");
                    die();
                }
            }else{
                die();
            }
        }
    ?>
</div>
<?php include('partials/footer.php'); ?>