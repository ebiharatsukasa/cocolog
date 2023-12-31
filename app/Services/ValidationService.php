<?php

namespace App\Services;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ValidationService
{
    public function validatePostData($data, $userId = null, $postId = null)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'body' => 'required|max:100000',
            'image' => 'image|max:10000',
            'created_at' => [
                'date',
                Rule::unique('posts')->ignore($postId)->where(function ($query) use ($data, $userId) {
                    return $query->where('created_at', date('Y-m-d', strtotime($data['created_at'])))
                        ->where('user_id', $userId);
                }),
            ],
            'score' => 'numeric',
            'magnitude' => 'numeric',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return $validator->validated();
    }
}
