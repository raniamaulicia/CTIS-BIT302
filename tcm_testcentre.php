<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Register Test Centre</h1>
                            <hr>
                        </div>
                        <?= $this->session->flashdata('message');  ?>
                        <form class="user" method="post" action="<?= base_url('tc_manager/tcm_testcentre');  ?>">

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="tc_name" name="tc_name" placeholder="Test Centre's Name">
                                <?= form_error('tc_name', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="tc_address" name="tc_address" placeholder="Address">
                                <?= form_error('tc_address', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>