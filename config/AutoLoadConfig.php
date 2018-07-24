<?php

spl_autoload_register(function ($class_name) 
{
    if(file_exists("dao/AccessObject/". $class_name . ".php"))
    {
        include_once "dao/AccessObject/". $class_name . ".php";   
    } 
    else if(file_exists("config/". $class_name . ".php"))
    {
        include_once "config/". $class_name . ".php";    
    } 
    else if(file_exists("controller/". $class_name . ".php"))
    {
        include_once "controller/". $class_name . ".php";
    } 
    else if(file_exists("vendor/". $class_name . ".php"))
    {
        include_once "vendor/". $class_name . ".php";   
    } 
    else if(file_exists("model/". $class_name . ".php"))
    {	
        include_once "model/". $class_name . ".php";
    } 
    else if(file_exists("dao/ConnectionFactory/". $class_name . ".php"))
    {
        include_once "dao/ConnectionFactory/". $class_name . ".php";    
    } 
    else if(file_exists("config/". $class_name . ".php"))
    {
		include_once "config/". $class_name . ".php";
    }
    else if(file_exists("libraries/". $class_name . ".php"))
    {
		include_once "libraries/". $class_name . ".php";
    }
     
});