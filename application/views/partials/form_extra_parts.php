<?php if (strpos($url, 'edit') > 0) {
    ?>
    <input type="hidden" name="id" value="<?= @$data['id']; ?>">
    <?php
} ?>
<input type="hidden" name="html" value="html">
<button type="submit" class="btn btn-info waves-effect waves-light pull-right">ثبت</button>
