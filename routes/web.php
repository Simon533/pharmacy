<?php

Route::group(['middleware'=>['guest']],function (){
    Route::get('login',[LoginController::class,'index'])->name('login');
    Route::post('login',[LoginController::class,'login']);
});

    Route::get('medicinecategories',[CategoryController::class,'index'])->name('medicinecategories');
    Route::post('medicinecategories',[CategoryController::class,'store']);
    Route::put('medicinecategories',[CategoryController::class,'update']);
    Route::delete('medicinecategories',[CategoryController::class,'destroy']);

    Route::get('add-purchased medicine',[ProductController::class,'index'])->name('add-purchased medicine');
    Route::get('add-purchased medicine/create',[ProductController::class,'create'])->name('add-product');
    Route::get('expired-add-purchased medicine',[ProductController::class,'expired'])->name('expired');
    Route::get('add-purchased medicine/{product}',[ProductController::class,'show'])->name('edit-product');
    Route::get('outstock-add-purchased medicine',[ProductController::class,'outstock'])->name('outstock');
    Route::post('add-purchased medicine/create',[ProductController::class,'store']);
    Route::post('add-purchased medicine/{product}',[ProductController::class,'update']);
    Route::delete('add-purchased medicine',[ProductController::class,'destroy']);

    Route::get('suppliers',[SupplierController::class,'index'])->name('suppliers');
    Route::get('add-supplier',[SupplierController::class,'create'])->name('add-supplier');
    Route::post('add-supplier',[SupplierController::class,'store']);
    Route::get('suppliers/{supplier}',[SupplierController::class,'show'])->name('edit-supplier');
    Route::delete('suppliers',[SupplierController::class,'destroy']);
    Route::put('suppliers/{supplier}}',[SupplierController::class,'update'])->name('edit-supplier');

    Route::get('purchases',[PurchaseController::class,'index'])->name('purchases');
    Route::get('add-purchase',[PurchaseController::class,'create'])->name('add-purchase');
    Route::post('add-purchase',[PurchaseController::class,'store']);
    Route::get('purchases/{purchase}',[PurchaseController::class,'show'])->name('edit-purchase');
    Route::put('purchases/{purchase}',[PurchaseController::class,'update']);
    Route::delete('purchases',[PurchaseController::class,'destroy']);

    Route::get('medicine sales',[medicine salesController::class,'index'])->name('medicine sales');
    Route::post('medicine sales',[medicine salesController::class,'store']);
    Route::put('medicine sales',[medicine salesController::class,'update']);
    Route::delete('medicine sales',[medicine salesController::class,'destroy'])
});

