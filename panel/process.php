<?php
session_start();
include "db_conn.php";



$path = $_SERVER["SCRIPT_NAME"];
$file = basename($path);

function getNameofRow($sqldb) {
    global $conn;
    $result = $conn->query($sqldb);
    $result2 = mysqli_fetch_array($result);
    return $result2[0];
}

function tableShowTeaching() {
    global $conn;
    $query = "SELECT * FROM teaching ORDER BY ID ASC";
    $result = mysqli_query($conn, $query);
    
    echo '<div  class="table-responsive">

    <table id="teaching_data" class="table table-hover table-striped">
    <thead>
            <tr>
                <td>ID</td>
                <td>Course Name</td>
                <td>Explanation</td>
                <td>Course URL</td>
                <td class="w-12 p-3">Operations</td>
            </tr>
        </thead>';
   
    while($row = mysqli_fetch_array($result))
        {
            echo '
                <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["title"].'</td>
                    <td>'.$row["explanation"].'</td>
                    <td>'.$row["courselink"].'</td>
                    <td><a href="panel_teaching.php?action=edit&id='.$row["id"].'" id="edit-icon"><i class="far fa-edit"></i>Edit</a> <a href="panel_teaching.php?action=remove&id='.$row["id"].'" id="remove-icon"><i class="far fa-trash-alt"></i>Remove</a></td>
                </tr>
            ';
        }
        echo '            </table>
        </div>';
}

function tableShowPublications() {
    global $conn;
    $query = "SELECT * FROM publications ORDER BY ID ASC";
    $result = mysqli_query($conn, $query);
    
    echo '<div  class="table-responsive">

    <table id="publications_data" class="table table-hover table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Citation</td>
                <td>Pub URL</td>
                <td class="w-12 p-3">Operations</td>
            </tr>
        </thead>';
   
    while($row = mysqli_fetch_array($result))
        {
            echo '
                <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["title"].'</td>
                    <td>'.$row["citation"].'</td>
                    <td>'.$row["publink"].'</td>
                    <td><a href="panel_publications.php?action=edit&id='.$row["id"].'" id="edit-icon"><i class="far fa-edit"></i>Edit</a> <a href="panel_publications.php?action=remove&id='.$row["id"].'" id="remove-icon"><i class="far fa-trash-alt"></i>Remove</a></td>
                </tr>
            ';
        }
        echo '            </table>
        </div>';
}

function tableShowResearch() {
    global $conn;
    $query = "SELECT * FROM research ORDER BY ID ASC";
    $result = mysqli_query($conn, $query);
    
    echo '<div  class="table-responsive">

    <table id="research_data" class="table table-hover table-striped ">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Content</td>
                <td>Research URL</td>
                <td>Image URL</td>
                <td class="w-12 p-3">Operations</td>
            </tr>
        </thead>';
   
    while($row = mysqli_fetch_array($result))
        {
            echo '
                <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["title"].'</td>
                    <td>'.$row["content"].'</td>
                    <td>'.$row["researchlink"].'</td>
                    <td>'.$row["imglink"].'</td>
                    <td><a href="panel_research.php?action=edit&id='.$row["id"].'" id="edit-icon"><i class="far fa-edit"></i>Edit</a> <a href="panel_research.php?action=remove&id='.$row["id"].'" id="remove-icon"><i class="far fa-trash-alt"></i>Remove</a></td>
                </tr>
            ';
        }
        echo '            </table>
        </div>';
}

function tableShowAbout() {
    global $conn;
    $query = "SELECT * FROM about ORDER BY ID ASC";
    $result = mysqli_query($conn, $query);
    
    echo '<div  class="table-responsive">

    <table id="about_data" class="table table-hover table-striped ">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Content</td>
                <td>Research URL</td>
                <td>Image URL</td>
                <td class="w-12 p-3">Operations</td>
            </tr>
        </thead>';
   
    while($row = mysqli_fetch_array($result))
        {
            echo '
                <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["title"].'</td>
                    <td>'.$row["content"].'</td>
                    <td>'.$row["researchlink"].'</td>
                    <td>'.$row["imglink"].'</td>
                    <td><a href="panel_research.php?action=edit&id='.$row["id"].'" id="edit-icon"><i class="far fa-edit"></i>Edit</a> <a href="panel_research.php?action=remove&id='.$row["id"].'" id="remove-icon"><i class="far fa-trash-alt"></i>Remove</a></td>
                </tr>
            ';
        }
        echo '            </table>
        </div>';
}

function tableShowNews() {
    global $conn;
    $query = "SELECT * FROM news ORDER BY ID ASC";
    $result = mysqli_query($conn, $query);
    
    echo '<div  class="table-responsive">

    <table id="about_data" class="table table-hover table-striped ">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Content</td>
                <td class="w-12 p-3">Operations</td>
            </tr>
        </thead>';
   
    while($row = mysqli_fetch_array($result))
        {
            echo '
                <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["title"].'</td>
                    <td>'.$row["content"].'</td>
                    <td><a href="panel_news.php?action=edit&id='.$row["id"].'" id="edit-icon"><i class="far fa-edit"></i>Edit</a> <a href="panel_news.php?action=remove&id='.$row["id"].'" id="remove-icon"><i class="far fa-trash-alt"></i>Remove</a></td>
                </tr>
            ';
        }
        echo '            </table>
        </div>';
}

?>