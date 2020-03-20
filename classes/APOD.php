<?php

    class APOD extends Database {
        private $api_url = "https://api.nasa.gov/planetary/apod";
        private $api_key = API_KEY;

        # API Calls
        protected function getApodPictures($days) {
            $current_date = time();
            $apods = array();

            for ($i = 0; $i < $days; $i++) {
                $date = date('Y-m-d', strtotime('-' . $i . 'day', $current_date));
                array_push($apods, json_decode(file_get_contents($this->api_url . "?date=" . $date . "&api_key=" . $this->api_key)));
            }

            return $apods;
        }

        protected function getApodPictureWithGivenDate($date) {
            return json_decode(file_get_contents($this->api_url . "?date=" . $date . "&api_key=" . $this->api_key));
        }

        # Datasbase
        protected function findLastestDate() {
            $sql = "SELECT date FROM pictures ORDER BY date LIMIT 1";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();
        }

        protected function findByDate($date) {
            $sql = "SELECT * FROM pictures WHERE date = :date";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":date", $date);
            $stmt->execute();

            return $stmt->fetch();
        }

        protected function findAll() {
            $sql = "SELECT * FROM pictures";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function findAllWithPagination($startAt, $perPage) {
            $sql = "SELECT * FROM pictures ORDER BY date ASC LIMIT :startAt, :perPage";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":startAt", $startAt);
            $stmt->bindParam(":perPage", $perPage);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        protected function create($copyright, $date, $explanation, $hdurl, $title, $url) {
            $sql = "INSERT INTO pictures (copyright, date, explanation, hdurl, title, url) VALUES (:copyright, :date, :explanation, :hdurl, :title, :url)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':copyright', $copyright);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':explanation', $explanation);
            $stmt->bindParam(':hdurl', $hdurl);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':url', $url);
            $stmt->execute();
        }

    }

?>