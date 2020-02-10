<?php
if(!isset($_SESSION))
{
    session_start();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width">

        <title><?= $title ?></title>


        <link href="https://fonts.googleapis.com/css?family=Handlee|Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="public/css/style.css" rel="stylesheet" /> 

        <script src="https://kit.fontawesome.com/8e724af005.js"></script>
        <script src="public/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <script type="text/javascript">
            tinymce.init({ 
                height : "480",
                selector:'.post-editor', 
                language: 'fr_FR',
                plugins: 'image code',
                toolbar: 'undo redo | image code',
                // without images_upload_url set, Upload tab won't show up
                images_upload_url: 'upload.php',
                // override default upload handler to simulate successful upload
                images_upload_handler: function (blobInfo, success, failure) {
                    var xhr, formData;

                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', 'upload.php');
                  
                    xhr.onload = function() {
                        var json;
                    
                        if (xhr.status != 200) {
                            failure('HTTP Error: ' + xhr.status);
                            return;
                        }
                    
                        json = JSON.parse(xhr.responseText);
                    
                        if (!json || typeof json.location != 'string') {
                            failure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                    
                        success(json.location);
                    };
                  
                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                  
                    xhr.send(formData);
                },
            });
        </script>
    </head>
    <body class="parallax">
        
        <section class="header">
            <?php include('header.php'); ?>
        </section>

        <section class="main py-5">
            <div class="container">
                <?= $content ?>          
            </div>
        </section>

        <section class="footer">
            <?php include('footer.php'); ?> 
        </section>

        <script src="public/js/jquery.js"></script>
        <script src="public/js/app/users.js"></script>
        <script src="public/js/app/login.js"></script>
        <script src="public/js/app/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>
</html>