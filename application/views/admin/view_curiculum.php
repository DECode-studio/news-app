<div class="container-fluid py-4">
    <div class="row mt-3">
        <div class="col-12">
            <div class="col-12 d-flex">
                <div class="col-4">
                    <h5>Program Study</h5>

                    <?php $segment = $this->uri->segment(2); ?>

                    <form role="form" action="<?= base_url('admin/' . $segment) ?>" method="post" name="add">
                        <div class="d-flex">

                            <div class="align-self-center">
                                <select id="cb_program_study" name="cb_program_study" class="form-select btn-outline-secondary mb-0 btn-sm d-flex align-items-center justify-content-center">
                                    <option value="" selected>Choose Program Study</option>
                                    <option value="manajemen">Manajemen</option>
                                    <option value="akuntansi">Akuntansi</option>
                                </select>
                            </div>

                            <div class="align-self-center">
                                <button type="submit" class="btn icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl ms-3" style="width: 40px !important; height: 40px !important; padding: 0px !important; margin-bottom: 0px !important;">
                                    <i class="material-icons opacity-10">search</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Criculum's List</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SKS</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Program Study</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lectures</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                foreach ($curiculum->result_array() as $curiculum_data) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl" style="width: 50px; height: 50px;">
                                                    <i class="material-icons opacity-10">book</i>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center ms-3">
                                                    <h6 class="mb-0 text-sm">
                                                        <?= $curiculum_data['curiculum_name']; ?>
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <?= $curiculum_data['curiculum_id']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= $curiculum_data['curiculum_sks']; ?>
                                            </p>
                                            <p class="text-xs text-secondary mb-0">SKS</p>
                                        </td>

                                        <td class="align-middle">
                                            <div class="text-secondary text-xs font-weight-bold text-center">
                                                <?= $curiculum_data['curiculum_program_study']; ?>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <?php
                                            foreach ($lecture->result_array() as $lecture_data) {
                                                foreach ($subject->result_array() as $subject_data) {
                                                    if ($curiculum_data['curiculum_id'] == $subject_data['curiculum_id']) {
                                                        if ($lecture_data['lecture_id'] == $subject_data['lecture_id']) {
                                            ?>
                                                            <div class="text-secondary text-xs font-weight-bold">- <?= $lecture_data['lecture_name']; ?></div>
                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td class="align-middle">
                                            <div class="ms-auto text-end">
                                                <a type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" href="<?= base_url('curiculum/deletecuriculum/' . $curiculum_data['curiculum_id']) ?>">
                                                    <i class="material-icons text-sm me-2">delete</i>Delete
                                                </a>
                                                <a class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#frm_update_curiculum" data-bs-whatever="@mdo" onclick="showData('<?= $curiculum_data['curiculum_id']; ?>', '<?= $curiculum_data['curiculum_name']; ?>', '<?= $curiculum_data['curiculum_sks']; ?>')">
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
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-bs-toggle="modal" data-bs-target="#frm_add_curiculum" data-bs-whatever="@mdo" onclick="">
        <i class="material-icons py-2" style="font-size: 30px;">add</i>
    </a>
</div>

<div class="modal fade" id="frm_add_curiculum" tabindex="-1" aria-labelledby="frm_add_curiculum" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="frm_add_curiculum">Add Curiculum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" method='post' action="<?= base_url('curiculum/addcuriculum') ?>" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="txt_name" class="form-label">Curiculum's name</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_name" name="txt_name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_sks" class="form-label">Number of SKS</label>
                        <div class="input-group input-group-outline">
                            <input type="number" class="form-control" id="txt_sks" name="txt_sks" max="3" min="1" value="1">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cb_program_study" class="form-label">Progrma Study</label>
                        <select id="cb_program_study" name="cb_program_study" class="form-select btn-outline-secondary mb-0 btn-sm d-flex align-items-center justify-content-center">
                            <option selected>Choose Program Study</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Akuntansi">Akuntansi</option>
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

<div class="modal fade" id="frm_update_curiculum" tabindex="-1" aria-labelledby="frm_update_curiculum" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="frm_update_curiculum">Edit Curiculum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" method='post' action="<?= base_url('curiculum/updatecuriculum') ?>" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="txt_edit_id" class="form-label">Curiculum's name</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_edit_id" name="txt_edit_id">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_edit_name" class="form-label">Curiculum's name</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_edit_name" name="txt_edit_name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_edit_sks" class="form-label">Number of SKS</label>
                        <div class="input-group input-group-outline">
                            <input type="number" class="form-control" id="txt_edit_sks" name="txt_edit_sks" max="3" min="1" value="1">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cb_edit_program_study" class="form-label">Progrma Study</label>
                        <select id="cb_edit_program_study" name="cb_edit_program_study" class="form-select btn-outline-secondary mb-0 btn-sm d-flex align-items-center justify-content-center">
                            <option selected>Choose Program Study</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Akuntansi">Akuntansi</option>
                        </select>
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
    var txt_edit_id = document.getElementById('txt_edit_id')
    var txt_edit_name = document.getElementById('txt_edit_name')
    var txt_edit_sks = document.getElementById('txt_edit_sks')

    function showData(curiculumId, curiculumName, curiculumSKS) {
        txt_edit_id.value = curiculumId;
        txt_edit_name.value = curiculumName;
        txt_edit_sks.value = curiculumSKS;
    }
</script>