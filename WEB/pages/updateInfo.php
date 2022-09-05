<?php
$email=$_POST['Email'];
$telefono=$_POST['Telefono'];
$newUsername=$_POST['Username'];
$oldUsername= $_SESSION['Username'];

if ($_SESSION['tipo']=="P")
{
if ($oldUsername==$newUsername)
{
    $_SESSION['usernameesistente']=0;
    $sql="UPDATE utenti SET Username='$newUsername',  Telefono='$telefono', Email='$email' WHERE Username='$oldUsername'";
$rs=MySqli_query($con,$sql) or die ("Update fallito");
$_SESSION['Username']=$newUsername;
header ('Location: ?page=homepage.php');
}
else
{
$sql = "SELECT COUNT(*) FROM utenti WHERE Username='$newUsername'";
        $rs = MySqli_Query($con, $sql);
        $row = MySqli_fetch_row($rs);
        $numero = $row[0];
        if ($numero!=0)
        {
            $_SESSION['usernameesistente'] =1;
           
            header ('Location: ?page=infoaccount.php');
        }
        else
        {
        $sql2 = "SELECT COUNT(*) FROM medici WHERE Username='$newUsername'";
        $rs2 = MySqli_Query($con, $sql2) or die ("QUERY FALLITA");
        $row2 = MySqli_fetch_row($rs2);
        $numero2 = $row2[0];
        if ($numero2!=0)
        {
            $_SESSION['usernameesistente'] =1;
            header ('Location: ?page=infoaccount.php');
        }
        else{
   
$sql="UPDATE utenti SET Username='$newUsername',  Telefono='$telefono', Email='$email' WHERE Username='$oldUsername'";
$rs=MySqli_query($con,$sql) or die ("Update fallito");
$_SESSION['Username']=$newUsername;
$_SESSION['usernameesistente']=0; 
header ('Location: ?page=homepage.php');
        }

}
    }
}
else

{
    if ($oldUsername==$newUsername)
{
    $_SESSION['usernameesistente']=0;
    $sql="UPDATE medici SET Username='$newUsername',  Telefono='$telefono', Email='$email' WHERE Username='$oldUsername'";
$rs=MySqli_query($con,$sql) or die ("Update fallito");
$_SESSION['Username']=$newUsername;
header ('Location: ?page=homepage.php');
}
else
{
$sql = "SELECT COUNT(*) FROM medici WHERE Username='$newUsername'";
        $rs = MySqli_Query($con, $sql);
        $row = MySqli_fetch_row($rs);
        $numero = $row[0];
        if ($numero!=0)
        {
            $_SESSION['usernameesistente'] =1;
           
            header ('Location: ?page=infoaccount.php');
        }
        else
        {
        $sql2 = "SELECT COUNT(*) FROM utenti WHERE Username='$newUsername'";
        $rs2 = MySqli_Query($con, $sql2) or die ("QUERY FALLITA");
        $row2 = MySqli_fetch_row($rs2);
        $numero2 = $row2[0];
        if ($numero2!=0)
        {
            $_SESSION['usernameesistente'] =1;
            header ('Location: ?page=infoaccount.php');
        }
        else{
   
$sql="UPDATE medici SET Username='$newUsername',  Telefono='$telefono', Email='$email' WHERE Username='$oldUsername'";
$rs=MySqli_query($con,$sql) or die ("Update fallito");
$_SESSION['Username']=$newUsername;
$_SESSION['usernameesistente']=0; 
header ('Location: ?page=homepage.php');
        }

}
    }
}
?>