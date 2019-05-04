<?php
session_start();

if(!isset($_SESSION['C'])) $_SESSION['C']=0;
if (!isset($_SESSION["operateur"])) $_SESSION["operateur"]="=";
if (!isset($_SESSION["nb1"])) $_SESSION["nb1"]="";
if (!isset($_SESSION["nb2"])) $_SESSION["nb2"]="";

if (isset($_POST["chiffre"])) {
    $chiffre = trim($_POST["chiffre"]);
} else {
    $chiffre ="";
}


switch($chiffre){
    case '0':
        $_SESSION['C'] = $_SESSION['C'].$chiffre;
    break;
    case '1':
        $_SESSION['C'] = $_SESSION['C'].$chiffre;
    break;
    case '+':
        $_SESSION['nb1'] = $_SESSION['C'];
        $_SESSION['C'] = 0;
    break;
    case '=':
        $_SESSION['nb2'] = $_SESSION['C'];
        $_SESSION['C'] = $_SESSION['nb1'] + $_SESSION['nb2'];
    break;
    case 'C':
        session_destroy();
        $_SESSION["C"]="0";
    break;
}

?>

<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <TITLE>
            Calculatrice
        </TITLE>
    </HEAD>
<BODY>

<FORM METHOD="post" ACTION="maCalculatrice.php">
    <TABLE>
        <TR>
            <?php echo '<TD><input type="text" value="'.$_SESSION['C'].'" style="text-align:right" disabled></TD>';?>
        </TR>
    </TABLE>
        <TABLE>
        <TR>
            <TD><input type="submit" name="chiffre" value="   7   "></TD>
            <TD><input type="submit" name="chiffre" value="   8   "></TD>
            <TD><input type="submit" name="chiffre" value="   9   "></TD>
            <TD><input type="submit" name="chiffre" value="   +   "></TD>
        </TR>
        <TR>
            <TD><input type="submit" name="chiffre" value="   4   "></TD>
            <TD><input type="submit" name="chiffre" value="   5   "></TD>
            <TD><input type="submit" name="chiffre" value="   6   "></TD>
            <TD><input type="submit" name="operateur" value="   -   "></TD>
        </TR>
        <TR>
            <TD><input type="submit" name="chiffre" value="   1   "></TD>
            <TD><input type="submit" name="chiffre" value="   2   "></TD>
            <TD><input type="submit" name="chiffre" value="   3   "></TD>
            <TD><input type="submit" name="operateur" value="   *   "></TD>
        </TR>
        <TR>
            <TD><input type="submit" name="chiffre" value="   C   "></TD>
            <TD><input type="submit" name="chiffre" value="   0   "></TD>
            <TD><input type="submit" name="chiffre" value="   .   "></TD>
            <TD><input type="submit" name="operateur" value="   /   "></TD>
        </TR>
        <TR>
            <TD colspan="4"><input type="submit" name="chiffre" value="                     =                     "></TD>
        </TR>
    </TABLE>
</FORM>

</BODY>
</HTML>
