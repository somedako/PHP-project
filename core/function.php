<?php
function connect()
{
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    mysqli_set_charset($conn, 'utf8');
    if (!$conn) {
        die('Connection failed:' . mysqli_connect_error());
    }
    return $conn;
}

function logOut($conn)
{
    $sql = 'SELECT * FROM admin';
    $result = mysqli_query($conn, $sql);
    $login = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $login[] = $row;
        }
    }
    return $login;
}

function menu($conn)
{
    $sql = 'SELECT * FROM nav';
    $result = mysqli_query($conn, $sql);
    $nav = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nav[] = $row;
        }
    }
    return $nav;
}

function info($conn)
{
    $sql = 'SELECT * FROM info';
    $result = mysqli_query($conn, $sql);
    $inf = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $inf[] = $row;
        }
    }
    return $inf;
}

function infoMain($conn)
{
   $offset = 0;
   if (isset($_GET['page']) && trim($_GET['page'])!=''){
       $offset = trim($_GET['page']);
   }

    $sql = "SELECT * FROM info ORDER BY id DESC LIMIT 3 OFFSET ".$offset*3;
    $result = mysqli_query($conn, $sql);
    $inf = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $inf[] = $row;
        }
    }
    return $inf;
}

function selectArticle($conn)
{
    $sql = "SELECT * FROM info WHERE id=".$_GET['id'];
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    return false;
}

function paginationCount($conn)
{
    $sql = "SELECT * FROM info";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($result);
    return ceil($result/3);
}

function getAllCategories($conn)
{
    $sql = 'SELECT * FROM categories';
    $result = mysqli_query($conn, $sql);
    $cat = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cat[] = $row;
        }
    }
    return $cat;
}

function getArticles($conn)
{
    $sql = 'SELECT * FROM info  WHERE categorie_id='.$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $art = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $art[] = $row;
        }
    }
    return $art;
}


function deleteArticle($conn, $id)
{
    $sql = 'DELETE FROM info WHERE id='.$id;
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return 'Error deleting record: '. mysqli_error();
    }
}


function close($conn)
{
    mysqli_close($conn);
}