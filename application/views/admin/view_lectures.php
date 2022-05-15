<div class="container-fluid py-4">
    <div class="row mt-3">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Lectures's List</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lecture</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Major</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subjects </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($lecture->result_array() as $lecture_data) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl" style="width: 50px; height: 50px;">
                                                    <i class="material-icons opacity-10">school</i>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center ms-3">
                                                    <h6 class="mb-0 text-sm"><?= $lecture_data['lecture_name']; ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $lecture_data['lecture_email']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $lecture_data['lecture_major']; ?></p>
                                            <p class="text-xs text-secondary mb-0">Lecture</p>
                                        </td>
                                        <td class="align-middle">
                                            <?php
                                            foreach ($curiculum->result_array() as $curiculum_data) {
                                                foreach ($subject->result_array() as $subject_data) {

                                                    if ($lecture_data['lecture_id'] == $subject_data['lecture_id']) {
                                                        if ($curiculum_data['curiculum_id'] == $subject_data['curiculum_id']) {
                                            ?>
                                                            <div class="text-secondary text-xs font-weight-bold">- <?= $curiculum_data['curiculum_name']; ?></div>
                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= date('D, M Y', strtotime($lecture_data['lecture_employed'])); ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="ms-auto text-end">
                                                <a type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" href="<?= base_url('lecture/deletelecture/' . $lecture_data['lecture_id']) ?>">
                                                    <i class="material-icons text-sm me-2">delete</i>Delete
                                                </a>
                                                <a class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#frm_update_user" data-bs-whatever="@mdo" onclick="">
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
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-bs-toggle="modal" data-bs-target="#frm_add_lecture" data-bs-whatever="@mdo" onclick="">
        <i class="material-icons py-2" style="font-size: 30px;">add</i>
    </a>
</div>

<div class="modal fade" id="frm_add_lecture" tabindex="-1" aria-labelledby="frm_add_lecture" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="frm_add_lecture">Add User</h5>
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