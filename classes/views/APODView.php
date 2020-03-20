<?php

    class APODView extends APOD {
        # API
        public function showApodPictures($days = 30) {
            return $this->getApodPictures($days);
        }

        public function showApodPictureWithGivenDate($date) {
            return $this->getApodPictureWithGivenDate($date);
        }

        # Database
        public function getLatestDay() {
            return $this->findLastestDate();
        }

        public function getAllPictures() {
            return $this->findAll();
        }

        public function getAllPicturesWithPagination($startAt, $perPage) {
            return $this->findAllWithPagination($startAt, $perPage);
        }

        public function getPictureByDate($date) {
            return $this->findByDate($date);
        }

        public function addPicture($copyright, $date, $explanation, $hdurl, $title, $url) {
            $this->create($copyright, $date, $explanation, $hdurl, $title, $url);
        }
    }

?>