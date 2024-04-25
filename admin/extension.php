<?php
if (extension_loaded('pdo')) {
    echo 'L\'extension PDO est chargée.';
} else {
    echo 'L\'extension PDO n\'est pas chargée.';
}
?>