<?php
function hachage($motDePasse) {
    $motDePasseHache = password_hash($motDePasse, PASSWORD_DEFAULT);
    return $motDePasseHache;
}

?>