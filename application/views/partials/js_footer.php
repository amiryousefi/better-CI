<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-rtl.min.js"></script>
<script src="<?= base_url() ?>assets/js/detect.js"></script>
<script src="<?= base_url() ?>assets/js/fastclick.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.blockUI.js"></script>
<script src="<?= base_url() ?>assets/js/waves.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.nicescroll.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.scrollTo.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/select2/dist/js/select2.min.js" type="text/javascript"></script>

<script src="<?= base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"
        type="text/javascript"></script>

<script src="<?= base_url() ?>assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/plugins/typeahead/typeahead.jquery.js" type="text/javascript"></script>


<!-- FileInput JS -->
<script src="<?= base_url() ?>assets/plugins/fileinput/js/plugins/sortable.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/plugins/fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/plugins/fileinput/js/locales/fa.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/plugins/fileinput/themes/fa/theme.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>

<!-- Datatables-->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.scroller.min.js"></script>

<!-- file uploads js -->
<script src="<?= base_url() ?>assets/plugins/fileuploads/js/dropify.min.js"></script>
<script type="text/javascript">
    function do_dropify() {
        $('.dropify').dropify({
            messages: {
                'default': 'فایل را به اینجا بکشید یا کلیک کنید',
                'replace': 'برای جایگزینی فایل را به اینجا بکشید یا کلیک کنید',
                'remove': 'پاک کردن',
                'error': 'با پوزش فراوان، خطایی رخ داده'
            },
            error: {
                'fileSize': 'حجم فایل بیشتر از حد مجاز است.'
            }
        });
    }

    do_dropify();
</script>

<!--form wysiwig js-->
<script src="<?= base_url() ?>assets/plugins/tinymce/tinymce.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url() ?>assets/pages/datatables.init.js"></script>

<!-- Persian Date js-->
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/persian-date.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/mousewheel.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/plugin.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/constant.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/config.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/template.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/base-class.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/compat-class.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/helper.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/monthgrid.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/monthgrid-view.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/datepicker-view.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/datepicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/navigator.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/daypicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/monthpicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/yearpicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/toolbox.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/timepicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/pdate/state.js"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="<?=base_url()?>assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.js"></script>

<!--Morris Chart-->
<script src="<?= base_url() ?>assets/plugins/morris/morris.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/raphael/raphael-min.js"></script>

<!-- Modal-Effect -->
<script src="<?= base_url() ?>assets/plugins/custombox/dist/custombox.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/custombox/dist/legacy.min.js"></script>

<!-- Dashboard init -->
<script src="<?= base_url() ?>assets/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="<?= base_url() ?>assets/js/jquery.core.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.app.js"></script>

<script type="text/javascript">
    var $base_url = $("#base-url").val();
    $(document).ready(function () {
        if ($("#editor").length > 0) {
            tinymce.init({
                selector: "textarea#editor",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "rtl insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
        }


        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
    });
    TableManageButtons.init();

    $(".select2").select2();
</script>
<?php
if ($this->uri->segment(1) == "product" && ($this->uri->segment(2) == "add" || $this->uri->segment(2) == "edit")) {
    ?>
    <script>
        var $food_id_text = $("#food-id").find("option:selected").text();
        var $name_extra = $("#name_extra").val();
        if (($food_id_text + $name_extra) != "") {
            $("#food-text").val($food_id_text + " " + $name_extra);
        }
        $("#food-id").on("change", function () {
            var $food_id_text = $(this).find("option:selected").text();
            var $name_extra = $("#name_extra").val();
            if (($food_id_text + $name_extra) != "") {
                $("#food-text").val($food_id_text + " " + $name_extra);
            }
        });

        $("#name_extra").on("input", function () {
            var $food_id_text = $("#food-id").find("option:selected").text();
            var $name_extra = $(this).val();
            if (($food_id_text + $name_extra) != "") {
                $("#food-text").val($food_id_text + " " + $name_extra);
            }
        });

        $("#price-input").on("input", function () {
            var $increase_percent = parseInt($(this).attr("data-increase_percent")) / 100;
            var $company_wage_percent = parseInt($(this).attr("data-company_wage_percent")) / 100;
            var $price = parseInt($(this).val());
            var real_price = $price + ($price * $increase_percent);
            var real_price = real_price + (real_price * $company_wage_percent);
            real_price = Math.ceil(real_price / 100) * 100;
            $("#real-price-input").val(real_price);
        });
        $(".field-score-price-row").last().find(".repeatable-delete-btn").hide();
        $("#add-field-score-price").on("click", function () {
            var $field_score_row = $(".field-score-price-row").eq(0).clone().hide();
            $field_score_row.find(".select2-container").remove();

            $field_score_row.find("input").val("0");
            $field_score_row.find("option").removeAttr("selected");
            $field_score_row.find("option").eq(0).attr("selected", "selected");

            $field_score_row.find("select").select2();
            $field_score_row.find("#field-score-delete").show();

            $("#field-score-price").append($field_score_row.show());
            $(".field-score-price-row").find(".repeatable-delete-btn").show();
            $(".field-score-price-row").last().find(".repeatable-delete-btn").hide();
        });

        $(".day-time-row").last().find(".repeatable-delete-btn").hide();
        $("#add-day-time").on("click", function () {
            console.log($(".day-time-row").length);
            if ($(".day-time-row").length >= 7) {
                alert("فقط هفت انتخاب برای هفت روز هفته می‌توانید داشته باشید");
                return;
            }
            var $day_time_row = $(".day-time-row").eq(0).clone().hide();
            $day_time_row.find(".select2-container").remove();

            $day_time_row.find("input").val("0");
            $day_time_row.find("option").removeAttr("selected");
            $day_time_row.find("option").eq(0).attr("selected", "selected");

            $day_time_row.find("select").select2();
            $day_time_row.find("#field-score-delete").show();

            $("#day-time").append($day_time_row.show());
            $(".day-time-row").find(".repeatable-delete-btn").show();
            $(".day-time-row").last().find(".repeatable-delete-btn").hide();
        });

        $("body").on("change", ".timing-day-selector", function (event) {
            var $timing_day_selector = $(".timing-day-selector");
            var $that = $(this);
            var this_val = $(this).val();
            var this_index = $timing_day_selector.index(this);
            $timing_day_selector.each(function (key, item) {
                var item_val = $(item).val();
                var item_index = $timing_day_selector.index(item);
                if (this_val === item_val && item_index !== this_index) {
                    $that.select2("destroy");
                    $that.val("");
                    $that.select2();
                    alert("شما قبلا این روز را انتخاب کرده‌اید");
                }
            });
        });

        // start date initialize
        if ($("#start-date").length) {
            var datetime = $("#start-date-alt").data('pdate');
            if (datetime == 0) {
                datetime = Math.floor(Date.now());
            }
            $('#start-date').persianDatepicker({
                altField: '#start-date-alt',
                timePicker: {
                    enabled: true
                },
                format: 'YYYY/MM/DD HH:mm:ss'
            }).data('datepicker').setDate(parseInt(datetime));
        }

        // expire date initialize
        if ($("#expire-date").length) {
            var datetime = $("#expire-date-alt").data('pdate');
            if (datetime == 0) {
                datetime = Math.floor(Date.now());
            }
            $('#expire-date').persianDatepicker({
                altField: '#expire-date-alt',
                timePicker: {
                    enabled: true
                },
                format: 'YYYY/MM/DD HH:mm:ss'
            }).data('datepicker').setDate(parseInt(datetime));
        }
    </script>
    <?php
    $image_thumbs = element("thumbs", $data, array());
    $thumbs_names = "";
    foreach ($image_thumbs as $image_thumb) {
        $thumbs_names .= '<img src="' . $image_thumb['name'] . '" data-id="' . $image_thumb['id'] . '" class="file-preview-image">' . "|";
    }
    if ($thumbs_names != "") {
        $thumbs_names = rtrim($thumbs_names, "|");
    }
    ?>
    <script>
        var thumbs = '<?=$thumbs_names?>';
        var thumb_list = thumbs.split("|");
        $("#file-demo").fileinput({
            theme: 'fa',
            language: 'fa',
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            initialPreview: thumb_list,
            deleteUrl: $base_url + "product/thumb_delete",
            deleteExtraData: function () {
                var obj = {};
                $('.your-form-class').find('input').each(function () {
                    var id = $(this).attr('id'), val = $(this).val();
                    obj[id] = val;
                });
                return obj;
            }
        });
    </script>
    <script>
        if ($("#product-type").val() == 2) {
            $("#shipment-type").addClass("disabled").attr("disabled", "disabled");
            $("#product-link").addClass("disabled").attr("disabled", "disabled");
            $("#inperson-type").removeClass("disabled").removeAttr("disabled");
            $("#price").addClass("disabled").attr("disabled", "disabled");
            $("#address").removeClass("disabled").removeAttr("disabled");
            $(".field-price").find("label").html("هزینه دوره");
        } else if ($("#product-type").val() == 1) {
            $(".field-price").find("label").html("هزینه آزمون");
        }
        if ($("#shipment-type").val() == 2) {
            $("#product-link").addClass("disabled").attr("disabled", "disabled");
        }
        $("#shipment-type").on("change", function () {
            if ($(this).val() == 2) {
                $("#product-link").removeClass("disabled").removeAttr("disabled");
            } else {
                $("#product-link").addClass("disabled").attr("disabled", "disabled");
            }
        });
        $("#product-type").on("change", function () {
            if ($(this).val() == 2) {
                $("#shipment-type").addClass("disabled").attr("disabled", "disabled");
                $("#product-link").addClass("disabled").attr("disabled", "disabled");
                $("#inperson-type").removeClass("disabled").removeAttr("disabled");
                $("#price").addClass("disabled").attr("disabled", "disabled");
                $("#address").removeClass("disabled").removeAttr("disabled");
                $(".field-price").find("label").html("هزینه دوره");
            } else {
                $("#shipment-type").removeClass("disabled").removeAttr("disabled");
                $("#inperson-type").addClass("disabled").attr("disabled", "disabled");
                $("#price").removeClass("disabled").removeAttr("disabled");
                $("#address").addClass("disabled").attr("disabled", "disabled");
                $(".field-price").find("label").html("هزینه آزمون");
            }
        });
    </script>
    <?php
}
?>
<?php
if ($this->uri->segment(1) == "user" && $this->uri->segment(2) == "dashboard") {
    ?>
    <script>
        var $month_stat = [];
        var $year_stat = [];
        var $week_stat = [];
        for (var i = 0; i < 31; i++) {
            $month_stat.push({day: parseInt(i) + 1, sale: 0});
        }
        for (var i = 0; i < 12; i++) {
            $year_stat.push({day: parseInt(i) + 1, sale: 0});
        }
        for (var i = 0; i < 7; i++) {
            $week_stat.push({day: parseInt(i) + 1, sale: 0});
        }

        Morris.Bar({
            element: 'sale-month-stat',
            data: $month_stat,
            xkey: 'day',
            ykeys: ['sale'],
            labels: ['فروش'],
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barSizeRatio: 0.3,
            barColors: ['#188ae2']
        });
        Morris.Bar({
            element: 'sale-year-stat',
            data: $year_stat,
            xkey: 'day',
            ykeys: ['sale'],
            labels: ['فروش'],
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barSizeRatio: 0.3,
            barColors: ['#188ae2']
        });
        Morris.Bar({
            element: 'sale-week-stat',
            data: $week_stat,
            xkey: 'day',
            ykeys: ['sale'],
            labels: ['فروش'],
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barSizeRatio: 0.3,
            barColors: ['#188ae2']
        });

    </script>
    <?php
}
?>

<?php
if ($this->uri->segment(1) == "review" && $this->uri->segment(2) == "dashboard") {
    ?>
    <script>
        $.ajax({
            url: $base_url + "/review/top_products",
            type: 'get',
            success: function (data, textStatus, jQxhr) {
                data = JSON.parse(data);
                if (data.code == "1") {
                    var $top_products = data.data;
                    var $top_product_stat = [];
                    for (var i = 0; i < $top_products.length; i++) {
                        $top_product_stat.push({name: $top_products[i].name, rate: $top_products[i].avg_rate});
                    }

                    Morris.Bar({
                        element: 'best-product-stat',
                        data: $top_product_stat,
                        xkey: 'name',
                        ykeys: ['rate'],
                        labels: ['امتیاز'],
                        xLabelMargin: 10,
                        xLabelAngle: 60,
                        ymax: 5,
                        hideHover: 'auto',
                        resize: true, //defaulted to true
                        gridLineColor: '#eeeeee',
                        barSizeRatio: 0.3,
                        barColors: ['#188ae2']
                    });
                } else if (data.code == 0) {
                    console.log("ERROR: ", data.message);
                }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                console.log("err", errorThrown);
            }
        });
        $.ajax({
            url: $base_url + "/review/top_speakers",
            type: 'get',
            success: function (data, textStatus, jQxhr) {
                data = JSON.parse(data);
                if (data.code == "1") {
                    var $top_speakers = data.data;
                    var $top_speaker_stat = [];
                    for (var i = 0; i < $top_speakers.length; i++) {
                        $top_speaker_stat.push({name: $top_speakers[i].name, rate: $top_speakers[i].avg_rate});
                    }

                    Morris.Bar({
                        element: 'best-speaker-stat',
                        data: $top_speaker_stat,
                        xkey: 'name',
                        ykeys: ['rate'],
                        labels: ['امتیاز'],
                        xLabelMargin: 10,
                        xLabelAngle: 60,
                        ymax: 5,
                        hideHover: 'auto',
                        resize: true, //defaulted to true
                        gridLineColor: '#eeeeee',
                        barSizeRatio: 0.3,
                        barColors: ['#188ae2']
                    });
                } else if (data.code == 0) {
                    console.log("ERROR: ", data.message);
                }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                console.log("err", errorThrown);
            }
        });
        $.ajax({
            url: $base_url + "/review/top_count_products",
            type: 'get',
            success: function (data, textStatus, jQxhr) {
                data = JSON.parse(data);
                if (data.code == "1") {
                    var $top_products = data.data;
                    var $top_product_stat = [];
                    for (var i = 0; i < $top_products.length; i++) {
                        $top_product_stat.push({name: $top_products[i].name, rate: $top_products[i].count_rate});
                    }

                    Morris.Bar({
                        element: 'most-product-stat',
                        data: $top_product_stat,
                        xkey: 'name',
                        ykeys: ['rate'],
                        labels: ['تعداد'],
                        xLabelMargin: 10,
                        xLabelAngle: 60,
                        hideHover: 'auto',
                        resize: true, //defaulted to true
                        gridLineColor: '#eeeeee',
                        barSizeRatio: 0.3,
                        barColors: ['#188ae2']
                    });
                } else if (data.code == 0) {
                    console.log("ERROR: ", data.message);
                }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                console.log("err", errorThrown);
            }
        });
        $.ajax({
            url: $base_url + "/review/top_count_speakers",
            type: 'get',
            success: function (data, textStatus, jQxhr) {
                data = JSON.parse(data);
                if (data.code == "1") {
                    var $top_speakers = data.data;
                    var $top_speaker_stat = [];
                    for (var i = 0; i < $top_speakers.length; i++) {
                        $top_speaker_stat.push({name: $top_speakers[i].name, rate: $top_speakers[i].count_rate});
                    }

                    Morris.Bar({
                        element: 'most-speaker-stat',
                        data: $top_speaker_stat,
                        xkey: 'name',
                        ykeys: ['rate'],
                        labels: ['تعداد'],
                        xLabelMargin: 10,
                        xLabelAngle: 60,
                        hideHover: 'auto',
                        resize: true, //defaulted to true
                        gridLineColor: '#eeeeee',
                        barSizeRatio: 0.3,
                        barColors: ['#188ae2']
                    });
                } else if (data.code == 0) {
                    console.log("ERROR: ", data.message);
                }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                console.log("err", errorThrown);
            }
        });
    </script>
    <?php
}
?>

<script>
    // general deletting process
    $(document.body).on("click", ".repeatable-delete-btn", function (event) {
        event.preventDefault();
        $(this).parent().parent().parent().parent().remove();
    });
    $(document.body).on("click", 'a[href*="delete"]', function (event) {
        event.preventDefault();
        var r = confirm("آیا از حذف این آیتم مطمئن هستید؟");
        if (r) {
            $(".modal").modal("hide");

            var $url = $(this).attr("href");
            var $id = $(this).attr("data-id");

            $.ajax({
                url: $url,
                type: 'get',
                success: function (data, textStatus, jQxhr) {
                    data = JSON.parse(data);
                    if (data.code == "1") {
                        $("#success-modal").find("h3.panel-title").html("عملیات موفقیت‌آمیز بود");
                        $("#success-modal").find("div.panel-body").find("p").html(data.message);
                        $("#success-modal").modal("show");
                        $("table").find('tr[data-id="' + $id + '"]').remove();
                    } else if (data.code == 0) {
                        $("#danger-modal").find("h3.panel-title").html("عملیات با خطا مواجه شد");
                        $("#danger-modal").find("div.panel-body").find("p").html(data.message);
                        $("#danger-modal").modal("show");
                    } else {
                        $("#danger-modal").find("h3.panel-title").html("عملیات با خطا مواجه شد");
                        $("#danger-modal").find("div.panel-body").find("p").html("خطا در حذف آیتم");
                        $("#danger-modal").modal("show");
                    }
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log("err", errorThrown);
                    $("#danger-modal").find("h3.panel-title").html("عملیات با خطا مواجه شد");
                    $("#danger-modal").find("div.panel-body").find("p").html("خطا در حذف آیتم");
                    $("#danger-modal").modal("show");
                }
            });
        }


    });
    $('input[data-plugin="knob"]').each(function (index) {
        $(this).val($(this).val() + "%");
    });
</script>

<script>
    // jdate field initialization
    if ($("#leave-date").length) {
        var datetime = $("#leave-date-alt").data('pdate');
        if (datetime == 0) {
            datetime = Math.floor(Date.now());
        }
        $('#leave-date').persianDatepicker({
            altField: '#leave-date-alt',
            timePicker: {
                enabled: true
            },
            format: 'YYYY/MM/DD'
        }).data('datepicker').setDate(parseInt(datetime));
    }
    if ($("#create-date").length) {
        var datetime = $("#create-date-alt").data('pdate');
        if (datetime == 0) {
            datetime = Math.floor(Date.now());
        } else if (datetime.toString().length < 13) {
            datetime *= 1000;
        }
        $('#create-date').persianDatepicker({
            altField: '#create-date-alt',
            timePicker: {
                enabled: true
            },
            format: 'YYYY/MM/DD H:m:s'
        }).data('datepicker').setDate(parseInt(datetime));
    }
</script>
<?php
if ($this->uri->segment(1) == "setting" && $this->uri->segment(2) == "districts") {
    ?>
    <script src="<?= base_url() ?>assets/js/maplabel-compiled.js"></script>
    <script type="text/javascript">
        var drawingManager;
        var selectedShape;
        var shapes = [];
        var labels = [];

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: new google.maps.LatLng(38.074052, 46.2874702),
            disableDefaultUI: true,
            zoomControl: true
        });

        function clearSelection() {
            if (selectedShape) {
                if (selectedShape.type !== 'marker') {
                    selectedShape.setEditable(false);
                }

                selectedShape = null;
            }
        }

        function setSelection(shape) {
            if (shape.type !== 'marker') {
                clearSelection();
                shape.setEditable(true);
            }
            selectedShape = shape;
        }

        function registerSelectedShape() {
            var bounds = new google.maps.LatLngBounds();
            var polygonBounds = selectedShape.getPath();
            var latlngArr = [];
            polygonBounds.forEach(function (xy, i) {
                latlngArr.push({"lat": xy.lat(), "lng": xy.lng()});
                bounds.extend(new google.maps.LatLng(xy.lat(), xy.lng()));
            });

            var latlngStr = JSON.stringify(latlngArr);

            var user_input_label = $("#district-name").val();

            $.ajax({
                url: $base_url + "api/districts/add",
                data: {'path': latlngStr, 'name': user_input_label},
                type: 'post',
                success: function (data, textStatus, jQxhr) {
                    data = JSON.parse(data);
                    if (data.code == "1") {
                        var district_id = data.data;
                        var mapLabel = new MapLabel({
                            text: user_input_label,
                            position: new google.maps.LatLng(bounds.getCenter().lat(), bounds.getCenter().lng()),
                            map: map,
                            fontSize: 14,
                            align: 'center',
                            fontColor: "#A9002F"
                        });

                        selectedShape.district_id = data.data;

                        mapLabel.district_id = data.data;

                        var district_key = "district_" + district_id;

                        shapes[[district_key]] = {"shape": selectedShape, "label": mapLabel};
                    } else if (data.code == 0) {
                        alert(data.message);
                    }
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log("err", errorThrown);
                }
            });

        }


        function deleteSelectedShape() {
            var district_id = selectedShape.district_id;
            $.ajax({
                url: $base_url + "api/districts/delete/" + district_id + "/false",
                type: 'get',
                success: function (data, textStatus, jQxhr) {
                    data = JSON.parse(data);
                    if (data.code == "1") {
                        if (selectedShape) {
                            selectedShape.setMap(null);
                        }
                        var selectedLabel = shapes[["district_" + selectedShape.district_id]].label;
                        selectedLabel.setMap(null);
                        delete shapes[["district_" + selectedShape.district_id]];

                    } else if (data.code == 0) {
                        console.log("ERROR: ", data.message);
                    }
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log("err", errorThrown);
                }
            });
        }

        function redrawPolygons() {
            $.ajax({
                url: $base_url + "api/districts/get",
                type: 'get',
                success: function (data, textStatus, jQxhr) {
                    data = JSON.parse(data);
                    if (data.code == "1") {
                        $.each(data.data, function (index, item) {
                            var coords = JSON.parse(item.path);
                            var newShape = new google.maps.Polygon({
                                paths: coords,
                                strokeColor: '#1E90FF',
                                strokeOpacity: 0.8,
                                fillColor: '#1E90FF',
                                strokeWeight: 0,
                                fillOpacity: 0.45,
                                editable: true,
                                draggable: false
                            });
                            newShape.district_id = item.id;
                            newShape.setMap(map);
                            google.maps.event.addListener(newShape, 'click', function (e) {
                                if (e.vertex !== undefined) {
                                    if (newShape.type === google.maps.drawing.OverlayType.POLYGON) {
                                        var path = newShape.getPaths().getAt(e.path);
                                        path.removeAt(e.vertex);
                                        if (path.length < 3) {
                                            newShape.setMap(null);
                                        }
                                    }
                                    if (newShape.type === google.maps.drawing.OverlayType.POLYLINE) {
                                        var path = newShape.getPath();
                                        path.removeAt(e.vertex);
                                        if (path.length < 2) {
                                            newShape.setMap(null);
                                        }
                                    }
                                }
                                setSelection(newShape);
                            });

                            var bounds = new google.maps.LatLngBounds();
                            var polygonBounds = newShape.getPath();
                            polygonBounds.forEach(function (xy, i) {
                                bounds.extend(new google.maps.LatLng(xy.lat(), xy.lng()));
                            });

                            var mapLabel = new MapLabel({
                                text: item.name,
                                position: new google.maps.LatLng(bounds.getCenter().lat(), bounds.getCenter().lng()),
                                map: map,
                                fontSize: 16,
                                align: 'center',
                                fontColor: "#A9002F"
                            });

                            mapLabel.district_id = item.id;

                            var district_key = "district_" + item.id;

                            shapes[[district_key]] = {"shape": newShape, "label": mapLabel};
                            labels.push(mapLabel);

                        });
                    } else if (data.code == 0) {
                        console.log("ERROR: ", data.message);
                    }
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log("err", errorThrown);
                }
            });
        }

        function initialize() {
            redrawPolygons();
            var polyOptions = {
                strokeColor: '#1E90FF',
                strokeOpacity: 0.8,
                fillColor: '#1E90FF',
                strokeWeight: 0,
                fillOpacity: 0.45,
                editable: true,
                draggable: false
            };
            // Creates a drawing manager attached to the map that allows the user to draw
            // markers, lines, and shapes.
            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                polygonOptions: polyOptions,
                map: map
            });

            drawingManager.setOptions({
                drawingControlOptions: {
                    drawingModes: ['polygon'],
                }
            });

            google.maps.event.addListener(drawingManager, 'overlaycomplete', function (e) {
                var newShape = e.overlay;

                newShape.type = e.type;
                newShape.district_id = 0;
                newShape.clickable = false;
                if (e.type !== google.maps.drawing.OverlayType.MARKER) {
                    // Switch back to non-drawing mode after drawing a shape.
                    drawingManager.setDrawingMode(null);

                    // Add an event listener that selects the newly-drawn shape when the user
                    // mouses down on it.
                    google.maps.event.addListener(newShape, 'click', function (e) {
                        if (e.vertex !== undefined) {
                            if (newShape.type === google.maps.drawing.OverlayType.POLYGON) {
                                var path = newShape.getPaths().getAt(e.path);
                                path.removeAt(e.vertex);
                                if (path.length < 3) {
                                    newShape.setMap(null);
                                }
                            }
                            if (newShape.type === google.maps.drawing.OverlayType.POLYLINE) {
                                var path = newShape.getPath();
                                path.removeAt(e.vertex);
                                if (path.length < 2) {
                                    newShape.setMap(null);
                                }
                            }
                        }
                        setSelection(newShape);
                    });
                    setSelection(newShape);
                }
                else {
                    google.maps.event.addListener(newShape, 'click', function (e) {
                        setSelection(newShape);
                    });
                    setSelection(newShape);
                }
            });

            // Clear the current selection when the drawing mode is changed, or when the
            // map is clicked.
            google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
            google.maps.event.addListener(map, 'click', clearSelection);
            google.maps.event.addDomListener(document.getElementById('register-button'), 'click', registerSelectedShape);
            google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <?php
}
?>
<script>
    if ($("#birth-date").length) {
        var datetime = $("#birth-date-alt").data('pdate');
        if (datetime == 0) {
            datetime = Math.floor(Date.now());
        }
        $('#birth-date').persianDatepicker({
            altField: '#birth-date-alt',
            timePicker: {
                enabled: true
            },
            format: 'YYYY/MM/DD'
        }).data('datepicker').setDate(parseInt(datetime));
    }
    if ($("#sodur-date").length) {
        var datetime = $("#sodur-date-alt").data('pdate');
        if (datetime == 0) {
            datetime = Math.floor(Date.now());
        }
        $('#sodur-date').persianDatepicker({
            altField: '#sodur-date-alt',
            timePicker: {
                enabled: true
            },
            format: 'YYYY/MM/DD'
        }).data('datepicker').setDate(parseInt(datetime));
    }

</script>


<?php
if ($this->uri->segment(1) == "bibi" && ($this->uri->segment(2) == "add" || $this->uri->segment(2) == "edit")) {
    ?>
    <style>
        .datepicker-time-view {
            display: none !important;
        }
    </style>
    <script>
        if ($("#kart_behdasht_start-date").length) {
            var datetime = $("#kart_behdasht_start-date-alt").data('pdate');
            if (datetime == 0) {
                datetime = Math.floor(Date.now());
            }
            $('#kart_behdasht_start-date').persianDatepicker({
                altField: '#kart_behdasht_start-date-alt',
                timePicker: {
                    enabled: true
                },
                format: 'YYYY/MM/DD'
            }).data('datepicker').setDate(parseInt(datetime));
        }
        if ($("#kart_behdasht_expire-date").length) {
            var datetime = $("#kart_behdasht_expire-date-alt").data('pdate');
            if (datetime == 0) {
                datetime = Math.floor(Date.now());
            }
            $('#kart_behdasht_expire-date').persianDatepicker({
                altField: '#kart_behdasht_expire-date-alt',
                timePicker: {
                    enabled: true
                },
                format: 'YYYY/MM/DD'
            }).data('datepicker').setDate(parseInt(datetime));
        }
    </script>
    <?php
}
?>

<?php
if ($this->uri->segment(1) == "review" && $this->uri->segment(2) == "index") {
    ?>
    <script>
        $(".change-status").on("click", function (event) {
            event.preventDefault();
            var $that = $(this);
            var url = $(this).attr("href");
            $.ajax({
                url: url,
                type: 'get',
                success: function (data, textStatus, jQxhr) {
                    data = JSON.parse(data);
                    if (data.code == "1") {
                        $that.parent().parent().removeAttr("class");
                        console.log(data.data);
                        if (data.data == 1) {
                            $that.parent().parent().addClass("success");
                        } else if (data.data == 3) {
                            $that.parent().parent().addClass("danger");
                        }
                    } else if (data.code == 0) {
                        alert(data.message);
                    }
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log("err", errorThrown);
                }
            });

        });
    </script>
    <?php
} ?>