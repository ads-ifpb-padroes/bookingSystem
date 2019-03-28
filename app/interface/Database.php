<?php
/**
 * Created by rodger on 3/17/2019 9:22 PM
 */

interface Database {
    function getHost();

    function setHost($host);

    function getUser();

    function setUser($user);

    function getPass();

    function setPass($pass);

    function getDdbname();

    function setDdbname($dbname);

    function connect();

    function close();
}