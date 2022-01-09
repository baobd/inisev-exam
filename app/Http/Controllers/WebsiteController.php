<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    use ApiResponser;

    public function subscribe(Request $request): JsonResponse
    {
        $customAttributes = ['user_id' => 'User', 'website_id' => 'Website', ];
        $validator = Validator::make($request->all(), [
            'website_id' => 'required|integer',
            'user_id' => 'required|integer',
        ], [], $customAttributes);
        if ($validator->fails()) {
            $msg = "Data submit error";
            return $this->error(200, $msg, "Error ", $validator->errors()->toArray(), 4220);
        }

        $website = Website::find($request['website_id']);
        if ($website instanceof Website) {
            $website->users()->syncWithoutDetaching([request('user_id')]);
            return $this->simpleSuccess('Subscribe successful', "SUCCESS", 'SUBSCRIBE', 200, 2000);
        }
        return $this->simpleError(200, 'Website not found', "Error", 4040);
    }
}
