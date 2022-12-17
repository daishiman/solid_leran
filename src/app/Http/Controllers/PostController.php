<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Throwable;

final class PostController extends Controller
{
    /**
     * @throws Throwable
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $rules = [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['バリデーションエラー']);
        }

        try {
            DB::beginTransaction();

            $post = new Post();
            $post->title = $input['title'];
            $post->content = $input['content'];
            $post->save();

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            throw new $e();
        }

        return response()->json(['post' => $post], 200);
    }
}
