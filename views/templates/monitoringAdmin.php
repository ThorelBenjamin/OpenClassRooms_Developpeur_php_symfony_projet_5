<?php

$sortFunctions = [
    'title' => function($a, $b) use ($order) {
        return $order === 'desc' ? strcmp($b->getTitle(), $a->getTitle()) : strcmp($a->getTitle(), $b->getTitle());
    },
    'view_article' => function($a, $b) use ($order) {
        return $order === 'desc' ? $b->getViewArticle() - $a->getViewArticle() : $a->getViewArticle() - $b->getViewArticle();
    },
    'nombre_commentaire' => function($a, $b) use ($order) {
        return $order === 'desc' ? $b->getNumbersComments() - $a->getNumbersComments() : $a->getNumbersComments() - $b->getNumbersComments();
    },
    'date_creation' => function($a, $b) use ($order) {
        return $order === 'desc' ? strtotime($b->getDateCreation()->format('Y-m-d H:i:s')) - strtotime($a->getDateCreation()->format('Y-m-d H:i:s')) : strtotime($a->getDateCreation()->format('Y-m-d H:i:s')) - strtotime($b->getDateCreation()->format('Y-m-d H:i:s'));
    }
];

if (isset($sortFunctions[$prepare])) {
    usort($article, $sortFunctions[$prepare]);
}
?>

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
