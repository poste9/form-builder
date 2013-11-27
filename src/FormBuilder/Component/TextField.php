<?php

namespace FormBuilder\Component;

use FormBuilder\Entity\Component;

class TextField extends Component {
    protected $type = "VARCHAR";

    /**
     * @param array $data
     * @return string
     */
    public function toHtmlField(array $data = null)
    {
        $html =
            '<div class="form-group">
                <label for="'.$this->name.'" class="label-control">'.$this->properties->label.'</label>';

        if ($this->properties->multiLine)
        {
            $html .=
                '<textarea
                    id="'.$this->name.'"
                    name="'.$this->name.'"
                    class="'.$this->properties->classes.'"
                    maxlength="'.$this->length.'"
                    rows="'.$this->properties->rows.'"
                    placeholder="'.$this->properties->placeholder.'"
                    ';
            if ($this->properties->required)
            {
                $html .= 'required';
            }

            $html .='>';
            if ($data)
                $html .= $data[$this->name];

            $html .= '</textarea>';
        }
        else
        {
            $html .=
                '<input type="text"
                    id="'.$this->name.'"
                    name="'.$this->name.'"
                    class="'.$this->properties->classes.'"
                    maxlength="'.$this->length.'"
                    placeholder="'.$this->properties->placeholder.'"
                    ';
            if ($this->properties->required)
            {
                $html .= 'required ';
            }

            if ($data)
                $html .= 'value="' . $data[$this->name] . '" ';

            $html .='/>';
        }

        $html .= '</div>';

        return $html;
    }

    /**
     * @param array $properties
     * @return void
     */
    public function loadProperties(\stdClass $properties)
    {
        $this->properties = $properties;
        foreach($properties as $name => $value)
        {
            switch($name)
            {
                case "name" :
                    $this->name = $value;
                    break;
                case "maxLength":
                    $this->length = $value;
                    break;
                case "multiLine":
                    if ($value)
                    {
                        $this->type = "TEXT";
                        $this->length = null;
                    }
                    break;
                case "required":
                    $this->nullable = !$value;
                    break;
                case "id":
                    $this->id = $value;
                    break;
            }
        }
    }
}