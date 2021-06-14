<?php include('partials/menu.php'); ?>
<div class="choice">
    <h1>Click Your Preferance!</h1>
    <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
       
    ?>
    <table class="chtable">
        <tr>
            <td>
                <a href="<?php echo SITEURL; ?>adduser.php">
                    <img src="images/user (1).png" alt="Add User" style="padding-left:20%;">
                    <p>Add User</p>
                </a>
            </td>
            <td>
                <a href="<?php echo SITEURL; ?>customers.php">
                <img src="images/user (2).png" alt="Tranfer Money" style="padding-left:20%;">
                <p>Transfer Money</p>
                </a>
            </td>
        </tr>
    </table>
</div>
<?php include('partials/footer.php'); ?>