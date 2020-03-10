<?php $title = htmlspecialchars('APE : Formulaire de contact'); ?>

<?php ob_start(); ?>

<div class="container">
    <div>
        <hr class="mb-3" />
        <div class="header-list d-flex align-items-center justify-content-between">
            <button class="back-button btn icons"><i class="icon fas fa-arrow-left"></i></button>
            <h2 class="text-center title">Contact</h2>
            <a href=""></a>
        </div>
        <hr class="mb-3" />
    </div>
    <div  class="col-md-12 my-4 ">
        <?php if (isset($_SESSION) && isset($_SESSION['name'])) : ?>
        <form action="index.php?action=send_message" onsubmit="return validateContactForm()" method="POST">
            <div class="form-group">
                <label for="name">Votre pseudo</label>
                <input type="text" name="name" value="<?= $_SESSION['name'] ?>" class="form-control" disabled/>
                <input type="hidden" name="username" value="<?= $_SESSION['name'] ?>" />
            </div>
            <div class="form-group">
                <label for="email">Votre adresse email</label>
                <input id="contactEmail" type="email" name="email" placeholder="" class="form-control" />
                <div class="error" id="contactEmailError"></div>
            </div>
            <div class="form-group">
                <label for="message">Votre message</label>
                <textarea id="contactMessage" name="message" placeholder="Écrivez ici" class="form-control"></textarea>
                <div class="error" id="contactMessageError"></div>
            </div>

            <hr class="mb-3"></hr>
            <input type="submit" name="send_message" value="envoyer" class="title btn btn-outline-success mt-2">
        </form>
        <?php else : ?>
        <p class="text-center">Nous vous remercions de l'intérêt que vous nous portez. Afin de faciliter la communication, nous vous demandons de bien vouloir vous <a href="#" data-toggle="modal" data-target="#login-form">vous connecter</a>. <br /> Vous n'êtes pas encore membre ? <a href="index.php?action=login">Inscrivez-vous</a> en quelques secondes !</p>
        <?php endif; ?>
    </div>
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>  


