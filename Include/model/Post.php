<?php
class Post
{
    //Funktion för att hämta alla inlägg.
    //Funktionen hämtar alla inlägg från databasen och returnerar de.
    public static function getAll($db)
    {
        $stmt = $db->getConnection()->query('SELECT posts.*, users.username 
        FROM posts
        JOIN users ON posts.user_id = users.id');
        return $stmt->fetchAll();
    }

    //Funktionen skapar ett inlägg.
    //Den tar emot informationen från inlägget och sparar undan det i databsen genom en sql förfrågan.
    public static function create($db, $title, $content, $user_id)
    {
        $stmt = $db->getConnection()->prepare(
            'INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)'
        );
        $stmt->execute([$title, $content, $user_id]);
    }

    //Funktionen hämtar alla inlägg av ett specifikt id. 
    //Funktionen tar emot ett postID sedan returnerar det inlägget som efterfrågades genom en sql förfrågan.
    public static function getById($db, $id)
    {
        $stmt = $db->getConnection()->prepare('SELECT posts.*, users.username 
        FROM posts
        JOIN users ON posts.user_id = users.id
        WHERE posts.id = ?');
        $stmt->execute([$id]);
        $post = $stmt->fetch();
        return $post;
    }

    //Funktionen hämtar alla inlägg från en specifik användare.
    //Den tar emot en användarID och sedan returnerar alla inlägg som användaren har publicerat.
    public static function getPostsByUserID($db, $userID)
    {
        $stmt = $db->getConnection()->prepare('SELECT posts.*, users.username 
        FROM posts
        JOIN users ON posts.user_id = users.id
        WHERE posts.user_id = ?');
        $stmt->execute([$userID]);
        $posts = $stmt->fetchAll();
        return $posts;
    }

    //Funktionen sparar kommentaren i databasen som användaren vill publicera
    //Funktionen skapar en sql förfrågan och senare utför förfrågan med de angivna attributen.
    public static function saveComment($db, $comment, $postID, $userID)
    {
        $stmt = $db->getConnection()->prepare('INSERT into comments (comment, postID, userID) VALUES (?, ?, ?)');
        $stmt->execute([$comment, $postID, $userID]);
    }

    //Funktionen hämtar alla inlägg baserat på ett specifikt postID
    //Funktionen skapar en sql förfrågan som hämtar kommentarar, och sedan returnerar alla kommentarer till den specifika inlägget.
    public static function getCommentsByID($db, $postID)
    {
        $stmt = $db->getConnection()->prepare(' SELECT comments.*, users.username
        FROM comments
        JOIN users ON users.id = comments.userID
        WHERE comments.postID = ?
        ORDER BY comments.commentID DESC');
        $stmt->execute([$postID]);
        $comments = $stmt->fetchAll();
        return $comments;
    }

    //Funktion som söker fram inlägg från databasen baserat på ett sökord.
    //Funktionen tar emot ett sökord och returnerar inläggen som matchar sökordet.
    //En sql förfrågan skapas som kontrollerar om ordet finns i titlen eller i själva texten.
    //Alla inlägg som har sökordet skickas tillbaks
    public static function search($db, $searchWord)
    {
        $stmt = $db->getConnection()->prepare('SELECT posts.*, users.username
        FROM posts
        JOIN users ON posts.user_id = users.id
        WHERE title LIKE ? OR content LIKE ?');
        $stmt->execute(['%' . $searchWord . '%', '%' . $searchWord . '%']);
        $posts = $stmt->fetchAll();
        return $posts;
    }
}
