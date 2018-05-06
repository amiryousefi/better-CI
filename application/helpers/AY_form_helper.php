<?php

function form_repeatable($field, $attr, $data, $extra)
{
    $field_list = element("fields", $attr, array());
    $HTML = element("html", $attr, array());
    $field_keys = array_keys($field_list);
    $first_field = $field_keys[0];
    if (is_null($data)) {
        $data = array();
    }
    $first_field_data = element($first_field, $data, array());

    echo element("pre_section", $HTML, "");
    if (count($first_field_data) > 0) {
        foreach ($first_field_data as $key => $value) {
            $field_data = array();
            foreach ($field_keys as $field_key) {
                $this_field_data = element($field_key, $data, FALSE);
                if ($this_field_data !== FALSE) {
                    if (@$this_field_data[$key] != "") {
                        @$field_data[$field_key] = $this_field_data[$key];
                    }
                }
            }
            if (count($field_data) > 0) {
                echo element("pre_row", $HTML, "");
                form_fields_generator($field_list, $field_data, $extra);
                echo element("post_row", $HTML, "");
            }
        }
    }

    echo element("pre_row", $HTML, "");
    form_fields_generator($field_list, array(), $extra);
    echo element("post_row", $HTML, "");

    echo element("post_section", $HTML, "");

    echo element("repeat_button", $HTML, "");

}

function form_fields_generator($fields, $data, $extra)
{
    foreach ($fields as $field => $attr) {

        $HTML = element("html", $attr, array());

        $PDC = element("parent_div_class", $HTML, "");
        $LC = array_key_exists("label_class", $HTML) ? (strpos($HTML['label_class'], "col") === FALSE ? "col-md-2 " . $HTML['label_class'] : $HTML['label_class']) : "col-md-2";
        $FDC = array_key_exists("field_div_class", $HTML) ? (strpos($HTML['field_div_class'], "col") === FALSE ? "col-md-10 " . $HTML['field_div_class'] : $HTML['field_div_class']) : "col-md-10";
        $FC = array_key_exists("field_class", $HTML) ? $HTML['field_class'] : "";
        $PDI = array_key_exists("parent_div_id", $HTML) ? $HTML['parent_div_id'] : "";
        $LI = array_key_exists("label_id", $HTML) ? $HTML['label_id'] : "";
        $FDI = array_key_exists("field_div_id", $HTML) ? $HTML['field_div_id'] : "";
        $FI = array_key_exists("field_id", $HTML) ? $HTML['field_id'] : "";

        $type = element("type", $attr, FALSE);

        $config = element("config", $attr, array());
        $multiple = element("multiple", $config, FALSE);
        $disabled = element("disabled", $config, FALSE);
        $other_html = element("other_html", $config, " ");

        if ($type == "main_html") {
            echo $attr['snippet'];
            continue;
        } elseif ($type == "repeatable") {
            form_repeatable($field, $attr, $data, $extra);
            continue;
        }
        ?>
        <div class="form-group<?= !empty($PDC) ? " " . $PDC : "" ?>"<?= !empty($PDI) ? ' id="' . $PDI . '"' : "" ?>>
            <label
                class="control-label<?= !empty($LC) ? " " . $LC : "" ?>"<?= !empty($LI) ? ' id="' . $LI . '"' : "" ?>><?= $attr['label'] ?></label>
            <div class="<?= $FDC ?>"<?= !empty($FDI) ? ' id="' . $FDI . '"' : "" ?>>
                <?php
                if ($type == "select") {
                    ?>
                    <select<?= $other_html; ?>name="<?= $field . ($multiple ? "[]" : "") ?>"<?= $multiple ? " multiple" : "" ?><?= $disabled ? " disabled" : "" ?>
                    class="form-control select2<?= !empty($FC) ? " " . $FC : "" ?>"<?= !empty($FI) ? ' id="' . $FI . '"' : "" ?>>
                    <?php
                    foreach (@$extra[$field . "_options"] as $option) {
                        $selected = "";
                        if ($multiple === FALSE) {
                            @$selected = $data[$field] == $option['value'] ? " selected" : "";
                        } else {
                            @$selected = in_array($option['value'], $data[$field]) ? " selected" : "";
                            //@$selected = array_key_exists($option['value'], $data[$field]) ? " selected" : "";
                        }

                        $option_value = element('value', $option, "");
                        $option_label = element('label', $option, "");

                        unset($option['value']);
                        unset($option['label']);

                        $option_extra = ' ';
                        foreach ($option as $option_key => $option_item) {
                            $option_extra .= "" . $option_key . '="' . $option_item . '" ';
                        }

                        ?>
                        <option<?= $option_extra ?>value="<?= $option_value ?>"<?= $selected ?>><?= $option_label ?></option>
                        <?php
                    }
                    ?>
                    </select>
                    <span><?= @$attr['config']['description'] ?></span>
                    <?php
                } elseif ($type == "image" || $type == "file") {
                    if (@is_array($data[$field])) {
                        $field_values = array_values($data[$field]);
                        if (count($field_values) == 1) {
                            $field_value = $field_values[0];
                        }
                    } elseif (@is_string($data[$field])) {
                        $field_value = $data[$field];
                    }
                    ?>
                    <input<?= $other_html; ?>type="file"
                    name="<?= $field ?>"<?= !empty($FI) ? ' id="' . $FI . '"' : "" ?><?= $disabled ? " disabled" : "" ?>
                    data-default-file="<?= @!empty($field_value) ? base_url() . str_replace("./", "", $attr['config']['upload_path']) . "/" . $field_value : "" ?>"
                    data-allowed-file-extensions="<?= str_replace("|", " ", $attr['config']['allowed_types']) ?>"
                    class="form-control dropify<?= !empty($FC) ? " " . $FC : "" ?>"
                    data-max-file-size="<?= $attr['config']['max_size'] ?>K"/>
                    <span><?= @$attr['config']['description'] ?></span>
                    <?php
                } elseif ($type == "jdatetime") {
                    ?>
                    <input<?= $other_html; ?>name="<?= str_replace("_date", "", $field) ?>" type="text"<?= $disabled ? " disabled" : "" ?>
                    class="form-control<?= !empty($FC) ? " " . $FC : "" ?>"
                    id="<?= str_replace("_date", "", $field) ?>-date<?= !empty($FI) ? " " . $FI : "" ?>">
                    <input type="hidden" class="form-control" name="<?= $field ?>"<?= $disabled ? " disabled" : "" ?>
                           data-pdate="<?= floatval(@$data[$field]); ?>"
                           id="<?= str_replace("_date", "", $field) ?>-date-alt<?= !empty($FI) ? " " . $FI : "" ?>">
                    <span><?= @$attr['config']['description'] ?></span>
                    <?php
                } elseif ($type == "textarea") {
                    ?>
                    <textarea<?= $other_html; ?>name="<?= $field ?>"
                    class="form-control<?= !empty($FC) ? " " . $FC : "" ?>"<?= !empty($FI) ? ' id="' . $FI . '"' : "" ?><?= $disabled ? " disabled" : "" ?>
                    rows="5"
                    value="<?= @$data[$field]; ?>"><?= @$data[$field]; ?></textarea>
                    <span><?= @$attr['config']['description'] ?></span>
                    <?php
                } elseif ($type == "editor") {
                    ?>
                    <textarea<?= $other_html; ?>name="<?= $field ?>" class="form-control<?= !empty($FC) ? " " . $FC : "" ?>"
                    id="editor<?= !empty($FI) ? " " . $FI : "" ?>"<?= $disabled ? " disabled" : "" ?> rows="5"
                    value="<?= @$data[$field]; ?>"><?= @$data[$field]; ?></textarea>
                    <span><?= @$attr['config']['description'] ?></span>
                    <?php
                } elseif ($type == "html") {
                    ?>
                    <div>
                        <?= $attr['snippet'] ?>
                    </div>
                    <span><?= @$attr['config']['description'] ?></span>
                    <?php
                } else {
                    ?>
                    <input<?= $other_html; ?>name="<?= $field ?>" type="<?= $type ?>"
                    class="form-control<?= !empty($FC) ? " " . $FC : "" ?>"<?= !empty($FI) ? ' id="' . $FI . '"' : "" ?><?= $disabled ? " disabled" : "" ?>
                    value="<?= @$data[$field]; ?>">
                    <span><?= @$attr['config']['description'] ?></span>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
}

function select_option_generator($data, $output = "return")
{
    $options = '';
    foreach ($data as $option) {

        $option_value = element('value', $option, "");
        $option_label = element('label', $option, "");

        unset($option['value']);
        unset($option['label']);

        $option_extra = ' ';
        foreach ($option as $option_key => $option_item) {
            $option_extra .= "" . $option_key . '="' . $option_item . '" ';
        }

        $options .= '<option' . $option_extra . 'value="' . $option_value . '">' . $option_label . '</option>';

    }

    if ($output == "return") {
        return $options;
    } elseif ($output == "json") {
        output(array(
            "code" => 1,
            "message" => "دریافت اطلاعات موفقیت آمیز بود",
            "data" => $options
        ));
    } elseif ($output == "echo") {
        echo $options;
    }
}