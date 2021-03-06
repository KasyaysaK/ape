<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width">

        <title><?= $title ?></title>

        <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link href="public/css/style.css" rel="stylesheet" /> 

        <script src="https://kit.fontawesome.com/8e724af005.js"></script>
        <script src="public/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({ 
                height : "480",
                selector:'.post-editor', 
                language: 'fr_FR',
                plugins: 'placeholder copy cut paste link lists image code',
                menubar: 'insert edit',
                toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify |  copy | cut | paste | link | numlist bullist outdent indent | image | code | preview',
            });
        </script>
    </head>
    <body class="parallax">
        <section class="header">
            <?php include('includes/header.php'); ?>
        </section>

        <section class="main py-5">
            <?php if (isset($_SESSION) && isset($_SESSION['name']) && $_SESSION['role'] === 'admin') : ?>   
                <?php if(isset($admin_content)){
                    echo $admin_content;
                }else {
                    echo $content;
                }
            ?>
            <?php elseif (isset($_SESSION) && isset($_SESSION['name']) && $_SESSION['role'] === 'author') : ?>   
                <?php if (isset($author_content)) {
                    echo $author_content; 
                } else {
                    echo $content;
                }
            ?>
            <?php elseif (isset($content)) : ?>
                <?= $content ?>
            <?php else : ?>
                <div class="container">
                    <hr class="mb-3" />
                    <h2 class="text-center">Vous n'êtes pas autorisé à vous rendre sur cette page</h2>
                    <a href="index.php"><p class="text-center">Revenir sur la page d'accueil</p></a>
                    <hr class="mb-3" />      
                </div>
            <?php endif; ?>  
        </section>

        <section class="footer">
            <?php include('includes/footer.php'); ?> 
        </section>

        <script src="public/js/jquery.js"></script>
        <script src="public/js/app/cookies.js"></script>
        <script src="public/js/app/users.js"></script>
        <script src="public/js/app/validateForm.js"></script>
        <script src="public/js/app/back.js"></script>
        <script src="public/js/app/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({disable: 'mobile'});
        </script>
    </body>
</html>