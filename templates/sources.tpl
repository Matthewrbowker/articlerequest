<!-- BEGIN: sources.tpl -->
<div class="modal fade bs-example-modal-lg" id="sourcesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="categoryModalLabel">
                    {$sourcesHeading}
                </h4>
            </div>
            <div class="modal-body"  id="sources-modal-body"><!-- style="max-height:420px; overflow-y:auto;" -->
                <div class="panel panel-warning" id="sourcesTypeButton">
                    <div class="panel-heading">Choose the source type</div>
                    <div class="panel-body">
                        {$sourcesButtonBuffer}
                    </div>
                </div>
                {$sourcesDivBuffer}
                <hr />
            </div>
            <div class="modal-footer">
                <button type="button" onClick="saveClick()" class="btn btn-primary" data-dismiss="modal">{$modalSaveInfo}</button>
            </div>
        </div>
    </div>
</div>
<!-- END: sources.tpl -->
