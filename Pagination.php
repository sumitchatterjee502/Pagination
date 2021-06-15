<?php
//load AESlibrary here
require_once __DIR__ . '/AES256CBC.php';

class Pagination{

    public static function drawPagination($pageno,$countPage,$no_of_records_per_page,$pageUrl){
        
        $no_of_records_per_page = $no_of_records_per_page;
        $offset = ($pageno-1)*$no_of_records_per_page;
        $totalRowss = $countPage;
        $totalPage = ceil($totalRowss/$no_of_records_per_page);

        $prev_next = true;
        $cur_page = $pageno;
        $number_of_pages = $totalPage;
        $ends_count = 1;  //how many items at the ends (before and after [...])
        $middle_count = 2;  //how many items before and after current page
        $dots = false;

        ?>
        <ul class="pagination pagination-sm">
            <?php
            if ($prev_next && $cur_page && 1 < $cur_page) {  //print previous button?

                ?>
            <li class="prev"><a class="page-link" href="<?= $pageUrl?><?= AES256CBC::encryption($cur_page-1); ?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                <?php
            }
            for ($i = 1; $i <= $number_of_pages; $i++) {
                if ($i == $cur_page) {
                   ?>
                   <li class="page-item active"><a class="page-link" href="<?= $pageUrl?><?= AES256CBC::encryption($i); ?>"><?php echo $i; ?></a></li>
                   <?php
                    $dots = true;
                } else {
                    if ($i <= $ends_count || ($cur_page && $i >= $cur_page - $middle_count && $i <= $cur_page + $middle_count) || $i > $number_of_pages - $ends_count) { 
                      ?>
                   <li class="page-item"><a class="page-link" href="<?= $pageUrl?><?= AES256CBC::encryption($i); ?>"><?php echo $i; ?></a></li>
                      <?php
                        $dots = true;
                    } elseif ($dots) {
                        ?>
                        <li class="page-item"><a class="page-link">&hellip;</a></li>
                        <?php
                        $dots = false;
                    }
                }
            }
            if ($prev_next && $cur_page && ($cur_page < $number_of_pages || -1 == $number_of_pages)) { //print next button?
                ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $pageUrl?><?= AES256CBC::encryption($cur_page+1); ?>">&nbsp; <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </li>
                <?php
            }
            ?>
        </ul>
    <?php
    }

    public static function drawScriptPagination($pageno,$countPage,$no_of_records_per_page,$pageUrl){
        
        $no_of_records_per_page = $no_of_records_per_page;
        $offset = ($pageno-1)*$no_of_records_per_page;
        $totalRowss = $countPage;
        $totalPage = ceil($totalRowss/$no_of_records_per_page);

        $prev_next = true;
        $cur_page = $pageno;
        $number_of_pages = $totalPage;
        $ends_count = 1;  //how many items at the ends (before and after [...])
        $middle_count = 2;  //how many items before and after current page
        $dots = false;

        ?>
        <ul class="pagination pagination-sm">
            <?php
            if ($prev_next && $cur_page && 1 < $cur_page) {  //print previous button?

                ?>
            <li class="prev"><button class="page-link" value="<?= AES256CBC::encryption($cur_page-1); ?>"><i class="fas fa-angle-double-left" aria-hidden="true"></i></button></li>
                <?php
            }
            for ($i = 1; $i <= $number_of_pages; $i++) {
                if ($i == $cur_page) {
                   ?>
                   <li class="page-item active"><button class="page-link" value="<?= AES256CBC::encryption($i); ?>"><?php echo $i; ?></button></li>
                   <?php
                    $dots = true;
                } else {
                    if ($i <= $ends_count || ($cur_page && $i >= $cur_page - $middle_count && $i <= $cur_page + $middle_count) || $i > $number_of_pages - $ends_count) { 
                      ?>
                   <li class="page-item"><button class="page-link" value="<?= AES256CBC::encryption($i); ?>"><?php echo $i; ?></button></li>
                      <?php
                        $dots = true;
                    } elseif ($dots) {
                        ?>
                        <li class="page-item"><button class="page-link">&hellip;</button></li>
                        <?php
                        $dots = false;
                    }
                }
            }
            if ($prev_next && $cur_page && ($cur_page < $number_of_pages || -1 == $number_of_pages)) { //print next button?
                ?>
                    <li class="page-item">
                        <button class="page-link" value="<?= AES256CBC::encryption($cur_page+1); ?>">&nbsp; <i class="fas fa-angle-double-right" aria-hidden="true"></i></button>
                    </li>
                <?php
            }
            ?>
        </ul>
    <?php
    }
}
?>
