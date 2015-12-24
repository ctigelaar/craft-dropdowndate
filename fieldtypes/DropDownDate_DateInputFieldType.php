<?php
namespace Craft;

class DropDownDate_DateInputFieldType extends DateFieldType
{
    public function getName()
    {
        return Craft::t('Date/Time') . ' '. Craft::t('Dropdown');
    }

    public function getSettingsHtml()
    {
        return craft()->templates->render('dropdowndate/settings', array(
            'settings' => $this->getSettings()
        ));
    }

    protected function defineSettings()
    {
        return array();
    }

    protected function getSettingsModel()
    {
        return new DropDownDate_DateInputModel();
    }

    public function prepSettings($settings)
    {
        return $settings;
    }

    public function getInputHtml($name, $value)
    {
        $settings = $this->getSettings();

        if ($value)
        {
            $value = new DateTime($value);
        }

        $dayRange = range(1, 31);
        $dayOption = array('label' => Craft::t('day'), 'disabled' => true);
        $dayVariables = array(
            'name'    => $name . '[day]',
            'value'   => $value ? $value->format('d') : false,
            'options' => array($dayOption) + array_combine($dayRange, $dayRange)
        );

        $monthRange = range(1, 12);
        $monthOption = array('label' => Craft::t('month'), 'disabled' => true);
        $monthVariables = array(
            'name'    => $name . '[month]',
            'value'   => $value ? $value->format('m') : false,
            'options' => array($monthOption) + array_combine($monthRange, $monthRange)
        );

        $yearStart = is_numeric($settings->yearRangeStart) ? $settings->yearRangeStart : date('Y', strtotime($settings->yearRangeStart));
        $yearEnd = is_numeric($settings->yearRangeEnd) ? $settings->yearRangeEnd : date('Y', strtotime($settings->yearRangeEnd));

        $yearRange = range($yearEnd, $yearStart);
        $yearOption = array('label' => Craft::t('year'), 'disabled' => true);
        $yearVariables = array(
            'name'    => $name . '[year]',
            'value'   => $value ? $value->format('Y') : false,
            'options' => array($yearOption) + array_combine($yearRange, $yearRange)
        );

        $input = '';
        $input .= craft()->templates->render('_includes/forms/select', $dayVariables);
        $input .= ' ';
        $input .= craft()->templates->render('_includes/forms/select', $monthVariables);
        $input .= ' ';
        $input .= craft()->templates->render('_includes/forms/select', $yearVariables);

        return $input;
    }

    public function prepValueFromPost($value)
    {
        if ($value)
        {
            $value = join('-', array($value['year'], $value['month'], $value['day']));
            return parent::prepValueFromPost($value);
        }
    }
}
