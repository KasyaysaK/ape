<?php $title = htmlspecialchars('Association Parents-Élèves'); ?>

<?php ob_start(); ?>

<div class="container">
    <hr class="mb-3" />
    <h2 class="title text-center">Contact</h2>
    <hr class="mb-3" />
    <div  class="col-md-8 offset-2 my-4 ">
        <?php if (isset($_SESSION)) : ?>
        <form>
            <div class="form-group">
                <label for="username">Votre pseudo</label>
                <input type="text" name="username" placeholder="<?= $_SESSION['username'] ?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="username">Votre adresse email</label>
                <input type="text" name="username" placeholder="" class="form-control" />
            </div>
            <div class="form-group">
                <label for="message">Votre message</label>
                <textarea for="message" placeholder="Écrivez ici" class="form-control"></textarea>
            </div>
        </form>
        <?php else : ?>
        <p class="text-center">Nous vous remercions de l'intérêt que vous nous portez. Afin de faciliter la communication, nous vous demandons de bien vouloir vous <a href="#" data-toggle="modal" data-target="#login-form">vous connecter</a>. <br /> Vous n'êtes pas encore membre ? <a href="index.php?action=login">Inscrivez-vous</a> en quelques secondes !</p>
        <?php endif; ?>
    </div>
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>  


