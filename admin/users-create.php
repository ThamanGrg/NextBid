<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add Users
                    <a href="users.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <from action="">
                    <div class="md-3">
                        <label>Name</label>
                        <input type="text" name="name" class="from-control">
                    </div>
                    <label>Phone No.</label>
                    <input type="text" name="phone" class="from-control">
            </div>
            <label>Email</label>
            <input type="email" name="email" class="from-control">
        </div>
        <label>Password</label>
        <input type="Password" name="Password" class="from-control">
    </div>
    <label>Select Role </label>
    <select name="role" class="from-select">
        <option value="">Select Role</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
    <div class="mb-3">
        <label>Select Role </label>
        </br>
        <input type="checkbox" name="is_ban" style="width:30px;height:30px" />
    </div>
</div>
<div class="mb-3">
    <button type="submit" name="saveUsers" class="btn btn-primary">Save</button>
</div>
</from>
</div>
</div>
</div>
</div>

<?php include('includes/footer.php'); ?>