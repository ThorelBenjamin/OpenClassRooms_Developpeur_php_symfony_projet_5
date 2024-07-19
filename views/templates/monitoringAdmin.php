<div>
    <table class="monitoringAdmin">
        <tr>
            <th><a href="?action=monitoringAdmin&prepare=title&order=<?= htmlspecialchars($order) === 'asc' ? 'desc' : 'asc' ?>">Titre de l'article <i class="fa-solid fa-arrow-down-up-across-line"></i></a></th>
            <th><a href="?action=monitoringAdmin&prepare=view_article&order=<?= htmlspecialchars($order) === 'asc' ? 'desc' : 'asc' ?>">Nbr vu <i class="fa-solid fa-arrow-down-up-across-line"></i></a></th>
            <th><a href="?action=monitoringAdmin&prepare=nombre_commentaire&order=<?= htmlspecialchars($order) === 'asc' ? 'desc' : 'asc' ?>">Nbr commentaire <i class="fa-solid fa-arrow-down-up-across-line"></i></a></th>
            <th><a href="?action=monitoringAdmin&prepare=date_creation&order=<?= htmlspecialchars($order) === 'asc' ? 'desc' : 'asc' ?>">Date de publication <i class="fa-solid fa-arrow-down-up-across-line"></i></a></th>
        </tr>
        <?php foreach($article as $articles) { ?>
            <?php 
                $id = $articles->getId();
                $count = isset($commentCounts[$id]) ? $commentCounts[$id] : 0;
            ?>
            <tr>
                <td><?= $articles->getTitle() ?></td>
                <td><?= $articles->getViewArticle() ?></td>
                <td><?= $articles->getNumbersComments() ?> <a href="index.php?action=monitoringComment&id=<?= $articles->getId() ?>">(monitorer commentaire)</a></td>
                <td><?= Utils::convertDateToFrenchFormat($articles->getDateCreation()) ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
