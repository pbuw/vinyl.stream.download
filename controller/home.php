<?php
include "../service/data.php";


class homeController {

    static public function artists() {
        $dataService = new data();
        if (!isset($_GET["pageId"])) {
            $pageId = 1;
        } else {
            $pageId = $_GET["pageId"];
        }
        $artists = $dataService->getArtists($pageId);
        include("./view/artists.php");
    }

    static public function album($albumId) {
        $dataService = new data();
        $album = $dataService->getAlbum($albumId);
        include("./view/album.php");
    }

    static public function bearer() {
        include("./view/bearer.php");
    }

    public static function search($search) {
        $dataService = new data();
        $artists = $dataService->search($search);
        include("./view/artists.php");
    }

    public static function artist($artistId) {
        $dataService = new data();
        $artist = $dataService->getArtist($artistId);
        include("./view/artist.php");
    }
}


