<?php

use Illuminate\Support\Facades\Route;

use App\Models\Tag;
use App\Http\Controllers\Admin\TagController;

Route::get('admin/tag/{id}', [TagController::class, 'showTag'])->name('admin.tag.show');
