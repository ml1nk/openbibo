<?php
function cryptmytext($text)
{
return hash('sha512', $text);
}