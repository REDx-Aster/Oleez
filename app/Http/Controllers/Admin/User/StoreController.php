<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
		{
			$data = $request->validated();
			// dd($data);
			StoreUserJob::dispatch($data);

			// dd($data);
			return redirect()->route('admin.user.index');
		}
}
