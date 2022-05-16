<div class="container-fluid py-4">
    <div class="row mt-3">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Event's List</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Time</th>
                                    <th class="text-secondary opacity-7 text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($event->result_array() as $event_data) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl" style="width: 50px; height: 50px;">
                                                    <i class="material-icons opacity-10">event</i>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center ms-3">
                                                    <h6 class="mb-0 text-sm"><?= $event_data['event_title']; ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $event_data['event_id']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= date('D, d M Y', strtotime($event_data['event_time'])); ?> on <?= date('g:i A', strtotime($event_data['event_time'])); ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="ms-auto text-end">
                                                <a type="submit" class="btn btn-link text-success text-gradient px-3 mb-0" href="">
                                                    <i class="material-icons text-sm me-2">visibility</i>show
                                                </a>
                                                <a type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" href="<?= base_url('event/deleteevent/' . $event_data['event_id']) ?>">
                                                    <i class="material-icons text-sm me-2">delete</i>Delete
                                                </a>
                                                <a class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#frm_edit_event" data-bs-whatever="@mdo" onclick="showData('<?= $event_data['event_id']; ?>', '<?= $event_data['event_title']; ?>', '<?= $event_data['event_time']; ?>', '<?= $event_data['event_detail']; ?>')">
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
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" data-bs-toggle="modal" data-bs-target="#frm_add_event" data-bs-whatever="@mdo" onclick="">
        <i class="material-icons py-2" style="font-size: 30px;">add</i>
    </a>
</div>

<div class="modal fade" id="frm_add_event" tabindex="-1" aria-labelledby="frm_add_event" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="frm_add_event">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" method='post' action="<?= base_url('event/addevent') ?>" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="txt_title" class="form-label">Event's title</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_title" name="txt_title">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="dt_time" class="form-label">Time</label>
                        <div class="input-group input-group-outline">
                            <input type="datetime-local" class="form-control" id="dt_time" name="dt_time">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_detail" class="form-label">Content</label>
                        <div class="input-group input-group-outline">
                            <textarea type="text" class="form-control" rows="5" id="txt_detail" name="txt_detail"></textarea>
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

<div class="modal fade" id="frm_edit_event" tabindex="-1" aria-labelledby="frm_edit_event" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="frm_edit_event">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form role="form" method='post' action="<?= base_url('event/updateevent') ?>" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="mb-3" hidden>
                        <label for="txt_edit_id" class="form-label">Event's id</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_edit_id" name="txt_edit_id">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_edit_title" class="form-label">Event's title</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" id="txt_edit_title" name="txt_edit_title">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="dt_edit_time" class="form-label">Time</label>
                        <div class="input-group input-group-outline">
                            <input type="datetime-local" class="form-control" id="dt_edit_time" name="dt_edit_time">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_edit_detail" class="form-label">Content</label>
                        <div class="input-group input-group-outline">
                            <textarea type="text" class="form-control" rows="5" id="txt_edit_detail" name="txt_edit_detail"></textarea>
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

<script>
    var txt_edit_id = document.getElementById('txt_edit_id')
    var txt_edit_title = document.getElementById('txt_edit_title')
    var dt_edit_time = document.getElementById('dt_edit_time')
    var txt_edit_detail = document.getElementById('txt_edit_detail')

    function showData(event_id, event_title, event_time, event_detail) {
        txt_edit_id.value = event_id;
        txt_edit_title.value = event_title;
        dt_edit_time.value = event_time;
        txt_edit_detail.value = event_detail;
    }
</script>