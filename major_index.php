<?php
$conn = new mysqli("localhost", "root", "", "qlsv");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM major";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $result_all = $result->fetch_all(MYSQLI_ASSOC);
  echo "<h1>Danh sách chuyên ngành</h1>";
  echo '<a href="major_add.php">Thêm chuyên ngành</a><br><br>';
  echo '<table border="1"><tr><th>ID</th><th>Tên chuyên ngành</th><th colspan="2">Hành động</th></tr>';
  foreach ($result_all as $row) {
    echo "<tr><td>{$row["id"]}</td><td>{$row["name_major"]}</td>";
    echo '<td>
            <form method="post" action="major_edit.php">
              <input type="hidden" name="id" value="'.$row['id'].'"/>
              <input type="submit" value="Sửa"/>
            </form>
          </td>';
    echo '<td>
            <form method="post" action="major_xoa.php">
              <input type="hidden" name="id" value="'.$row['id'].'"/>
              <input type="submit" value="Xóa"/>
            </form>
          </td></tr>';
  }
  echo "</table>";
} else {
  echo "Không có chuyên ngành nào.";
}
$conn->close();
?>
