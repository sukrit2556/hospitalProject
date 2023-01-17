<?php
session_start();
session_destroy();
?>
<script>
alert("Logged out!");
window.location="index.html";
</script>