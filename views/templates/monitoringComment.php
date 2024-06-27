
<div>
    <table>
        <tr>
        <th>Pseudo</th>
        <th>Commentaire</th>
        <th>Date</th>
        <th>Supprimer</th>
        </tr>
        <?php foreach($comments as $comment) { ?>
            <tr>
            <td><?= $comment->getPseudo() ?></td>
            <td><?= $comment->getContent() ?></td>
            <td><?= Utils::convertDateToFrenchFormat($comment->getDateCreation()) ?></td>
            <td><div><a href="index.php?action=deleteComment&commentId=<?= $comment->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer ce commentaire ?") ?> >Supprimer</a></div></td>
            </tr>
        <?php } ?>
    </table>
</div>
