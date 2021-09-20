<?php 

$conn = mysqli_connect("localhost", "root", "", "mydb");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;

    }
    return $rows;
}

function cari($keyword) {
    $query = "SELECT * FROM product WHERE nama LIKE '%$keyword%' OR harga LIKE '%$keyword%' OR stok LIKE '%$keyword%'";

    return query($query);

}

function hitung() {
    $query = "SELECT COUNT(id) FROM product;";
    
    return query($query);
}
?>