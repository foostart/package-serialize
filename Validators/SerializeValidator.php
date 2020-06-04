<?php namespace Foostart\Serialize\Validators;

use Foostart\Category\Library\Validators\FooValidator;
use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Foostart\Serialize\Models\Serialize;

use Illuminate\Support\MessageBag as MessageBag;

class SerializeValidator extends FooValidator
{

    protected $obj_perialize;

    public function __construct()
    {
        // add rules
        self::$rules = [
            'perialize_name' => ["required"],
            'perialize_overview' => ["required"],
            'perialize_description' => ["required"],
        ];

        // set configs
        self::$configs = $this->loadConfigs();

        // model
        $this->obj_perialize = new Serialize();

        // language
        $this->lang_front = 'serialize-front';
        $this->lang_admin = 'serialize-admin';

        // event listening
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'perialize_name.required'          => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.name')]),
                'perialize_overview.required'      => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.overview')]),
                'perialize_description.required'   => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.description')]),
            ];
        });


    }

    /**
     *
     * @param ARRAY $input is form data
     * @return type
     */
    public function validate($input) {

        $flag = parent::validate($input);
        $this->errors = $this->errors ? $this->errors : new MessageBag();

        //Check length
        $_ln = self::$configs['length'];

        $params = [
            'name' => [
                'key' => 'perialize_name',
                'label' => trans($this->lang_admin.'.fields.name'),
                'min' => $_ln['perialize_name']['min'],
                'max' => $_ln['perialize_name']['max'],
            ],
            'overview' => [
                'key' => 'perialize_overview',
                'label' => trans($this->lang_admin.'.fields.overview'),
                'min' => $_ln['perialize_overview']['min'],
                'max' => $_ln['perialize_overview']['max'],
            ],
            'description' => [
                'key' => 'perialize_description',
                'label' => trans($this->lang_admin.'.fields.description'),
                'min' => $_ln['perialize_description']['min'],
                'max' => $_ln['perialize_description']['max'],
            ],
        ];

        $flag = $this->isValidLength($input['perialize_name'], $params['name']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['perialize_overview'], $params['overview']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['perialize_description'], $params['description']) ? $flag : FALSE;

        return $flag;
    }


    /**
     * Load configuration
     * @return ARRAY $configs list of configurations
     */
    public function loadConfigs(){

        $configs = config('package-serialize');
        return $configs;
    }

}