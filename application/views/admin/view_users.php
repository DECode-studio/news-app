<div class="container-fluid py-4">

    <div class="row mt-4">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">favorite</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Like</p>
                        <h4 class="mb-0">2,300</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">visibility</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Seen</p>
                        <h4 class="mb-0">3,462</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Users's List</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($user->result_array() as $user_data) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl" style="width: 50px; height: 50px;">
                                                    <i class="material-icons opacity-10">person</i>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center ms-3">
                                                    <h6 class="mb-0 text-sm"><?= $user_data['user_name']; ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $user_data['user_email']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $user_data['user_category']; ?></p>
                                            <p class="text-xs text-secondary mb-0">Portal</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm <?php echo $user_data['user_status'] == 'online' ? 'bg-gradient-success' : 'bg-gradient-secondary' ?>"><?= $user_data['user_status']; ?></span>
                                        </td>
                                        <td class="align-middle">

                                            <div class="ms-auto text-end">
                                                <a type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" href="<?= base_url('user/deleteuser/' . $user_data['user_id']) ?>">
                                                    <i class="material-icons text-sm me-2">delete</i>Delete
                                                </a>
                                                <a class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#frm_update_user" data-bs-whatever="@mdo" onclick="showData('<?php echo $user_data['user_id']; ?>', '<?php echo $user_data['user_name']; ?>', '<?php echo $user_data['user_email']; ?>', '<?php echo $user_data['user_category']; ?>', '<?php echo $user_data['user_status']; ?>', '<?php echo $user_data['user_password']; ?>')">
                                                    <i class="material-icons text-sm me-2">edit</i>Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-bs-toggle="modal" data-bs-target="#frm_add_user" data-bs-whatever="@mdo" onclick="addData()">
        <i class="material-icons py-2" style="font-size: 30px;">add</i>
    </a>
</div>

<div class="modal fade" id="frm_add_user" tabindex="-1" aria-labelledby="frm_add_user" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="frm_add_user">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" method='post' action="<?= base_url('user/adduser') ?>" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="txt_name" class="form-label">User name</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_name" name="txt_name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_email" class="form-label">Email address</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_email" name="txt_email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cb_category" class="form-label">Category</label>
                        <select class="form-select px-2" id="cb_category" name="cb_category">
                            <option class="form-select" selected>Choose user category</option>
                            <option class="form-select" value="user">User</option>
                            <option class="form-select" value="author">Author</option>
                            <option class="form-select" value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txt_password" class="form-label">Password</label>
                        <div class="input-group input-group-outline">
                            <input type="password" class="form-control" id="txt_password" name="txt_password">
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="ch_show" onclick="showPassword()">
                        <label class="form-check-label" for="ch_show">show password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="frm_update_user" tabindex="-1" aria-labelledby="frm_update_user" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="frm_update_user">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" method='post' action="<?= base_url('user/updateuser') ?>" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="mb-3" hidden>
                        <label for="txt_update_id" class="form-label">User id</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_update_id" name="txt_update_id">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_update_name" class="form-label">User name</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_update_name" name="txt_update_name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_update_email" class="form-label">Email address</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_update_email" name="txt_update_email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cb_update_category" class="form-label">Category</label>
                        <select class="form-select px-2" id="cb_update_category" name="cb_update_category">
                            <option class="form-select" selected>Choose user category</option>
                            <option class="form-select" value="user">User</option>
                            <option class="form-select" value="author">Author</option>
                            <option class="form-select" value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3" hidden>
                        <label for="txt_update_status" class="form-label">User status</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_update_status" name="txt_update_status">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_update_password" class="form-label">Password</label>
                        <div class="input-group input-group-outline">
                            <input type="password" class="form-control" id="txt_update_password" name="txt_update_password">
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="ch_update_show" onclick="showPassword()">
                        <label class="form-check-label" for="ch_update_show">show password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var txt_id = document.getElementById('txt_update_id')
    var txt_name = document.getElementById('txt_update_name')
    var txt_email = document.getElementById('txt_update_email')
    var cb_category = document.getElementById('cb_update_category')
    var txt_status = document.getElementById('txt_update_status')
    var txt_password = document.getElementById('txt_update_password')
    var txt_pass = document.getElementById('txt_password')
    var ch_show = document.getElementById('ch_update_show')

    function showPassword() {
        txt_password.type === "password" ? txt_password.type = "text" : txt_password.type = "password"
        txt_pass.type === "password" ? txt_pass.type = "text" : txt_pass.type = "password"
    }

    function showData(userId, userName, userEmail, userCategory, userStatus, userPassword) {
        txt_id.value = userId;
        txt_name.value = userName;
        txt_email.value = userEmail;
        cb_category.value = userCategory;
        txt_status.value = userStatus;
        txt_password.value = userPassword;

        inputType = 'update'
    }
</script>