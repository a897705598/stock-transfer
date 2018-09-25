<?php

namespace App\Http\Controllers\Ares;

use App\Model\Ares\StockTransfer;
use App\Model\Ares\StockTransferDetail;
use App\Traits\ApiValidator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use StructuredResponse\StructuredResponse;

class InventoryController extends Controller
{
    use StructuredResponse, ApiValidator;

    /**
     * 获取调拨单
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function stockTransferList()
    {
        $stockTransferList = StockTransfer::with('stockTransferDetails')->get()->toArray();
        return $this->genResponse(1, '获取成功', $stockTransferList);
    }

    /**
     * 调拨单详情
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function stockTransferDetailList()
    {
        $stockTransferDetailList = StockTransferDetail::with('stockTransfer')->get()->toArray();
        Log::info($stockTransferDetailList);
        return view('ares.stock.stockTransferList')->with('stockTransfers', $stockTransferDetailList);
//        return $this->genResponse(1, '获取成功', $stockTransferDetailList);
    }

    /**
     * 获取单个调拨单
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function stockTransfer(Request $request)
    {
        $id = $request->get('stock_transfer_id');
        $stockTransfer = StockTransfer::find($id);
        $details = $stockTransfer->stockTransferDetails()->get()->toArray();
        $result = $stockTransfer->toArray();
        $result['details'] = $details;
        return $this->genResponse(1, '获取成功', $result);
    }

    /**
     * 添加调拨单
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addStockTransfer(Request $request)
    {
        $this->validateApi($request, [
            'out_stockroom_id'=>'required|exists:stockrooms,stockroom_id',
            'in_stockroom_id'=>'required|exists:stockrooms,stockroom_id',
            'manager'=>'required|exists:employees,employee_id',
            'operator'=>'required|exists:employees,employee_id',
            'details'=>'required'
        ]);
        $inputs = $request->all();
        $details = $inputs['details'];
        foreach ($details as $detail) {
            $this->validateArray($detail, [
                'product'=>'required|exists:products,product_id',
                'amount'=>'required|numeric'
            ]);
        }
        $res = (new StockTransfer())->add($inputs);
        if ($res) {
            foreach ($details as $detail) {
                $detail['stock_transfer_id'] = $res['stock_transfer_id'];
                (new StockTransferDetail())->add($detail);
            }
            return $this->genResponse(1, '添加成功');
        }
        return $this->genResponse(0, '添加失败');
    }

    /**
     * 修改调拨单
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function modifyStockTransfer(Request $request)
    {
        $this->validateApi($request, [
            'stock_transfer_id'=>'required|exists:stock_transfer',
            'out_stockroom_id'=>'exists:stockrooms,stockroom_id',
            'in_stockroom_id'=>'exists:stockrooms,stockroom_id',
            'manager'=>'exists:employees,employee_id',
            'operator'=>'exists:employees,employee_id',
        ]);
        $inputs = $request->all();
        $details = $inputs['details'];
        if ($details) {
            foreach ($details as $detail) {
                $this->validateArray($detail, [
                    'id'=>'required|exists:stock_transfer_detail',
                    'product'=>'exists:products,product_id',
                    'amount'=>'numeric'
                ]);
            }
        }
        $res = (new StockTransfer())->edit($inputs);
        if ($res) {
            if ($details) {
                foreach ($details as $detail) {
                    (new StockTransferDetail())->edit($detail);
                }
            }
            return $this->genResponse(1, '修改成功');
        }
        return $this->genResponse(0, '修改失败');
    }

    /**
     * 删除调拨单
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteStockTransfer(Request $request)
    {
        $this->validateApi($request, [
            'stock_transfer_id'=>'required|exists:stock_transfer',
        ]);
        $stock_transfer_id = $request->get('stock_transfer_id');
        $stockTransfer = StockTransfer::find($stock_transfer_id);
        $res = $stockTransfer->delete();
        Log::info('------------');
        if ($res) {
            return $this->genResponse(1, '删除成功');
        }
        return $this->genResponse(0, '删除失败');
    }
}
