<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

global $is_yukata, $isSmartPhone, $isTablet, $language, $blogs;
?>
<?php
    if($language == "ja"):
        include "footer-ja.php";
    elseif($language == "en"):
        include "footer-en.php";
    elseif($language == "vi"):
        include "footer-vi.php";
    elseif($language == "tw"):
        include "footer-tw.php";
    elseif($language == "cn"):
        include "footer-cn.php";
    elseif($language == "ru"):
        include "footer-ru.php";
    elseif($language == "ko"):
        include "footer-ko.php";
    elseif($language == "th"):
        include "footer-th.php";
    elseif($language == "id"):
        include "footer-id.php";
    elseif($language == "ms"):
        include "footer-ms.php";
    elseif($language == "fr"):
        include "footer-fr.php";
    else:
        include "footer-hi.php";
    endif;

?>