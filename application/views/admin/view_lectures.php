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
                                            <button class="btn btn-success" style="height: 17px; width: 50px; font-size: 10px; padding: 0px 0px 0px 0px !important;" data-bs-toggle="modal" data-bs-target="#frm_add_subject" data-bs-whatever="@mdo" onclick="addSubject('<?= $lecture_data['lecture_id']; ?>')">
                                                <i class="material-icons text-sm me-2">add</i>Add
                                            </button>
                                            <?php
                                            foreach ($curiculum->result_array() as $curiculum_data) {
                                                foreach ($subject->result_array() as $subject_data) {

                                                    if ($lecture_data['lecture_id'] == $subject_data['lecture_id']) {
                                                        if ($curiculum_data['curiculum_id'] == $subject_data['curiculum_id']) {
                                            ?>
                                                            <div class="d-flex">
                                                                <div class="text-secondary text-xs font-weight-bold">- <?= $curiculum_data['curiculum_name']; ?>
                                                                </div>
                                                                <a class="btn btn-danger ms-2" style="height: 17px; width: 65px; font-size: 10px; padding: 0px 0px 0px 0px !important;" href="<?= base_url('subject/deletesubject/' . $subject_data['subject_id']) ?>">
                                                                    <i class="material-icons text-sm me-2">delete</i>Delete
                                                                </a>
                                                            </div>
                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= date('D, d M Y', strtotime($lecture_data['lecture_employed'])); ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="ms-auto text-end">
                                                <a type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" href="<?= base_url('lecture/deletelecture/' . $lecture_data['lecture_id']) ?>">
                                                    <i class="material-icons text-sm me-2">delete</i>Delete
                                                </a>
                                                <a class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#frm_update_lecture" data-bs-whatever="@mdo" onclick="showData('<?= $lecture_data['lecture_id']; ?>', '<?= $lecture_data['lecture_name']; ?>', '<?= $lecture_data['lecture_email']; ?>', '<?= $lecture_data['lecture_major']; ?>', '<?= $lecture_data['lecture_employed']; ?>')">
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
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-bs-toggle="modal" data-bs-target="#frm_add_lecture" data-bs-whatever="@mdo" onclick="destroyData()">
        <i class="material-icons py-2" style="font-size: 30px;">add</i>
    </a>
</div>

<div class="modal fade" id="frm_add_subject" tabindex="-1" aria-labelledby="frm_add_subject" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="frm_add_subject">Add Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" method='post' action="<?= base_url('subject/addsubject') ?>" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="mb-3" hidden>
                        <label for="txt_lecture_id" class="form-label">Lecture's Id</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_lecture_id" name="txt_lecture_id">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cb_curiculum" class="form-label">Category</label>
                        <select class="form-select px-2" id="cb_curiculum" name="cb_curiculum">
                            <option class="form-select" selected value="0">Choose Curiculum</option>
                            <?php
                            foreach ($curiculum->result_array() as $curiculum_data) {
                            ?>
                                <option class="form-select" value="<?= $curiculum_data['curiculum_id']; ?>"><?= $curiculum_data['curiculum_name']; ?></option>
                            <?php } ?>
                        </select>
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

<div class="modal fade" id="frm_add_lecture" tabindex="-1" aria-labelledby="frm_add_lecture" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="frm_add_lecture">Add Lecture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" method='post' action="<?= base_url('lecture/addlecture') ?>" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="txt_name" class="form-label">Lecture's name</label>
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
                        <label for="txt_major" class="form-label">Major</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_major" name="txt_major" value="Ekonomi Bisnis" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="dt_employed" class="form-label">Employed</label>
                        <div class="input-group input-group-outline">
                            <input type="datetime-local" class="form-control" id="dt_employed" name="dt_employed">
                        </div>
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

<div class="modal fade" id="frm_update_lecture" tabindex="-1" aria-labelledby="frm_update_lecture" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="frm_update_lecture">Edit Lecture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" method='post' action="<?= base_url('lecture/updatelecture') ?>" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="mb-3" hidden>
                        <label for="txt_edit_id" class="form-label">Lecture's ID</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_edit_id" name="txt_edit_id">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_edit_name" class="form-label">Lecture's name</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_edit_name" name="txt_edit_name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_edit_email" class="form-label">Email address</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_edit_email" name="txt_edit_email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_edit_major" class="form-label">Major</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_edit_major" name="txt_edit_major" value="Ekonomi Bisnis" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="dt_edit_employed" class="form-label">Employed</label>
                        <div class="input-group input-group-outline">
                            <input type="datetime-local" class="form-control" id="dt_edit_employed" name="dt_edit_employed">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var txt_id = document.getElementById('txt_id')
    var txt_name = document.getElementById('txt_name')
    var txt_email = document.getElementById('txt_email')
    var txt_major = document.getElementById('txt_major')
    var dt_employed = document.getElementById('dt_employed')
    var txt_edit_id = document.getElementById('txt_edit_id')
    var txt_edit_name = document.getElementById('txt_edit_name')
    var txt_edit_email = document.getElementById('txt_edit_email')
    var txt_edit_major = document.getElementById('txt_edit_major')
    var dt_edit_employed = document.getElementById('dt_edit_employed')
    var txt_lecture_id = document.getElementById('txt_lecture_id')
    var cb_curiculum = document.getElementById('cb_curiculum')

    function showData(lectureId, lectureName, lectureEmail, lectureMajor, lectureEmployed) {
        txt_edit_id.value = lectureId;
        txt_edit_name.value = lectureName;
        txt_edit_email.value = lectureEmail;
        txt_edit_major.value = lectureMajor;
        dt_edit_employed.value = lectureEmployed;
    }

    function destroyData() {
        txt_id.value = "";
        txt_name.value = "";
        txt_email.value = "";
        txt_major.value = "";
        dt_employed.value = "";
        cb_curiculum.value = 0;
    }

    function addSubject(lectureId) {
        txt_lecture_id.value = lectureId
    }
</script>