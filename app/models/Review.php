<?php
class Review {
    public function addReview($movieTitle, $rating, $reviewText) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO movie_reviews (movie_title, rating, review_text) VALUES (:movieTitle, :rating, :reviewText)");
        $statement->bindValue(':movieTitle', $movieTitle);
        $statement->bindValue(':rating', $rating);
        $statement->bindValue(':reviewText', $reviewText);
        return $statement->execute();
    }

    public function getAverageRating($movieTitle) {
        $db = db_connect();
        $statement = $db->prepare("SELECT AVG(rating) as avg_rating FROM movie_reviews WHERE movie_title = :movieTitle");
        $statement->bindValue(':movieTitle', $movieTitle);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['avg_rating'];
    }
}