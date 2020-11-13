<?php


class data {
    private function makeRequest($url) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $_COOKIE["bearer"]
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;

    }

    public function getAlbum($id) {
        return json_decode($this->makeRequest("https://api.vinyl.stream/api/v1/albums/" . $id));
    }

    public function getArtists($page = 1) {
        return json_decode($this->makeRequest("https://api.vinyl.stream/api/v1/artists?page=" . $page));
    }

    public function getTrackDetails($id) {
        return json_decode($this->makeRequest("https://api.vinyl.stream/api/v1/tracks/" . $id));
    }

    public function downloadTrack($id) {
        $details = $this->getTrackDetails($id);
        if (file_exists("songs/" . $details->title . $details->id . ".flac")) {
            header("Location: songs/" . $details->title . $details->id . ".flac");
        } else {
            $song = $this->makeRequest("https://api.vinyl.stream/api/v1/tracks/" . $id . "/file");
            file_put_contents("songs/" . $details->title . $details->id . ".flac", $song);
            header("Location: songs/" . $details->title . $details->id . ".flac");
        }

    }

    public function search($search) {
        return json_decode($this->makeRequest("https://api.vinyl.stream/api/v1/search?name=" . $search . "&page=1"));
    }

    public function getArtist($artistId) {
        return json_decode($this->makeRequest("https://api.vinyl.stream/api/v1/artists/" . $artistId));

    }
}
