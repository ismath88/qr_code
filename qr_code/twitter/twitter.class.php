<?php

class Twitter {
    public function __construct() {

    }

    public function searchResults( $search = 'love' ) {
        $url = "http://search.twitter.com/search.atom?q=" . urlencode(' love') . "&lang=en&rpp=10";

        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_URL, $url );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        $result = curl_exec( $curl );
        curl_close( $curl );

        $return = new SimpleXMLElement( $result );
        return $return;

        $return = new SimpleXMLElement( $result );
    }

    public function weeklyTrends() {
        $url = "http://search.twitter.com/trends/weekly.json";

        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_URL, $url );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        $result = curl_exec( $curl );
        curl_close( $curl );

        $return = json_decode( $result, true );
        return $return;
    }
}



/*$description = preg_replace("#(^|[\n ])@([^ \"\t\n\r<]*)#ise", "'\\1<a href=\"http://www.twitter.com/\\2\" >@\\2</a>'", $description);
            $description = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t<]*)#ise", "'\\1<a href=\"\\2\" >\\2</a>'", $description);
            $description = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#ise", "'\\1<a href=\"http://\\2\" >\\2</a>'", $description);*/
?>

