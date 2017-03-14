<?php
/**
 * Created by PhpStorm.
 * User: codywofford
 * Date: 3/12/17
 * Time: 7:15 PM
 */

namespace Zcms;

class Form implements FormInterface
{
    private $title = "";
    private $method;
    private $action;
    private $inputs = array();
    private $outputHTML = '';

    /**
     * Form constructor.
     * @param string $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }


    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setAction(string $url)
    {
        $this->action = $url;
    }


    public function setMethod(string $method)
    {
        $this->method = $method;
    }

    public function addTextField($label, $name)
    {
        $this->inputs[] = array('type' => 'textfield', 'label' => $label, 'name' => $name);
    }

    public function addPasswordTextField($label, $name)
    {
        $this->inputs[] = array('type' => 'passwordtextfield', 'label' => $label, 'name' => $name);
    }

    public function addSubmitButton($label, $name)
    {
        $this->inputs[] = array('type' => 'submitbutton', 'label' => $label, 'name' => $name);
    }

    public function generateForm(): string
    {
        $this->outputHTML = "<form action=\"{$this->action}\" method=\"{$this->method}\">";
        $this->outputHTML .= "<h2>{$this->title}</h2>";

        foreach ($this->inputs as $id => $field) {
            switch ($field['type']) {
                case 'textfield':
                    $this->generateTextField($field);
                    break;
                case 'passwordtextfield':
                    $this->generatePasswordTextField($field);
                    break;
                case 'submitbutton':
                    $this->generateSubmitButton($field);
                    break;
            }
        }

        $this->outputHTML .= "</form>";
        return $this->outputHTML;
    }

    private function generateTextField(array $field)
    {
        $this->outputHTML .= $field['label'] . "<br />";
        $this->outputHTML .= "<input type=\"text\" name=\"{$field['name']}\" value=\"\"><br />";
    }

    private function generateSubmitButton(array $field)
    {
        $this->outputHTML .= "<input type=\"submit\" name=\"{$field['name']}\" value=\"{$field['label']}\"><br />";
    }

    private function generatePasswordTextField(array $field)
    {
        $this->outputHTML .= $field['label'] . "<br />";
        $this->outputHTML .= "<input type=\"password\" name=\"{$field['name']}\" value=\"\"><br />";
    }

}