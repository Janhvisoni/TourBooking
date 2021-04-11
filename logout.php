<?php
    setcookie("visit","false",time()-1);
    header("Location:index.php?error=logout");
?>