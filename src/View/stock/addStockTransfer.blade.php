<div class="modal fade" id="addStockTransfer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                <h4 class="modal-title" id="myModalLabel">添加</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row-fluid form-group">
                        <label for="" class="span3">调出仓库：</label>
                        <div class="span6">
                            <input type="text" class="stock-out">
                        </div>
                    </div>
                    <div class="row-fluid form-group">
                        <label for="" class="span3">调入仓库：</label>
                        <div class="span6">
                            <input type="text" class="stock-in">
                        </div>
                    </div>
                    <div class="row-fluid form-group">
                        <label for="" class="span3">采购经办人：</label>
                        <div class="span6">
                            <input type="text" class="stock-manager">
                        </div>
                    </div>
                    <div class="row-fluid form-group">
                        <label for="" class="span3">商品：</label>
                        <div class="span6">
                            <input type="text" class="stock-transfer-product">
                        </div>
                    </div>
                    <div class="row-fluid form-group">
                        <label for="" class="span3">数量：</label>
                        <div class="span6">
                            <input type="text" class="stock-transfer-amount">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-small btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn blue add-stock-transfer bluedark blue">确认</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {

    })
</script>