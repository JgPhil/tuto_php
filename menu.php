<?php

if (!function_exists('nav_item')) {
    function nav_item(string $link, string $title, string $place): string
    {
        $isActive = $place === 'top' &&  $_SERVER['REQUEST_URI'] === $link ? 'active' : '';
        return ' <li class="nav-item ' . $isActive . '">
    <a class="nav-link ' . $isActive . '" aria-current="page" href="' . $link . '">' . $title . '</a>
</li>';
    }
}




echo nav_item('/index.php', 'Accueil', $place);
echo nav_item('/contact.php', 'Contact', $place);
