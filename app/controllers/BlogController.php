<?php
// app/controllers/BlogController.php
/**
 * Summary of BlogController
 */

class BlogController {
    /**
     * Summary of show
     */

    
   public function show() {
        // Récupérer tous les blogs depuis le modèle Blog
     //$blogs = Blog::getAllBlogs();

        // Charger la vue blog.php avec les blogs récupérés
        require_once 'app/views/blog2.php';
    }
   
}

?>
