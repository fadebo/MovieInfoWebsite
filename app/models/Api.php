<?php

class Api {

    public function __construct() {
        // Any initialization code
    }

    public function search_movies_by_year_range($start_year, $end_year) {
        $all_movies = [];

        for ($year = $start_year; $year <= $end_year; $year++) {
            $page = 1;
            $total_results = 0;

            do {
                $query_url = "http://www.omdbapi.com/?apikey=" . $_ENV['omdb_key'] . "&s=" . $year . "&y=" . $year . "&type=movie&page=" . $page;
                $json = file_get_contents($query_url);

                if ($json === FALSE) {
                    break; // Exit the loop if there's an error
                }

                $phpObj = json_decode($json, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    break; // Exit the loop if there's a JSON decoding error
                }

                if (isset($phpObj['Search'])) {
                    $all_movies = array_merge($all_movies, $phpObj['Search']);
                }

                $total_results = isset($phpObj['totalResults']) ? intval($phpObj['totalResults']) : 0;
                $page++;

            } while (($page - 1) * 10 < $total_results); // Continue fetching pages while there are more results
        }

        return $all_movies;
    }

    public function search_movie_by_term($search_term) {
        $all_movies = [];
        $page = 1;

        do {
            $query_url = "http://www.omdbapi.com/?apikey=" . $_ENV['omdb_key'] . "&s=" . urlencode($search_term) . "&type=movie&page=" . $page;
            $json = file_get_contents($query_url);

            if ($json === FALSE) {
                break; // Exit the loop if there's an error
            }

            $phpObj = json_decode($json, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                break; // Exit the loop if there's a JSON decoding error
            }

            if (isset($phpObj['Search'])) {
                $all_movies = array_merge($all_movies, $phpObj['Search']);
            }

            $total_results = isset($phpObj['totalResults']) ? intval($phpObj['totalResults']) : 0;
            $page++;

        } while (($page - 1) * 10 < $total_results); // Continue fetching pages while there are more results

        return $all_movies;
    }
}