<?php
    $str = "Manojit<script>alert(1);</script>";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Prevent XSS attack</title>
    </head>
    <body>
        <?php
            echo htmlspecialchars($str,ENT_QUOTES, "UTF-8");
        ?>
        
    </body>
</html>