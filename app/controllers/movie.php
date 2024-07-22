<?php

class Movie extends Controller {

    public function index() {
        $this->view('movie/index');
    }

    public function search() {
        if (!isset($_REQUEST['movie'])) {
            // redirect to /movie
            header('Location: /movie');
            exit;
        }

        $api = $this->model('Api');

        $movie_title = $_REQUEST['movie'];
        $movie = $api->search_movie($movie_title);

        $this->view('movie/results', ['movie' => $movie]);
    }

    public function review($movie_title = '', $rating = '') {
        // if rating isn't 1,2,3,4,5... etc.
        if (!in_array($rating, [1, 2, 3, 4, 5])) {
            // handle invalid rating
            header('Location: /movie');
            exit;
        }

        // process the review
    }
}