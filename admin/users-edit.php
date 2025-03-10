<?php
// user-edit.php
include('includes/header.php');

$userid = isset($_GET['id']) ? $_GET['id'] : null;
$paramResult = checkParamId('id');
if (!is_numeric($paramResult)) {
    echo '<h5>' . $paramResult . '</h5>';
    exit;
}
$user = getById('users', $userid);
if ($user['status'] == 200) {
?>

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
                        <input type="hidden" name="userId" value="<?= $userid ?>">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" value="<?= $user['data']['username']; ?>" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Phone No.</label>
                            <input type="text" name="phone" value="<?= $user['data']['phone']; ?>" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= $user['data']['email']; ?>" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Leave blank to keep current password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Select Role</label>
                            <select name="role" required class="form-select">
                                <option value="admin" <?= $user['data']['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                <option value="user" <?= $user['data']['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Ban User</label>
                            <input type="checkbox" name="is_ban" <?= $user['data']['is_ban'] ? 'checked' : ''; ?> style="width:30px;height:30px">
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" name="updateUsers" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    echo '<h5>' . $user['message'] . '</h5>';
} ?>
<?php include('includes/footer.php'); ?>