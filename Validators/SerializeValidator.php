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
            'serialize_name' => ["required"],
            'serialize_overview' => ["required"],
            'serialize_description' => ["required"],
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
                'serialize_name.required'          => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.name')]),
                'serialize_overview.required'      => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.overview')]),
                'serialize_description.required'   => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.description')]),
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
                'key' => 'serialize_name',
                'label' => trans($this->lang_admin.'.fields.name'),
                'min' => $_ln['serialize_name']['min'],
                'max' => $_ln['serialize_name']['max'],
            ],
            'overview' => [
                'key' => 'serialize_overview',
                'label' => trans($this->lang_admin.'.fields.overview'),
                'min' => $_ln['serialize_overview']['min'],
                'max' => $_ln['serialize_overview']['max'],
            ],
            'description' => [
                'key' => 'serialize_description',
                'label' => trans($this->lang_admin.'.fields.description'),
                'min' => $_ln['serialize_description']['min'],
                'max' => $_ln['serialize_description']['max'],
            ],
        ];

        $flag = $this->isValidLength($input['serialize_name'], $params['name']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['serialize_overview'], $params['overview']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['serialize_description'], $params['description']) ? $flag : FALSE;

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