<?php

function filter($text) {
$text=db::get()->real_escape_string($text);
$text=utf8_decode($text);
return $text;
}
