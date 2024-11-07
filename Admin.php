<title>Admin panel XXX</title>
</head>

<body>
    <div style="margin: 10px 50px;">

        <?php include('header.php'); ?>
        <?php include('conn.php'); ?>

        <div class="box1" style="float: inline-end; margin-bottom: 10px; ">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">Add match</button>
        </div>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Team A</th>
                    <th scope="col">Team B</th>
                    <th scope="col">Score A</th>
                    <th scope="col">Score B</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM matches";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("query Failed" . mysqli_error($connection));
                } else {
                    $row_count = 0; // Initialize a counter
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td scope="row"><?php echo $row['id']; ?></td>
                            <td><?php echo $row['team_id_a']; ?></td>
                            <td><?php echo $row['team_id_b']; ?></td>
                            <?php if ($row_count === 0): // Check if it's the first row ?>
                                <td><?php echo $row['score_a']; ?></td>
                                <td><?php echo $row['score_b']; ?></td>
                            <?php else: ?>
                                <td><?php echo $row['score_a']; ?></td>
                                <td><?php echo $row['score_b']; ?></td>
                            <?php endif; ?>
                            <td><button class="btn btn-success updatebtn" data-bs-toggle="modal"
                                    data-bs-target="#update">Update</button></td>
                            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">Delete</button>
                            </td>
                        </tr>
                        <?php
                        $row_count++; // Increment the counter after each row
                    }
                }
                ?>


            </tbody>
        </table>

        <?php
        if (isset($_GET['message'])) {
            echo "<h6>" . $_GET['message'] . "<h6>";
        }
        ?>

        <?php
        if (isset($_GET['insert_msg'])) {
            echo "<h6>" . $_GET['insert_msg'] . "<h6>";
        }
        ?>

        <!-- Add -->
        <form action="insert_data.php" method="post">
            <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add match</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="team_id_a">Team A</label>
                                <input type="number" name="team_id_a">
                            </div>
                            <div class="form-group">
                                <label for="team_id_b">Team B</label>
                                <input type="number" name="team_id_b">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="add_match" value="Add"></input>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <!-- Update -->
        <form action="update_data.php" method="post">
            <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="team_id_a">Team A</label>
                                <input type="number" name="team_id_a" id="team_id_a">
                            </div>
                            <div class="form-group">
                                <label for="team_id_b">Team B</label>
                                <input type="number" name="team_id_b" id="team_id_b">
                            </div>
                            <div class="form-group">
                                <label for="score_a">Score A</label>
                                <input type="number" name="score_a" id="score_a">
                            </div>
                            <div class="form-group">
                                <label for="score_b">Score B</label>
                                <input type="number" name="score_b" id="score_b">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="update" value="Update"></input>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Delete -->
        <form action="insert_data.php" method="post">
            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add match</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="team_id_a">Team A</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="add_match" value="Add"></input>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</body>
<?php include('footer.php'); ?>