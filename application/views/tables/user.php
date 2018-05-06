<?php
$this->load->library("jdatetime");
$jDate = new jDateTime(true, true, 'Asia/Tehran');
$method = $this->uri->segment(1)
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-body">
                <div class="editable-responsive">
                    <div id="datatable-editable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" style="display: none;" id="datatable-editable_length">
                                    <label>Show <select
                                            name="datatable-editable_length" aria-controls="datatable-editable"
                                            class="form-control input-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                                <div class="m-b-30">
                                    <a href="<?= base_url() . $method ?>/add" id="addToTable"
                                       class="btn btn-primary waves-effect waves-light">افزودن <i
                                            class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <form action="<?= base_url() . $method ?>/search">
                                    <div id="datatable-editable_filter" class="dataTables_filter"><label>جست و جو:
                                            <input
                                                type="search" name="s" class="form-control input-sm"
                                                value="<?= @$this->input->get("s"); ?>" placeholder=""
                                                aria-controls="datatable-editable"></label></div>
                                </form>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped dataTable no-footer" id="datatable-editable"
                                       role="grid" aria-describedby="datatable-editable_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1"
                                            colspan="1" aria-label="نام: activate to sort column ascending">نام
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1"
                                            colspan="1" aria-label="موبایل: activate to sort column ascending"
                                        >موبایل
                                        </th>
                                        <?php
                                        if ($method == "admin") {
                                            ?>
                                            <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable"
                                                rowspan="1" colspan="1"
                                                aria-label="ایمیل: activate to sort column ascending"
                                                aria-sort="descending">سطح دسترسی
                                            </th>
                                            <?php
                                        } else {
                                            ?>
                                            <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable"
                                                rowspan="1" colspan="1"
                                                aria-label="ایمیل: activate to sort column ascending"
                                                aria-sort="descending">مدل گوشی
                                            </th>
                                            <?php
                                        }
                                        ?>

                                        <th class="sorting_desc" tabindex="0" aria-controls="datatable-editable"
                                            rowspan="1" colspan="1"
                                            aria-label="ایمیل: activate to sort column ascending"
                                            aria-sort="descending">تاریخ عضویت
                                        </th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="عملیات">عملیات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($data as $item) {
                                        ?>
                                        <tr data-id="<?= $item['id'] ?>" class="gradeA <?= ($item['id'] % 2) ?>"
                                            role="row">
                                            <td><?= $item['name'] ?></td>
                                            <td><?= $item['phone'] ?></td>
                                            <td>
                                                <?php
                                                if ($method == "admin") {
                                                    ?>
                                                    <?= $item['permissions'] ?>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <?= $item['manufacturer'] ?>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <?php
                                            if (is_null($item['create_date'])) {
                                                ?>
                                                <td> -</td>
                                                <?php
                                            } else {
                                                ?>
                                                <td style="direction: ltr;text-align: right;"><?= $jDate->date("Y/m/d H:i", substr($item['create_date'], 0, 10)); ?></td>
                                                <?php
                                            }
                                            ?>
                                            <td class="actions">
                                                <a href="<?= base_url() . $method ?>/edit/<?= $item['id'] ?>"
                                                   class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                <a data-id="<?= $item['id'] ?>"
                                                   href="<?= base_url() . $method ?>/delete/<?= $item['id'] ?>/html"
                                                   class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_info" style="display: none;" id="datatable-editable_info"
                                     role="status"
                                     aria-live="polite">Showing 1 to 10 of 80 entries
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="datatable-editable_paginate">
                                    <ul class="pagination">
                                        <?= $pagination ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: panel body -->

        </div> <!-- end panel -->
    </div> <!-- end col-->
</div>