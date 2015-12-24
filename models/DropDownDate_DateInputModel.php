<?php
namespace Craft;

class DropDownDate_DateInputModel extends BaseModel
{
    /**
     * @access protected
     * @return array
     */
    protected function defineAttributes()
    {
        return array(
            'yearRangeStart' => array(AttributeType::String, 'default' => '-115 year', 'required' => true),
            'yearRangeEnd' => array(AttributeType::String, 'default' => 'now', 'required' => true)
        );
    }

    /**
     * @param null $attributes
     * @param bool $clearErrors
     * @return bool|void
     */
    public function validate($attributes = null, $clearErrors = true)
    {
        parent::validate($attributes, $clearErrors);

        if ($this->yearRangeStart)
        {
            if (!is_numeric($this->yearRangeStart) && strtotime($this->yearRangeStart) === false)
            {
                $this->addError('yearRangeStart', Craft::t('Not a valid value, use a full year notation or a strtotime() value.'));
            }
        }

        if ($this->yearRangeEnd)
        {
            if (!is_numeric($this->yearRangeEnd) && strtotime($this->yearRangeEnd) === false)
            {
                $this->addError('yearRangeEnd', Craft::t('Not a valid value, use a full year notation or a strtotime() value.'));
            }
        }

        return !$this->hasErrors();
    }
}
