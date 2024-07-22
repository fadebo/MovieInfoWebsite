<?php

class Movie extends Controller {

    public function index() {
        $api = $this->model('Api');

        $movies = $api->search_movies_by_year_range(2023, 2024);

        $this->view('movie/index', ['movies' => $movies]);
    }

    public function search() {
        if (!isset($_POST['search_term'])) {
            header('Location: /movie');
            exit;
        }

        $api = $this->model('Api');
        $search_term = $_POST['search_term'];
        $movies = $api->search_movie_by_term($search_term);

        $this->view('movie/results', ['movies' => $movies]);
    }

    public function review($movie_title = '', $rating = '') {
        if (!in_array($rating, [1, 2, 3, 4, 5])) {
            header('Location: /movie');
            exit;
        }

        // process the review
    }
}