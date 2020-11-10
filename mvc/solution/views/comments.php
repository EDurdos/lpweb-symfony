<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Fabien Bellanger">
        <title>LP Web & Mobile - MVC</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <meta name="theme-color" content="#563d7c">

        <style>
            main {
                margin-top: 16px;
            }

            h1, h3 {
                margin-bottom: 24px;
            }
        </style>
    </head>

    <body>
        <main role="main" class="container">
            <h1><?php echo $post['title'] ?></h1>
            <h3><?php echo $post['description'] ?></h3>

            <button type="button" class="btn btn-primary my-3" onclick="window.location.href = '/index.php?action=posts-list'">
                Liste des posts
            </button>
            
            <div>
            <?php if ($comments && count($comments) > 0) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Créé le</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($comments as $comment) { ?>
                        <tr>
                            <th scope="row"><?php echo $comment['id'] ?></th>
                            <td><?php echo $comment['description'] ?></td>
                            <td><?php echo $comment['created_at'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"></script>
    </body>
</html>
