<?php
/**
 * Created by PhpStorm.
 * User: damilare-konga
 * Date: 6/3/18
 * Time: 11:23 AM
 */

namespace Motork;


class BaseController
{

    /**
     * @param array $compulsoryFields
     * @param $content
     * @throws \Exception
     */
    protected function validatePostRequest(array $compulsoryFields, $content)
    {
        if (!is_array($content)) {
            throw new \Exception('Invalid Params', '001');
        }

        $fields = [];
        $check = false;
        foreach ($compulsoryFields as $field) {
            if (!isset($content[$field]) || trim($content[$field]) === '') {
                $check = true;
                $fields[] = $field;
            }
        }

        if ($check){
            $fields = $this->formatMissingAttributesToBeDisplayed($fields);
            throw new \Exception(" : Missing Compulsory Field(s) - " . join(', ', $fields), 002);
        }
    }

    /**
     * @param $fields
     * @return mixed
     */
    private function formatMissingAttributesToBeDisplayed($fields) {
        $attributesFormatMap = [];
        foreach ($fields as $field) {
            if (isset($attributesFormatMap[$field])) {
                $index = array_search($field, $fields);
                $fields[$index] = $attributesFormatMap[$field];
            }
        }
        return $fields;
    }

}