<?php

namespace App\Model\Ares;

use Illuminate\Database\Eloquent\Model;

class StockTransferDetail extends Model
{
    protected $table = 'stock_transfer_detail';
    protected $fillable = ['stock_transfer_id', 'product', 'amount'];

    public function add($params)
    {
        $model = self::fill($params);
        $model->save();
        return $model;
    }

    public function edit($params)
    {
        $model = self::find($params['id']);
        return $model->fill($params)->save();
    }

    public function stockTransfer()
    {
        return $this->belongsTo('App\Model\Ares\StockTransfer', 'stock_transfer_id');
    }
}
