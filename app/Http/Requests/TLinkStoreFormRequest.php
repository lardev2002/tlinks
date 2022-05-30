<?php

namespace App\Http\Requests;

use App\Dto\TlinkDataCreateDto;
use App\Models\TLink;
use Illuminate\Foundation\Http\FormRequest;

class TLinkStoreFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'link' => ['required', 'contains_name_protocol', 'min:11'],
            'transition_limit' => ['nullable', 'numeric'],
            'lifetime' => ['required', 'numeric', 'min:1', 'max:'.config('tlink.lifetime.max')]
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'lifetime.max' => __('validation.tlink_lifetime_error'),
            'link.contains_name_protocol' => __('validation.tlink_protocol_name_error')
        ];
    }

    /**
     * @return TlinkDataCreateDto
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function getDto() : TlinkDataCreateDto
    {
        return new TlinkDataCreateDto($this->all());
    }
}
