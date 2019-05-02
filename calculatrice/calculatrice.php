<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Calculatrice</title>
</head>
<body>

<?php
// Initialisation
if (!isset($_SESSION["nbAffiche"])) {
    $_SESSION["nbAffiche"]="0";
}
if (!isset($_SESSION["operateur"])) {
    $_SESSION["operateur"]="=";
}
if (!isset($_SESSION["nbAfficheSuperpose"])) {
    $_SESSION["nbAfficheSuperpose"]="=";
}
if (!isset($_SESSION["concat"])) {
    $_SESSION["concat"]=FALSE;
}
if (!isset($_SESSION['id'])) {
    $_SESSION['id']=false;
}

function calcule($nb1,$operateur,$nb2)
    {
        switch($operateur)
            {
                case "+" :
                    $resultat=$nb1+$nb2;
                break;

                case "-" :
                    $resultat=$nb1-$nb2;
                break;

                case "*" :
                    $resultat=$nb1*$nb2;
                break;

                case "/" :
                    if($nb2==0) {
                        $resultat="Division par 0 impossible";
                    } else {
                        $resultat=$nb1/$nb2;
                    }
                break;

                case "=" :
                    $resultat=$nb2;
                break;
            }
        return $resultat;
    }

if (isset($_POST["cmd"])) {
    $cmd = trim($_POST["cmd"]);
} else {
    $cmd ="";
}

switch($cmd) {
    case "0" :
    if ($_SESSION['id']) {
        $_SESSION["nbAffiche"]=$cmd;
        $_SESSION['id']=false;
    } else {
        $_SESSION["nbAffiche"]=$_SESSION["nbAffiche"].$cmd;
    }
    break;

    case "1" :
    if ($_SESSION['id']) {
        $_SESSION["nbAffiche"]=$cmd;
        $_SESSION['id']=false;
    } else {
        $_SESSION["nbAffiche"]=$_SESSION["nbAffiche"].$cmd;
    }
    break;

    case "2" :
    if ($_SESSION['id']) {
        $_SESSION["nbAffiche"]=$cmd;
        $_SESSION['id']=false;
    } else {
        $_SESSION["nbAffiche"]=$_SESSION["nbAffiche"].$cmd;
    }
    break;

    case "3" :
    if ($_SESSION['id']) {
        $_SESSION["nbAffiche"]=$cmd;
        $_SESSION['id']=false;
    } else {
        $_SESSION["nbAffiche"]=$_SESSION["nbAffiche"].$cmd;
    }
    break;

    case "4" :
    if ($_SESSION['id']) {
        $_SESSION["nbAffiche"]=$cmd;
        $_SESSION['id']=false;
    } else {
        $_SESSION["nbAffiche"]=$_SESSION["nbAffiche"].$cmd;
    }
    break;

    case "5" :
    if ($_SESSION['id']) {
        $_SESSION["nbAffiche"]=$cmd;
        $_SESSION['id']=false;
    } else {
        $_SESSION["nbAffiche"]=$_SESSION["nbAffiche"].$cmd;
    }
    break;

    case "6" :
    if ($_SESSION['id']) {
        $_SESSION["nbAffiche"]=$cmd;
        $_SESSION['id']=false;
    } else {
        $_SESSION["nbAffiche"]=$_SESSION["nbAffiche"].$cmd;
    }
    break;

    case "7" :
    if ($_SESSION['id']) {
        $_SESSION["nbAffiche"]=$cmd;
        $_SESSION['id']=false;
    } else {
        $_SESSION["nbAffiche"]=$_SESSION["nbAffiche"].$cmd;
    }
    break;

    case "8" :
    if ($_SESSION['id']) {
        $_SESSION["nbAffiche"]=$cmd;
        $_SESSION['id']=false;
    } else {
        $_SESSION["nbAffiche"]=$_SESSION["nbAffiche"].$cmd;
    }
    break;

    case "9" :
    if ($_SESSION['id']) {
        $_SESSION["nbAffiche"]=$cmd;
        $_SESSION['id']=false;
    } else {
        $_SESSION["nbAffiche"]=$_SESSION["nbAffiche"].$cmd;
    }
    break;

    case "+" :
        $_SESSION["operateur"]="+";
        $_SESSION["nbAfficheSuperpose"]=$_SESSION["nbAffiche"];
        $_SESSION['id']=true;
        $_SESSION['concat']=false;
    break;

    case "-" :
        $_SESSION["operateur"]="-";
        $_SESSION["nbAfficheSuperpose"]=$_SESSION["nbAffiche"];
        $_SESSION['id']=true;
        $_SESSION['concat']=false;
    break;

    case "*" :
        $_SESSION["operateur"]="*";
        $_SESSION["nbAfficheSuperpose"]=$_SESSION["nbAffiche"];
        $_SESSION['id']=true;
        $_SESSION['concat']=false;
    break;

    case "/" :
        $_SESSION["operateur"]="/";
        $_SESSION["nbAfficheSuperpose"]=$_SESSION["nbAffiche"];
        $_SESSION['id']=true;
        $_SESSION['concat']=false;
    break;

    case "=" :
        $_SESSION["nbAffiche"]=calcule($_SESSION["nbAfficheSuperpose"],$_SESSION["operateur"],$_SESSION["nbAffiche"]);
        $_SESSION['id']=true;
        $_SESSION['concat']=false;
    break;

    case "." :
	   if ($_SESSION['concat']==false) {
			$_SESSION["nbAffiche"]=$_SESSION["nbAffiche"] .".";
    		$_SESSION['concat']=true;
		}
	break;

    case "c" :
        session_destroy();
        $_SESSION["nbAffiche"]="0";
    break;
}

?>

<table border="2" align="center">
<tr>
	<td>
<table>
<tr height="50">
    <td colspan="5"><table border="1" width="100%" height="100%"><tr><td><?php echo $_SESSION["nbAffiche"]; ?></td></tr></table></td>
</tr>
<form action="calculatrice.php" method="post">
<tr>
	<td align="center"> <input type="submit" name="cmd" value="   7   "></td>
	<td align="center"> <input type="submit" name="cmd" value="   8   "></td>
	<td align="center"> <input type="submit" name="cmd" value="   9   "></td>
	<td align="center"> <input type="submit" name="cmd" value="   +   "></td>
</tr>
<tr>
	<td align="center"> <input type="submit" name="cmd" value="   4   "></td>
	<td align="center"> <input type="submit" name="cmd" value="   5   "></td>
	<td align="center"> <input type="submit" name="cmd" value="   6   "></td>
	<td align="center"> <input type="submit" name="cmd" value="   -   "></td>
</tr>
<tr>
	<td align="center"> <input type="submit" name="cmd" value="   1   "></td>
	<td align="center"> <input type="submit" name="cmd" value="   2   "></td>
	<td align="center"> <input type="submit" name="cmd" value="   3   "></td>
	<td align="center"> <input type="submit" name="cmd" value="   *   "></td>
</tr>
<tr>
	<td align="center"> <input type="submit" name="cmd" value="   0   "></td>
	<td align="center"> <input type="submit" name="cmd" value="   .    "></td>
	<td align="center"> <input type="submit" name="cmd" value="   =   "></td>
	<td align="center"> <input type="submit" name="cmd" value="   /   "></td>
</tr>
<tr>
	<td colspan="4" align="center" width="100%"> <input type="submit" name="cmd" value="                c                "></td>
</tr>

</table>
	</td>
</tr>
</table>
</form>
</body>
</html>
