
<div>
    <table>
        <tr>
        
        <th>Titre de l'article</th>
        <th>Nbr vu</th>
        <th>Nbr commentaire   </th>
        <th>   Date de publication</th>
        </tr>
        <?php ?>
        <?php foreach($article as $articles) { ?>
            <tr>
            <td><?= $articles->getTitle() ?></td>
            <td><?= $articles->getViewArticle() ?></td>
            <?php //foreach($comments as $comment) { ?>
                <td><?= count($comments) ?> <a href="index.php?action=monitoringComment&id=<?= $articles->getId() ?>">(monitorer commentaire)</a></td>
            <?php //} ?>   
            <td><?= Utils::convertDateToFrenchFormat($articles->getDateCreation()) ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
