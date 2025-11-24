<?php
session_start();
include 'connection.php';

// Get the search term from the AJAX request
$search_term = isset($_POST['search_term']) ? $_POST['search_term'] : '';

// Sanitize the input to prevent SQL injection
$search_term = mysqli_real_escape_string($conn, $search_term);

// Build the query
if (!empty($search_term)) {
    $str = "SELECT * FROM events WHERE title LIKE '%" . $search_term . "%' ORDER BY id DESC";
} else {
    $str = "SELECT * FROM events ORDER BY id DESC";
}

$res = mysqli_query($conn, $str);

// Generate table rows
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res)) {
?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><img src="images/img/<?php echo $row['Profile']; ?>" height="100px" width="100px" style="border-radius:30px"></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['venue']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['time']; ?></td>
        <td><?php echo $row['capacity']; ?></td>
        <td><a class="fa fa-trash fa-lg" onclick="return confirm('Do you want to delete this record?')" href="?id=<?php echo $row['id']; ?>"></a> | <a class="fa fa-pencil fa-lg" href="add_events.php?id=<?php echo $row['id']; ?>"></a></td>
    </tr>
<?php
    }
} else {
    echo '<tr><td colspan="9" class="text-center">No events found.</td></tr>';
}
?>