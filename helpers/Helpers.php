<?php
/**
 * Created by PhpStorm.
 * User: katell
 * Date: 9/18/18
 * Time: 10:41 AM
 */

class helpers
{


public static function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            }
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    }
    else {
        $output = $text;
    }
    return $output;
}


    public static function labelPostStatus($status) {

        if ( $status = 'published' ){
            $translated = 'publié';
        }

        if ( $status = 'draft' ){
            $translated = 'brouillon';
        }

        if ( $status = 'trash' ){
            $translated = 'poubelle';
        }

        if ( $status = 'pending' ){
            $translated = 'en attente';
        }

        return $translated;
    }

    public static function labelNotifStatus($status) {

        if ( $status = 'unread' ){
            $translated = 'non lue';
        }

        if ( $status = 'archived' ){
            $translated = 'archivée';
        }

        return $translated;
    }

    public static function labelCommentStatus($status) {

        if ( $status = 'approved' ){
            $translated = 'Approuvée';
        }

        if ( $status = 'rejected' ){
            $translated = 'Rejetée';
        }

        if ( $status = 'pending' ){
            $translated = 'En attente';
        }


        return $translated;
    }

}