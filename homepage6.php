<?php
session_start();

if (!isset($_SESSION["username"])) {
    echo "Bạn chưa đăng nhập!";
    exit;
}

echo "<h2>Xin chào, " . $_SESSION["username"] . "</h2>";
echo '<a href="thoat.php">Đăng xuất</a>';
?>
