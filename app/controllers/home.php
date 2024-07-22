<?php

class Home extends Controller {

    public function index() {
      $user = $this->model('User');
      $data = $user->test();
      $api = $this->model('Api');
      $movies = $api->search_movies_by_year_range(2024, 2024);

      $this->view('home/index', ['movies' => $movies]);

      die;
    }

}
