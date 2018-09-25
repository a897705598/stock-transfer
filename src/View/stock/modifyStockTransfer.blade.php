<div class="modal fade" id="modifyStockTransfer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                <h4 class="modal-title" id="myModalLabel">详情</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row-fluid form-group">
                        <label for="" class="span3">调出仓库：</label>
                        <div class="span6">
                            <input type="text" id="stockroomOut">
                        </div>
                    </div>
                    <div class="row-fluid form-group">
                        <label for="" class="span3">调入仓库：</label>
                        <div class="span6">
                            <input type="text" id="stockroomIn">
                        </div>
                    </div>
                    <div class="row-fluid form-group">
                        <label for="" class="span3">经办人：</label>
                        <div class="span6">
                            <input type="text" id="manager">
                        </div>
                    </div>
                    <div class="row-fluid form-group">
                        <label for="" class="span3">商品：</label>
                        <div class="span6">
                            <input type="text" id="product">
                        </div>
                    </div>
                    <div class="row-fluid form-group">
                        <label for="" class="span3">数量：</label>
                        <div class="span6">
                            <input type="text" id="amount">
                        </div>
                    </div>
                </form>
                {{--<div>--}}
                    {{--<table class="table table-striped table-bordered table-hover">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>商品</th>--}}
                            {{--<th>数量</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-small btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn blue modify-stock-transfer bluedark blue">确认</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {

    })
</script>