<?php
namespace App\Http\Requests;

use App\Rules\DateBetween;

class AdvancedSearchRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'resolved_at_start' => [
                new DateBetween(
                    $this->get('resolved_at_start'),
                    $this->get('resolved_at_end')
                )
            ],
            'created_at_start' => [
                new DateBetween(
                    $this->get('created_at_start'),
                    $this->get('created_at_end')
                )
            ]
        ];
    }
}
