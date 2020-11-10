<?php include_once('header.php'); ?>

<main role="main" class="container">
    <h1>Liste des posts</h1>
    
    <div>
    <?php if ($posts && count($posts) > 0) { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actif ?</th>
                    <th scope="col">Créé le</th>
                    <th scope="col">Commentaires</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach ($posts as $post) { ?>
                <tr>
                    <th scope="row"><?php echo $post['id'] ?></th>
                    <td><?php echo $post['title'] ?></td>
                    <td><?php echo $post['description'] ?></td>
                    <td><?php echo $post['active'] ? 'Oui' : 'Non' ?></td>
                    <td><?php echo $post['created_at'] ?></td>
                    <td>
                        <a href="/index.php?action=comments-list&post_id=<?php echo $post['id'] ?>">Voir</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
    </div>
</main>

<?php include_once('footer.php'); ?>
