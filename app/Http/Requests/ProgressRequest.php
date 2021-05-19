<?php
namespace App\Http\Requests;

use App\Models\Committee;

class ProgressRequest extends Request
{
    protected $errorBag = 'validation';
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'origin_id' => 'required',
            'original' => 'required',
            'progress_type_id' => 'required',
        ];
    }

    public function authorize()
    {
        if ($committee = Committee::find($this->request->get('committee_id'))) {
            return \Gate::allows('committee-can-edit', $committee);
        } else {
            return true;
        }
    }

    /**
     * @return array
     */
    public function sanitize()
    {
        if (!empty($this->get('files_array'))) {
            $input = $this->all();

            $input['files_array'] = json_decode($this->get('files_array'));

            $this->replace($input);
        }
        return $this->all();
    }
}
