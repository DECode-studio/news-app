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
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
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
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-bs-toggle="modal" data-bs-target="#frm_add_user" data-bs-whatever="@mdo">
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
            <form role="form" method='post' action="<?php echo base_url('user/adduser') ?>" enctype='multipart/form-data'>
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

<script>
    var ch_show = document.getElementById('ch_show')
    var txt_password = document.getElementById('txt_password')

    function showPassword() {
        txt_password.type === "password" ? txt_password.type = "text" : txt_password.type = "password"
    }
</script>