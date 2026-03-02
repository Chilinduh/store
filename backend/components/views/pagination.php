<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.07.19
 * Time: 18:50
 */

?>
<?php if($count>1) { ?>
<nav>
    <ul class="pagination">
        <li class="<?=  !($page+1) ? 'disabled' : '' ?> page-item">
            <a class="page-link" href="<?=  $url.'?page='.($page-1) ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <?php for($i=1; $i<($count+2); $i++) { ?>
        <li class="<?=  $i == $page ? 'active' : '' ?> page-item"><a class="page-link" href="<?= $url.'?page='.$i; ?>">

                <?= $i == $page ? '<span class="sr-only">(current)</span>' : ''; ?>
                <?= $i; ?></a>
        </li>
        <?php } ?>

        <li class="<?=  ($page+1>$count+1) ? 'disabled' : '' ?> page-item">
            <a class="page-link" href="<?=  $url.'?page='.($page+1) ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
<?php } ?>