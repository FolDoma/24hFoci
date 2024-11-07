<?php
include('conn.php');
if (isset($_POST['add_match'])) {

    $team_id_a = $_POST['team_id_a'];
    $team_id_b = $_POST['team_id_b'];

    if ($team_id_a == "" || empty($team_id_a)) {
        header('location:admin.php?message=Dont leave it blank!!!');
    } else {
        $query = "insert into matches (team_id_a, team_id_b) values ('$team_id_a', '$team_id_b')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed".mysqli_error());
        } else {
            header('location:admin.php?insert_msg=Your data has been added succesfully!');
        }

    }
}

?>