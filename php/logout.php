<?php

if (!session_id()) {
    session_start();
}

unset($_SESSION["logged_in"]);

?>

<script>
    alert("You have successfully logged out!");
    location.replace("../login");
</script>
