<?php

namespace App\Http\Requests;

use App\DTOs\Giphy\Gif\GetDTO;
use App\Traits\Requests\FormRequest\FormRequestValidateWithDto;
use Illuminate\Foundation\Http\FormRequest;

class GiphyGetRequest extends FormRequest {
    use FormRequestValidateWithDto;

    protected $dto = GetDTO::class;

    public function authorize(): bool {
        return true;
    }

    protected function prepareForValidation() {
        $this->mergeIfMissing(['id' => $this->id]);
    }

    public function rules(): array {
        return [
            'id' => 'required|min:1|max:255',
        ];
    }
}