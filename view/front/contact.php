<div class="formulaire">
    <p class="titresfooter">Formulaire</p>
    <?php include('formulaire.php'); ?>
    <form method="post" action="formulaire.php">
        <p><input type="text" name="nom" placeholder=" Nom" required /></p>
        <p><input type="email" name="mail" placeholder=" E-mail" required /></p>
        <p><input type="text" name="objet" placeholder=" Objet" /></p>
  </div>
<div class="message">
         <p><textarea name="message" placeholder=" Message" required></textarea></p>
        <input type="submit" value="Envoyer" />
    </form>
</div>

<!-- if user is connected, show the form, else show message "Veuillez vous connecter pour pouvoir nous contacter, lien vers page d'inscription ou modal de connextion" -->