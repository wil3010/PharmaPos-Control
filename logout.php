<?php
session_start();
$_SESSION['alogin']=="";
session_unset();
$_SESSION['errmsg']="¡Regrese pronto! ha cerrado sesión!";
?>
<script language="javascript">
document.location="index.php";
</script>
