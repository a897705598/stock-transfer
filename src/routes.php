<?php
Route::group(['prefix'=>'stock', 'namespace'=>'App\Http\Controllers\Ares'], function () {
    /** 销售订单 */
    Route::get('stockTransferDetailList', ['as'=>'stockTransferDetail', 'uses'=>'StockTransferController@stockTransferDetailList']);
    Route::post('getStockTransfer', ['uses'=>'StockTransferController@stockTransfer']);
    Route::post('addStockTransfer', ['uses'=>'StockTransferController@addStockTransfer']);
    Route::post('modifyStockTransfer', ['uses'=>'StockTransferController@modifyStockTransfer']);
    Route::post('deleteStockTransfer', ['uses'=>'StockTransferController@deleteStockTransfer']);
});
