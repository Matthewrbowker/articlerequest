<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    {$categoryHeading}
                </h4>
            </div>
            <div class="modal-body">
                <form method="get" action="#" onsubmit="submitValue()" onReset="resetValue()"><span id="categoryForm">
          <!--input type="hidden" name="category"  id="category" value="" />
          <input type="hidden" name="subcategory" id="subcategory" value="" />
          <input type="hidden" name="subsubcategory" id="subsubcategory" value="" / -->
          <h3 class="text-muted hide" id="text_cat">
              {$categoryCat}
            <span id="catStore">
            <input type="button" name="catStoreBtn" id="catStoreBtn" value=" " class="btn btn-info btn-disabled" disabled="disabled" />
            </span></h3>
          <h3 class="text-muted hide" id="text_scat">
              {$categorySubCat}
            <span id="scatStore">
            <input type="button" name="scatStoreBtn" id="scatStoreBtn" value=" " class="btn btn-info btn-disabled" disabled="disabled" />
            </span></h3>
          <h3 class="text-muted hide" id="text_sscat">
              {$categorySubSubCat}
            <span id="sscatStore">
            <input type="button" name="sscatStoreBtn" id="sscatStoreBtn" value=" " class="btn btn-info btn-disabled" disabled="disabled" />
            </span></h3>
                        {$categoryCatBuffer}
                        {$categorySubCatBuffer}
                        {$categorySubSubCatBuffer}
                </form>
                </span>
            </div>
            <div class="modal-footer">
                <input type="button" name="resetBtn" value="{$modalClearInfo}" onClick = "resetCategory()" class="btn btn-warning" />
                <button type="button" class="btn btn-primary" onclick="sendValue()" data-dismiss="modal" id="category_save_button" disabled>{$modalSaveInfo}</button>
            </div>
        </div>
    </div>
</div>