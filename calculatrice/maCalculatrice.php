<?php
session_start();
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
            <TD><input type="text" disabled></TD>
        </TR>
    </TABLE>
        <TABLE>
        <TR>
            <TD><input type="submit" name="chiffre" value="   7   "></TD>
            <TD><input type="submit" name="chiffre" value="   8   "></TD>
            <TD><input type="submit" name="chiffre" value="   9   "></TD>
            <TD><input type="submit" name="operateur" value="   +   "></TD>
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
            <TD colspan="4"><input type="submit" name="operateur" value="                     =                     "></TD>
        </TR>
    </TABLE>
</FORM>

</BODY>
</HTML>
