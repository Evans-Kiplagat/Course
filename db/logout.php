<?php

session_start();

 //destroy session
session_unset();
/*
echo <<<_END
<script>location.href="../index.php"</script>
_END;*/   

 header("location:../index.php");             


