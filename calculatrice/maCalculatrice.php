<?php
session_start();
//session_destroy();
if(!isset($_SESSION['C'])) $_SESSION['C']='';
if (!isset($_SESSION["operateur"])) $_SESSION["operateur"]="=";
if (!isset($_SESSION["nb1"])) $_SESSION["nb1"]="";
if (!isset($_SESSION["nb2"])) $_SESSION["nb2"]="";

if (isset($_POST["commande"])) {
    $commande = trim($_POST["commande"]);
} else {
    $commande ="";
}

switch($commande){
    // Chiffres
    case '0':
        $_SESSION['C'] = $_SESSION['C'].$commande;
    break;
    case '1':
        $_SESSION['C'] = $_SESSION['C'].$commande;
    break;
    case '2':
        $_SESSION['C'] = $_SESSION['C'].$commande;
    break;
    case '3':
        $_SESSION['C'] = $_SESSION['C'].$commande;
    break;
    case '4':
        $_SESSION['C'] = $_SESSION['C'].$commande;
    break;
    case '5':
        $_SESSION['C'] = $_SESSION['C'].$commande;
    break;
    case '6':
        $_SESSION['C'] = $_SESSION['C'].$commande;
    break;
    case '7':
        $_SESSION['C'] = $_SESSION['C'].$commande;
    break;
    case '8':
        $_SESSION['C'] = $_SESSION['C'].$commande;
    break;
    case '9':
        $_SESSION['C'] = $_SESSION['C'].$commande;
    break;
    case '.':
        if(strstr($_SESSION['C'], '.')) {
            $commande='';
        }
        $_SESSION['C'] = $_SESSION['C'].$commande;
    break;

    // Opérateurs
    case '+':
        $_SESSION['operateur']='+';
        $_SESSION['nb1'] = $_SESSION['C'];
        $_SESSION['C'] = '';
    break;
    case '-':
        $_SESSION['operateur']='-';
        $_SESSION['nb1'] = $_SESSION['C'];
        $_SESSION['C'] = '';
    break;
    case '*':
        $_SESSION['operateur']='*';
        $_SESSION['nb1'] = $_SESSION['C'];
        $_SESSION['C'] = '';
    break;
    case '/':
        $_SESSION['operateur']='/';
        $_SESSION['nb1'] = $_SESSION['C'];
        $_SESSION['C'] = '';
    break;

    case '=':
        $_SESSION['nb2'] = $_SESSION['C'];
        switch($_SESSION['operateur']) {
            case '+' :
                $_SESSION['C'] = $_SESSION['nb1'] + $_SESSION['nb2'];
            break;
            case '-' :
                $_SESSION['C'] = $_SESSION['nb1'] - $_SESSION['nb2'];
            break;
            case '*' :
                $_SESSION['C'] = $_SESSION['nb1'] * $_SESSION['nb2'];
            break;
            case '/' :
                $_SESSION['C'] = $_SESSION['nb1'] / $_SESSION['nb2'];
            break;
        }

    break;
    case 'C':
        session_destroy();
        $_SESSION['C']='';
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
            <TD><input type="submit" name="commande" value="   7   "></TD>
            <TD><input type="submit" name="commande" value="   8   "></TD>
            <TD><input type="submit" name="commande" value="   9   "></TD>
            <TD><input type="submit" name="commande" value="   +   "></TD>
        </TR>
        <TR>
            <TD><input type="submit" name="commande" value="   4   "></TD>
            <TD><input type="submit" name="commande" value="   5   "></TD>
            <TD><input type="submit" name="commande" value="   6   "></TD>
            <TD><input type="submit" name="commande" value="   -   "></TD>
        </TR>
        <TR>
            <TD><input type="submit" name="commande" value="   1   "></TD>
            <TD><input type="submit" name="commande" value="   2   "></TD>
            <TD><input type="submit" name="commande" value="   3   "></TD>
            <TD><input type="submit" name="commande" value="   *   "></TD>
        </TR>
        <TR>
            <TD><input type="submit" name="commande" value="   C   "></TD>
            <TD><input type="submit" name="commande" value="   0   "></TD>
            <TD><input type="submit" name="commande" value="   .   "></TD>
            <TD><input type="submit" name="commande" value="   /   "></TD>
        </TR>
        <TR>
            <TD colspan="4"><input type="submit" name="commande" value="                     =                     "></TD>
        </TR>
    </TABLE>
</FORM>

</BODY>
</HTML>
