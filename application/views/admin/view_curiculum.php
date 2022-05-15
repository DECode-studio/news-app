<div class="container-fluid py-4">
    <div class="row mt-3">
        <div class="col-12">
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
                                                    <h6 class="mb-0 text-sm"><?= $curiculum_data['curiculum_name']; ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $curiculum_data['curiculum_id']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $curiculum_data['curiculum_sks']; ?></p>
                                            <p class="text-xs text-secondary mb-0">SKS</p>
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
                                                <a type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" href="">
                                                    <i class="material-icons text-sm me-2">delete</i>Delete
                                                </a>
                                                <a class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#frm_update_lecture" data-bs-whatever="@mdo" onclick="">
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
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="material-icons py-2" style="font-size: 30px;">add</i>
    </a>
</div>