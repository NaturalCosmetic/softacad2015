<?php

function __autoload($classname)
{
    require_once('common/' . $classname . '.php');
}
