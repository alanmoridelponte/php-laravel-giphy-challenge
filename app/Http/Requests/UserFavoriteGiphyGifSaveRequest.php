<?php

namespace App\Http\Requests;

use App\DTOs\UserFavoriteGiphyGif\SaveFavoriteDTO;
use App\Traits\Requests\FormRequest\FormRequestValidateWithDto;
use Illuminate\Foundation\Http\FormRequest;

class UserFavoriteGiphyGifSaveRequest extends FormRequest {
    use FormRequestValidateWithDto;

    protected $dto = SaveFavoriteDTO::class;

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'gif_id' => 'required|min:1|max:255|unique:users,email',
            'alias' => 'required|min:5|unique:users,email',
            'user_id' => 'required|integer|min:1',
        ];
    }
}