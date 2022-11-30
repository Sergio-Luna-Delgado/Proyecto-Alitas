<?php

/* Escapa / Sanitizar el HTML */
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

/* Funcion que revisa si el usuario esta autenticado */
function isAuth(): void
{
    if (!isset($_SESSION['login_user'])) {
        header('Location: /');
    }
}

/* Funcion que revisa que el usuario sea admin */
function isAdmin(): void
{
    if (!isset($_SESSION['login_admin'])) {
        header('Location: /');
    }
}

/* Validar que la categoria si exista */
function validateCategories(): void
{
    $categorias = array(
        "Alitas"                => "Alitas",
        "Boneless"              => "Boneless",
        "Papas"                 => "Papas",
        "Combos Legendarios"    => "Combos Legendarios",
    );

    if(!in_array($_GET['categoria'], $categorias)){
        header('location: /404');
    }
}

function islast(string $actual, string $proximo): bool
{
    if ($actual !== $proximo) {
        return true;
    }
    return false;
}