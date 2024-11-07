<?php
include('conn.php');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $team_id_a = $_POST['team_id_a'];
    $team_id_b = $_POST['team_id_b'];
    $score_a = $_POST['score_a'];
    $score_b = $_POST['score_b'];

    if ($team_id_a == "" || empty($team_id_a)) {
        header('location:admin.php?message=Dont leave it blank!!!');
    } else {
        $query = "UPDATE matches SET team_id_a='$team_id_a', team_id_b='$team_id_b', score_a='$score_a', score_b='$score_b' WHERE id='$id' ";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed".mysqli_error());
        } else {
            header('location:admin.php?insert_msg=Your data has been updated succesfully!');
        }

    }
}

?>