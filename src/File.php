<?php
/**
 * Created by PhpStorm.
 * User: julia
 * Date: 2/21/2019
 * Time: 11:36 AM
 *
 *
 */
include_once "CsvFunctions.php";
include_once "ArrayFunctions.php";
include_once "RecordFactory.php";
include_once "Records.php";
include_once "HtmlTags.php";
class File
{

    public static function readCSVtoArray($filename, $class)
    {
        $records = ArrayFunctions::makeArray();
        $count = 0;
        $fieldNames = '';
        $handle = CsvFunctions::openCSVFile($filename);
        while ($row = CsvFunctions::retrieveRowsFromCSVFile($handle)) {
            if ($count == 0) {
                $fieldNames = $row;
            } else {
                $records[] =(object)RecordFactory::buildArray($fieldNames, $row);
            }
            $count++;
        }
        CsvFunctions::closeCSV($handle);
        return $records;
    }

    public static function printArrayAsTable(Array $records)
    {
        $row = (HtmlTags::BeginOfHtml());
        $fieldnames = ArrayFunctions::printArrayKeys($records);
        $values = ArrayFunctions::printArrayValues($records);
        foreach ($fieldnames as $fieldname)
        {
            $row .= HtmlTags::HeaderCellTags($fieldname);
        }
        $row .= (HtmlTags::MidOfHtml());
        foreach ($values as $value)
        {
            $row .= HtmlTags::BeginOfRow();
            foreach ($fieldnames as $fieldname) {

                $row .= HtmlTags::RowCellTags($value[$fieldname]);
            }
            $row .= HtmlTags::EndOfRow();
        }
        $row .= (HtmlTags::EndOfHtml());
        return $row;
    }

}