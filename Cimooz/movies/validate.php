  if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('location: http://localhost/wooxtravel/index.php');
        exit;
    }






    "SELECT 
        name AS search_result,
        'Movie' AS category
    FROM 
        movies
    WHERE 
        name LIKE '%$keyword%'
        OR genre LIKE '%$keyword%'
    UNION
    SELECT 
        actor_name AS search_result,
        'Actor' AS category
    FROM 
        hero_actors
    JOIN movie_hero_actors ON movie_hero_actors.actor_id = hero_actors.actor_id
    WHERE 
        actor_name LIKE '%$keyword%';
    ";