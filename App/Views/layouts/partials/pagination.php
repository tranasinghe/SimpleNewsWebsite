
<?php
    $prev = 0; $next = $pages;
    if($current_page > 1) {
        $prev = $current_page -1;
    }
    if($current_page < $pages) {
        $next = $current_page + 1;
    }
    
    echo "<a href='?page=".$prev."'><<</a></center>";

    for ($i = 1; $i <= $pages; $i++) {
        echo "<a href=?page=$i class= ".($current_page == $i ? 'current-page' : '').">$i</a></center>";
    }
    echo "<a href='?page=$pages' >>></a></center>";
?>
