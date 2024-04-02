<?php

namespace App\Http\Requests;

use App\DTOs\Giphy\Gif\SearchDTO;
use App\Traits\Requests\FormRequest\FormRequestValidateWithDto;
use Illuminate\Foundation\Http\FormRequest;

class GiphySearchRequest extends FormRequest {
    use FormRequestValidateWithDto;

    protected $dto = SearchDTO::class;

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'query' => 'required|min:1|max:255',
            'limit' => 'required_with:offset|integer|min:1',
            'offset' => 'required_with:limit|integer|min:0',
        ];
    }
}