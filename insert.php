<?php
include 'header.php';
$table = 'book';
$book_title = isset($_POST['book_title']) ? mysqli_real_escape_string($connect, $_POST['book_title']) : '';
$author = isset($_POST['author']) ? mysqli_real_escape_string($connect, $_POST['author']) : '';
$publisher = isset($_POST['publisher']) ? mysqli_real_escape_string($connect, $_POST['publisher']) : '';
if (isset($_POST['save'])) {
    $query = "INSERT INTO $table (id_book, book_title, author, publisher) VALUES (null,'$book_title', '$author', '$publisher')";
    $result = mysqli_query($connect, $query);
    
    echo '<meta http-equiv="refresh" content="1;url=index.php">';
}
isset($result) ? $message = '<p class="message">Save success</p>' : $message = '';
?>
<section>
    <div class="has-form">
        <h2>Insert Data</h2>
        <?php echo $message; ?>
        <form method="post" action="insert.php">
            <label>book_title
                <input type="text" name="book_title" placeholder="book_title" required>
            </label>
            <br>
            <label>author
                <input type="text" name="author" placeholder="author" required>
            </label>
            <br>
            <label>publisher
                <input type="text" name="publisher" placeholder="publisher" required>
            </label>
            <br>
            <input type="submit" name="save" value="Save" class="link">
        </form>
    </div>
</section>
<?php include 'footer.php'; ?>