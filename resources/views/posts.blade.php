<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <?php foreach($posts as $post) : ?>
        <article>
            <?= $post;?>
        </article>
        <?php endforeach; ?>
       
    </body>