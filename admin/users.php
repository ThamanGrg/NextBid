<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    User Lists
                    <a href="users-create.php" class="btn btn-primary float-end">Add Users</a>
                </h4>
            </div>
            <div class="card-body">
                <?php alertSucess(); ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Is ban</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                             $users = getAll('users');
                             if (mysqli_num_rows($users) > 0){
                             foreach ($users as $usersitem) {
                                 ?>
                                 <tr>
                                     <td><?= $usersitem['user_id'];?></td>
                                     <td><?= $usersitem['username'];?></td>
                                     <td><?= $usersitem['email'];?></td>
                                     <td><?= $usersitem['phone'];?></td>
                                     <td><?= $usersitem['is_ban'] ==1 ?'Banned':'active';?></td>
                                     <td><?= $usersitem['role'];?></td>
                                     <td>
                                        <a href="users-edit.php?id=<?= $usersitem['user_id'];?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="users-delete.php?id=<?= $usersitem['user_id'];?>"><button onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger btn-sm mx-2">Delete</button></a>
                                     </td>
                                 </tr>
                                 <?php
                                }
                               } else {
                                 ?>
                              <tr>
                                <td colspan="7">No Record Found</td>
                               </tr>
                             <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>