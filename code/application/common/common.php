<?php

/*
 * ***********************************************************************************
 * LOAD VIEW from View Directory To Controller
 * ***********************************************************************************
 */

function loadview($dir, $filename, $data) {
    global $APP;
    extract($data);
    include_once(APP_INCLUDE_V . "admin/pages/header.php");
    include_once(APP_INCLUDE_V . "admin/pages/sidebar.php");
    include_once(APP_INCLUDE_V . "admin/pages/topnavigation.php");
    include_once(APP_INCLUDE_V . $dir . $filename);
    include_once(APP_INCLUDE_V . "admin/pages/footer.php");
}

function loadviewClient($dir, $filename, $data) {
    global $APP;
    extract($data);
    include_once(APP_INCLUDE_V . $dir."header.php");
    include_once(APP_INCLUDE_V . $dir . $filename);
    include_once(APP_INCLUDE_V . $dir."footer.php");
}



function loadLoginView($dir, $filename, $data) {
    global $APP;
    extract($data);   
    include_once(APP_INCLUDE_V . $dir . $filename);    
}


 // Generate API key
function generateApiKey() {
        return md5(uniqid(rand(), true));
}

/*
 * ***********************************************************************************
 * HEAD PORTION START
 * ***********************************************************************************
 */
function titleDescription($TITLE) {

    if ($TITLE == FOC_DASHBOARD) {
        return FOC_DASHBOARD_DESC;
    } else if ($TITLE == FOC_PDF) {
        return FOC_PDF_DESC;
    } else if ($TITLE == FOC_DOCUMENT) {
        return FOC_DASHBOARD_DESC;
    } else if ($TITLE == FOC_EBOOK) {
        return FOC_EBOOK_DESC;
    } else if ($TITLE == FOC_IMAGE) {
        return FOC_IMAGE_DESC;
    } else if ($TITLE == FOC_AUDIO) {
        return FOC_AUDIO_DESC;
    } else if ($TITLE == FOC_VIDEO) {
        return FOC_VIDEO_DESC;
    } else if ($TITLE == FOC_ICON) {
        return FOC_ICON_DESC;
    } else if ($TITLE == FOC_ARCHIVE) {
        return FOC_ARCHIVE_DESC;
    } else if ($TITLE == FOC_CONVERT) {
        return FOC_CONVERT_DESC;
    } else if ($TITLE == FOC_FORMATE) {
        return FOC_FORMATE_DESC;
    } else if ($TITLE == FOC_FAQ) {
        return FOC_FAQ_DESC;
    } else if ($TITLE == FOC_ABOUT) {
        return FOC_ABOUT_DESC;
    } else if ($TITLE == FOC_SITEMAP) {
        return FOC_SITEMAP_DESC;
    } else if ($TITLE == FOC_PRIVACY) {
        return FOC_PRIVACY_DESC;
    }
}

function titleKeywords($TITLE) {

    if ($TITLE == FOC_DASHBOARD) {
        return FOC_DASHBOARD_KEYWORDS;
    } else if ($TITLE == FOC_PDF) {
        return FOC_PDF_KEYWORDS;
    } else if ($TITLE == FOC_DOCUMENT) {
        return FOC_DASHBOARD_KEYWORDS;
    } else if ($TITLE == FOC_EBOOK) {
        return FOC_EBOOK_KEYWORDS;
    } else if ($TITLE == FOC_IMAGE) {
        return FOC_IMAGE_KEYWORDS;
    } else if ($TITLE == FOC_AUDIO) {
        return FOC_AUDIO_KEYWORDS;
    } else if ($TITLE == FOC_VIDEO) {
        return FOC_VIDEO_KEYWORDS;
    } else if ($TITLE == FOC_ICON) {
        return FOC_ICON_KEYWORDS;
    } else if ($TITLE == FOC_ARCHIVE) {
        return FOC_ARCHIVE_KEYWORDS;
    } else if ($TITLE == FOC_CONVERT) {
        return FOC_CONVERT_KEYWORDS;
    } else if ($TITLE == FOC_FORMATE) {
        return FOC_FORMATE_KEYWORDS;
    } else if ($TITLE == FOC_FAQ) {
        return FOC_FAQ_KEYWORDS;
    } else if ($TITLE == FOC_PRIVACY) {
        return FOC_PRIVACY_KEYWORDS;
    } else if ($TITLE == FOC_ABOUT) {
        return FOC_ABOUT_KEYWORDS;
    } else if ($TITLE == FOC_SITEMAP) {
        return FOC_SITEMAP_KEYWORDS;
    }
}

/*
 * ***********************************************************************************
 * HEAD PORTION END
 * ***********************************************************************************
 */


/*
 * ***********************************************************************************
 * PRINT DATA
 * ***********************************************************************************
 */

function prePRINT($obj, $isDie=true) {
    echo "<pre>";
    print_r($obj);
    if ($isDie) {
        die;
    }
}

/*
 * ***********************************************************************************
 * IMAGE UPLOAD START
 * ***********************************************************************************
 */

function singleImageUpload($file_tag) {   
    $file_ary = $_FILES[$file_tag];
    return imageUpload($file_ary);
}

function multiImageUpload($file_tag) {


    //print_r($_FILES[$file_tag]);die;
    $file_ary = reArrayFiles($_FILES[$file_tag]);
    //print_r($file_ary);die;
    $output_array = array();
    foreach ($file_ary as $file) {
        array_push($output_array, imageUpload($file));
    }
    return $output_array;
}

function reArrayFiles(&$file_post) {
    // print_r($file_post['name']);die;
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    //print_r($file_ary);die;
    return $file_ary;
}

function imageResizeLib($file, $filepath_original, $path_size) {
    if ($file) {
        $image = new \Eventviva\ImageResize($file);
        $image->save($filepath_original);
        if ($path_size && !empty($path_size)) {
            foreach ($path_size as $ps) {
                if (isset($ps['size']) && isset($ps['path'])) {
                    $image->resizeToBestFit($ps['size'], $ps['size']);
                    $image->save($ps['path']);
                }
            }
            return true;
        }
    }
    return false;
}

function imageUpload($file) {
    
    //If directory doesnot exists create it.
    $data = array();
    $output_dir = IMG_DIR;
    $output_subdir = $output_dir . "original/";
    $output_subdir1 = $output_dir . "large/";
    $output_subdir2 = $output_dir . "medium/";
    $output_subdir3 = $output_dir . "thumb/";


    if (isset($file)) {
        //print_r($file);die;
        $errors = array();
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp = $file['tmp_name'];
        $file_type = $file['type'];
        //print_r($file_name) ;die;
        $file_epld = explode('.', $file_name);
        $file_ext_temp = end($file_epld);
        $file_ext = strtolower($file_ext_temp);
        $filename = '';

        $expensions = array(
            "jpeg",
            "jpg",
            "png",
            "gif"
        );
        //echo $file_ext;die;       
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 10485760) {
            $errors[] = 'File size must be less than 10 MB';
        }
        if (empty($errors) == true) {

            $RandomNum = time() . date("-Ymd-hisa");
            $ImageName = str_replace(' ', '-', strtolower($file_name));
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.', '', $ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = 'uploads-' . rand(111, 999) . rand(11, 99) . '-' . $RandomNum . '.' . $ImageExt;

            $filepath_original = $output_subdir . $NewImageName;
            $path_size = array(
                array('path' => $output_subdir1 . $NewImageName, 'size' => 500),
                array('path' => $output_subdir2 . $NewImageName, 'size' => 300),
                array('path' => $output_subdir3 . $NewImageName, 'size' => 100)
            );
            if (imageResizeLib($file_tmp, $filepath_original, $path_size)) {
                // if(move_uploaded_file($file_tmp, "$output_dir/$NewImageName")){
                $data["image_name"] = $NewImageName;
                $message = 'File uploaded successfully';
                return array(true, $message, $data);
                die;
            } else {
                $message = "Invalid, File not correct";
                return array(false, $message, $data);
            }
        } else {
            $message = implode(" , ", $errors);
            return array(false, $message, $data);
        }
    } else {
        $message = "Required resource is invalid";
        return array(false, $message, $data);
    }
    return array(false, "System error", $data);
}




function encodeId($id) {
    $num=215+$id;
    $num=$num*2017;
    $result=$num;    
    return $result;
    
}
function decodeId($id) {
    $num=$id/2017;
    $num=$num-215;  
    $result=$num;
    return $result;
}
/*
 * ***********************************************************************************
 * IMAGE UPLOAD END
 * ***********************************************************************************
 */


/*
 * ---------------------------------------------------------------
 * Functions Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */



?>