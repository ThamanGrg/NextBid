    <?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit User
                        <a href="users.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <?php
                        $paramResult = checkParamId('userid');
                            if(!is_numeric($paramResult)){
                                echo'<h5>'.$paramResult.'</h5>';
                                return false;
                            }
                            $user=getById('users',checkParamId('userid'));                                 
                            if($user['status'] == 200)
                            {
                             ?>
                             <input type="hidden" name="UserId" value="<?=$user['data']['userid'];?>">
                                 <div class="row">
                                   <div class="mb-3">
                                            <label>Username</label>
                                            <input type="text" name="Username" value="<?= $user['data']['Username'];?>" required class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>Phone No.</label>
                                            <input type="text" name="phone"  value="<?= $user['data']['Phone'];?>" required class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" value="<?= $user['data']['Email'];?>"required class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="password" name="password" value="<?= $user['data']['Password'];?>"required class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>Select Role</label>
                                            <select name="role" required class="form-select">
                                                <option value="">Select Role</option>
                                                <option value="admin" <?= $user['data']['role'] == 'admin' ? 'selected':'';?>>Admin</option>
                                                <option value="user"  <?= $user['data']['role'] == 'user' ? 'selected':'';?>>User</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label>is_ban
                                            </label>
                                            <br>
                                            <input type="checkbox" name="is_ban" <?= $user['data']['is_ban'] == true ?'checked':'';?> style="width:30px;height:30px">
                                        </div>
                                    </div>      
                                    <div class="mb-3 text-end">
                                        <br>
                                        <button type="submit" name="updateUsers" class="btn btn-primary">Update</button>
                                    </div>
                                <?php
                            }
                            else
                            {
                                echo '<h5>'.$user['message'];'</h5>';
                            }
                        
                        ?>
                    </div>
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="Username" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Phone No.</label>
                            <input type="text" name="phone" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Select Role</label>
                            <select name="role" required class="form-select">
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>is_ban</label>
                            <br>
                            <input type="checkbox" name="is_ban" style="width:30px;height:30px">
                        </div>

                        <div class="mb-3 text-end">
                         <button type="submit" name="updateUsers" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 <?php include('includes/footer.php');?>
