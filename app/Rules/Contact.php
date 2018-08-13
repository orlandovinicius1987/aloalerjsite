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
        'instagram' => 'Instagram'
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
        $contactTypeRepository = app(ContactType::class);
        $contactTypeCode = $contactTypeRepository->find(
            request('contact_type_id')
        )->code;
        $contact = request('contact');

        $pass = false;

        switch ($contactTypeCode) {
            case 'mobile':
                $contact = preg_replace('/\D/', '', $contact);
                $pass = (strlen($contact) == 10 || strlen($contact) == 11);
                break;
            case 'whatsapp':
                $contact = preg_replace('/\D/', '', $contact);
                $pass = (strlen($contact) == 10 || strlen($contact) == 11);
                break;
            case 'email':
                preg_match_all(
                    "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/m",
                    $contact,
                    $match
                );
                $pass = (sizeof($match) == 1);
                break;
            case 'phone':
                $contact = preg_replace('/\D/', '', $contact);
                $pass = (strlen($contact) == 10 || strlen($contact) == 11);
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
}
