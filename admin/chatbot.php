

<?php include("includes/head.php") ?>
<?php include("includes/navbar.php") ?>
<?php include("includes/sidebar.php") ?>
<!-- Datatable start -->
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Response List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Response List 
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Response List</h4>
            </div>

            <div class="pb-20">
                <table class="data-table table stripe ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Queries</th>
                            <th>Response</th>
                            <th class="table-plus datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM chatbot";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["queries"]; ?></td>
                                <td><?php echo $row["replies"]; ?></td>

                                <td class="table-plus">
                                    <div class="table-actions">
                                        <a data-toggle="modal" data-target="#mdlEditAccount_<?php echo $row["id"]; ?>" data-color="#265ed7">
                                            <i class="dw dw-eye"></i>
                                        </a>
                                        <a href="delete/delete_chat.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this?');" data-color="#e95959">
                                            <i class="dw dw-delete-3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="mdlEditAccount_<?php echo $row["id"]; ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Queries</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="save_data/update_response.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Queries</label>
                                                        <input type="text" class="form-control" name="inquire" value="<?php echo $row["queries"]; ?>">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Answer</label>
                                                        <textarea class="form-control" name="mymessage"><?php echo $row["replies"]; ?></textarea>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>
<?php
include("includes/script.php");
?>
</div>
</div>
</div>
</div>
