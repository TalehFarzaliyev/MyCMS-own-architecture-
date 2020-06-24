<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> <?= date("Y") ?> &copy; Site by CrocuSoft

    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
</div>

<!--[if lt IE 9]>
<script src="<?= SITE_URL ?>assets/back/global/plugins/respond.min.js"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/excanvas.min.js"></script> 
<script src="<?= SITE_URL ?>assets/back/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?= SITE_URL ?>assets/back/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= SITE_URL ?>assets/back/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=SITE_URL?>assets/back/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?=SITE_URL?>assets/back/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?=SITE_URL?>assets/back/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?=SITE_URL?>assets/back/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?=SITE_URL?>assets/back/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?=SITE_URL?>assets/back/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= SITE_URL ?>assets/back/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= SITE_URL ?>assets/back/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?= SITE_URL ?>assets/back/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<script src="<?= SITE_URL ?>assets/back/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

<!-- END THEME LAYOUT SCRIPTS -->
<script src="<?= SITE_URL ?>assets/back/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
    <?php foreach ($languages as $langobj) {
        
     ?>
        $('#summernote<?=$langobj->lang_id?>').summernote({
            height: ($(window).height() - 300),
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0], $(this));
                }
            }
        });
    <?php } ?>
});
function uploadImage(image, obj) {
            console.log(obj[0].id);
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: 'http://traveler.rufatet.com/admin/upload/',
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "post",
                success: function(url) {
                    $("#"+obj[0].id).summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

</script>
</body>

</html>