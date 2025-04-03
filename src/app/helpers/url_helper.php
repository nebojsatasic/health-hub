<?php

/**
 * Simple page redirection
 */
function redirect($page)
{
    header('Location: ' . URLROOT . '/' . $page);
}