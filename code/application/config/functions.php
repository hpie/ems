<?php

function createAndModifiedBy($userName) {
    $_POST['created_by'] =$userName;
    $_POST['modified_by'] = $userName;
    return $_POST;
}

function dateFormatter($old_date) {
    //echo $old_date;
    $date = date_create($old_date);
    //echo "<pre>1=-".$old_date." ";print_r($date);
    $new_date = date_format($date, "d-m-Y");
    return $new_date;
}

function dateFormatterComma($old_date) {
    //echo $old_date;
    $date = date_create($old_date);
    //echo "<pre>1=-".$old_date." ";print_r($date);
    $new_date = date_format($date, "M d, Y");
    return $new_date;
}

function dateFormatterMysql($old_date) {
    //echo $old_date;
    $date = date_create($old_date);
    //echo "<pre>1=-".$old_date." ";print_r($date);
    $new_date = date_format($date, "y-m-d");
    return $new_date;
}

function datetimeFormatter($old_date) {
    $date = date_create($old_date);
    $convert_date = date_format($date, "d/m/Y H:i");
    $new_date = $convert_date;
    return $new_date;
}

function unixTimestampToDT($timestamp) {
    $timestamp = $timestamp * 0.001;
    $new_date = date('d/m/Y H:i', $timestamp);
    return $new_date;
}

function unixTimestampToD($timestamp) {
    $timestamp = $timestamp * 0.001;
    $new_date = date('d/m/Y', $timestamp);
    return $new_date;
}

function datetimeFormatterC($old_date) {

    $date = date_create($old_date);
    $new_date = date_format($date, 'j M, H:i A');
    return $new_date;
}

function getUniversityName($university) {
    $_SESSION['university'] = $university;
    return $_SESSION['university'];
}

function set_selected($desired_value, $new_value) {
    if ($desired_value == $new_value) {
        echo ' selected="selected"';
    }
}
function returnSingleImage($imgArray,$field) {
    $arr = array();
    $img_field=$field.'_image';
    if (!empty($imgArray)) {
        foreach ($imgArray as $row) {
            $image = explode(',', $row[$img_field]);
            $row['product_image'] = $image[0];
            array_push($arr, $row);
        }
    }
    return $arr;
}
?>