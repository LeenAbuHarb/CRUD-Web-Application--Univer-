<?php

require_once 'db.php';
require_once 'util.php';

    $db = new Database;
    $util = new Util;

  // Handle Add New Item Ajax Request
if (isset($_POST['add'])) {
    $name = $util->testInput($_POST['name']);
    $Description = $util->testInput($_POST['Description']);
    $Price = $util->testInput($_POST['Price']);
    $Quantity = $util->testInput($_POST['Quantity']);

    if ($db->insert($name, $Description, $Price, $Quantity)) {
        echo $util->showMessage('success', 'Item inserted successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}

  // Handle Fetch All Items Ajax Request
if (isset($_GET['read'])) {
    $Items = $db->read();
    $output = '';
    if ($Items) {
    foreach ($Items as $row) {
        $output .= '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['Description'] . '</td>
                    <td>' . $row['Price'] .'$</td>
                    <td>' . $row['Quantity'] . '</td>
                    <td>
                        <a href="#" id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editItemModal">Edit</a>

                        <a href="#" id="' . $row['id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                    </td>
                    </tr>';
    }
        echo $output;
    } else {
        echo '<tr>
                <td colspan="6">No Items Found in the Database!</td>
            </tr>';
    }
}

  // Handle Edit Item Ajax Request
    if (isset($_GET['edit'])) {
    $id = $_GET['id'];

    $Items = $db->readOne($id);
    echo json_encode($Items);
}

  // Handle Update Item Ajax Request
if (isset($_POST['update'])) {
    $id = $util->testInput($_POST['id']);
    $name = $util->testInput($_POST['name']);
    $Description = $util->testInput($_POST['Description']);
    $Price = $util->testInput($_POST['Price']);
    $Quantity = $util->testInput($_POST['Quantity']);

    if ($db->update($id, $name, $Description, $Price, $Quantity)) {
        echo $util->showMessage('success', 'Item updated successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}

  // Handle Delete Item Ajax Request
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    if ($db->delete($id)) {
        echo $util->showMessage('info', 'Item deleted successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}

?>