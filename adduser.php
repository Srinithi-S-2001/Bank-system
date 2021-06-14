<?php include('partials/menu.php') ; ?>
<div class="adduser">
    <h1>Add User</h1>
    <form method="post">
        <table class="none">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="fullname" placeholder="Enter your full name" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" placeholder="Enter Your Email "></td>
            </tr>
            <tr>
                <td>Current Balance:</td>
                <td><input type="number" name="number" value="0.0"></td>
            </tr>
        </table>
        <br><br><br>
        <input type="submit" name="submit" value="Add User" style="margin-left:45%;width:150px;height:50px;font-size:20px;color:#1c524e;font-weight:bold;box-shadow:10px 5px 5px #000000;text-decoration:none;"></input>
    </form>
    <?php 
        if(isset($_POST['submit'])){
            $name=$_POST['fullname'];
            $email=$_POST['email'];
            $balance=$_POST['number'];
            $sql="INSERT INTO tbl_customer SET 
            name='$name',
            email='$email',
            balance=$balance";
            $res=mysqli_query($conn,$sql);
            if($res==true){
                $_SESSION['add']='<p class="success">User Added Successfully</p>';
                header('location:'.SITEURL.'choice.php');
            }else{
                $_SESSION['add']='<p class="failure">Failed to add user</p>';
                header('location:'.SITEURL.'choice.php');
            }
        }
    
    
    ?>
</div>
<?php include('partials/footer.php') ; ?>