<?php

namespace App\Model\Ares;

use Illuminate\Database\Eloquent\Model;

class StockTransfer extends Model
{
    protected $table = 'stock_transfer';
    protected $primaryKey = 'stock_transfer_id';
    protected $fillable = ['out_stockroom_id', 'in_stockroom_id', 'manager', 'operator'];

    public function add($params)
    {
        $model = self::fill($params);
        $model->save();
        return $model;
    }

    public function edit($params)
    {
        $model = self::find($params['stock_transfer_id']);
        return $model->fill($params)->save();
    }

    public function stockTransferDetails()
    {
        return $this->hasMany('App\Model\Ares\StockTransferDetail', 'stock_transfer_id');
    }

    public function delete()
    {
        $this->stockTransferDetails()->delete();
        return parent::delete();
    }
}
