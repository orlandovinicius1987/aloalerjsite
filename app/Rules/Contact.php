<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Data\Models\ContactType;

class Contact implements Rule
{
    protected $fieldNamesArray = [
        'mobile' => 'Celular',
        'whatsapp' => 'Whatsapp',
        'email' => 'E-mail',
        'phone' => 'Telefone Fixo',
        'facebook' => 'Facebook',
        'twitter' => 'Twitter',
        'instagram' => 'Instagram',
    ];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $contactTypeCode = app(ContactType::class)->find(
            request('contact_type_id')
        )->code;

        return $this->regexRules($contactTypeCode, request('contact'));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $contactTypeRepository = app(ContactType::class);
        $contactTypeCode = $contactTypeRepository->find(
            request('contact_type_id')
        )->code;

        return (
            'O campo contato não é um ' .
            $this->fieldNamesArray[$contactTypeCode] .
            ' válido.'
        );
    }

    private function validatePhone($phone, $type)
    {
        $phone = preg_replace('/\D/', '', $phone);
        switch ($type) {
            case 'mobile':
                return strlen($phone) == 11;
                break;
            case 'phone':
                return strlen($phone) == 10;
                break;
            default:
                return false;
        }
    }

    /**
     * @param $contactTypeCode
     * @param $contact
     * @param $match
     * @return bool
     */
    protected function regexRules($contactTypeCode, $contact)
    {
        $pass = false;
        switch ($contactTypeCode) {
            case 'mobile':
                $pass = $this->validatePhone($contact, 'mobile');
                break;
            case 'whatsapp':
                $pass = $this->validatePhone($contact, 'mobile');
                break;
            case 'email':
                preg_match_all(
                    "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/m",
                    $contact,
                    $match
                );
                $pass = (sizeof($match[0]) == 1);
                break;
            case 'phone':
                $pass = $this->validatePhone($contact, 'phone');
                break;
            case 'facebook':
                $pass = true;
                break;
            case 'twitter':
                $pass = true;
                break;
            case 'instagram':
                $pass = true;
                break;
        }
        return $pass;
    }
}
