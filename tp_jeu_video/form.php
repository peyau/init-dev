<form action="index.php" method="post" name="fjeux">
<table>

<tr><td>Nom : </td><td><input type="text" value="<?php echo $nom; ?>" name="enom" size="100" maxlength="255" /></td></tr>
<tr><td>Possesseur : </td><td><input type="text" value="<?php echo $possesseur; ?>" name="epossesseur" size="100" maxlength="255" /></td></tr>
<tr><td>Console : </td><td><input type="text" value="<?php echo $console; ?>" name="econsole" size="100" maxlength="255" /></td></tr>
<tr><td>Prix : </td><td><input type="text" value="<?php echo $prix; ?>" name="eprix" size="8" maxlength="8" /></td></tr>
<tr><td>Nbre de joueurs max : </td><td><input type="text" value="<?php echo $nbre_joueurs_max; ?>" name="enbjmax" size="2" maxlength="2" /></td></tr>
<tr><td>Commentaire : </td><td><textarea name="ecomm" cols="80" rows="4"><?php echo $commentaires; ?></textarea></td></tr>

<tr><td colspan="2"><input type="submit" name="bvalider" value="Valider" />
    <input type="submit" name="bannuler" value="Annuler" /></td></tr>
	
<input type="hidden" name="encours" value="<?php echo $encours; ?>" />

</table>

<script type="text/javascript">
document.fjeux.enom.focus();
</script>

</form>