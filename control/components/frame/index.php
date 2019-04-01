<div class="row">
    <div class="col-xs-12">
        <div class="well">
            <h2>Framematen</h2><hr>
            <div class="row">
                <div class="col-xs-1"></div>
                <div class="col-xs-2">
                    <?php include 'addFrameSize.php'; ?>
                </div>
                <div class="col-xs-6">
                    <?php include "frameSizeTable.php"; ?>
                </div>
                <div class="col-xs-2">
                    <?php include 'components/shared/settingsMenu.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        activateMenuItem('menu_frame');
    });
</script>

