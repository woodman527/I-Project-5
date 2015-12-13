<!-- I-Project Team 5
Han-Ica I1BP/I1TP
Datum van aanmaken: 1-12-2015
Laatst bewerkt: 1-12-2015-->
<?php
include('config.php');

global $conn;

//Connects to the database
function database_connect()
{
    global $db_host, $db_connectionInfo, $conn;
    $conn = sqlsrv_connect($db_host, $db_connectionInfo);

    if ($conn === false)
    {
        die(print_r(sqlsrv_errors(), true));
    }
}

//Disconnects from the database
function database_disconnect()
{
    global $conn;
    sqlsrv_close($conn);
}

//Sends a query to the database, returns true if successful
function database_query($sql, $params)
{
    global $conn;
    $resource = sqlsrv_query($conn, $sql, $params);

    if ($resource == false)
    {
        print_r(sqlsrv_errors());
        return false;
    }

    return true;
}

//Sends a query to the database, returns the first row
function database_queryResult($sql, $params)
{
    global $conn;
    $resource = sqlsrv_query($conn, $sql, $params);

    $result = array();

    if ($resource != false)
    {
        $result = sqlsrv_fetch_array($resource, SQLSRV_FETCH_ASSOC);
    }
    else
    {
        die(print_r(sqlsrv_errors(), true));
    }

    return $result;
}

//Sends a query to the database, returns all the rows
function database_queryResults($sql, $params)
{
    global $conn;
    $resource = sqlsrv_query($conn, $sql, $params);

    $result = array();

    if ($resource != false)
    {
        while ($row = sqlsrv_fetch_array($resource, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
    else
    {
        die(print_r(sqlsrv_errors(), true));
    }

    return $result;
}

//Sends a query to the database, returns true if a row is returned
function database_queryHasResult($sql, $params)
{
    return count(database_queryResult($sql, $params)) > 0;
}

//Turns an array in the form of array(index, key, value) into array(index, value)
function database_extractColumn($resultSet, $col)
{
    $result = array();

    foreach ($resultSet as $row)
    {
        $result[] = $row[$col];
    }

    return $result;
}

//Sends a query to the database, returns multiple rows of single columns in the form of array(index, value)
function database_queryColumn($sql, $params, $col)
{
    $queryResult = database_queryResults($sql, $params);
    $result = database_extractColumn($queryResult, $col);

    return $result;
}
<<<<<<< HEAD
?>
=======

>>>>>>> 85f68ed5ad32d8526d61fdbddfea9ac4a3f8c9b7
