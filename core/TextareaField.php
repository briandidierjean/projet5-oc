<?php
namespace Core;

class TextareaField extends Field
{
    protected $cols;
    protected $rows;
    protected $field;

    /**
     * Build an HTML textarea field
     *
     * @return string
     */
    public function build()
    {
        $this->field = '<div class="control-group">
        <div class="form-group floating-label-form-group controls mb-0 pb-2">';

        if (!empty($this->errorMsg)) {
            $this->field .= '<label>'.$this->label.
            '</label><textarea class="form-control
            is-invalid" name="'.$this->name.'"';
        } else {
            $this->field .= '<label>'.$this->label.
            '</label><textarea class="form-control '.$this->class.'
            " name="'.$this->name.'"';
        }

        if (!empty($this->placeholder)) {
            $this->field .= ' placeholder="'.($this->placeholder).'"';
        }

        if (!empty($this->cols)) {
            $this->field .= ' cols="'.$this->cols.'"';
        }

        if (!empty($this->rows)) {
            $this->field .= ' rows="'.$this->rows.'"';
        }

        if (!empty($this->maxLength)) {
            $this->field .= ' maxlength="'.$this->maxLength.'"';
        }

        if (!empty($this->required) && $this->required == true) {
            $this->field .= ' required';
        }

        $this->field .= '>';

        if (!empty($this->value)) {
            $field .= htmlspecialchars($this->value);
        }

        $field .='</textarea>';

        if (!empty($this->errorMsg)) {
            $field .= '<div class="invalid-feedback">'.$this->errorMsg.'</div>';
        }
        
        return $field .= '</div>';
    }

    // SETTERS
    public function setCols($cols)
    {
        $cols = (int) $cols;
        if ($cols > 0) {
            $this->cols = $cols;
        }
    }

    public function setRows($rows)
    {
        $rows = (int) $rows;
        if ($rows > 0) {
            $this->rows = $rows;
        }
    }
}
