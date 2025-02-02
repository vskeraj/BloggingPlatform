<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Details</title>
        <link rel="stylesheet" href="postipare.css">
    </head>
    <body>
        <div class="post-details">
            <img id="post-image" src="assets/fotoepare.jpg" alt="Post Image">
            <h2 id="post-title">A Cozy Moment</h2>
            <p id="post-content">In our fast-paced world, finding moments of comfort and warmth is essential for our well-being. "A Cozy Moment" is a blog that celebrates the simple joys of creating a space where you can unwind and embrace relaxation. Whether it’s curling up with a good book, enjoying a cup of hot tea by the fireplace, or taking a deep breath while wrapped in a soft blanket, this blog invites you to take a break and savor life's little comforts.

                We explore ways to cultivate coziness in your daily routine and home environment, from creating a peaceful ambiance with soft lighting and soothing music to setting aside time for self-care rituals. Learn tips for designing your personal sanctuary—a place that feels safe and inviting, where you can recharge your mind and body.
                
                "A Cozy Moment" also highlights the importance of being present and appreciating small details, like the aroma of freshly baked cookies or the warmth of a knitted sweater. It's about finding beauty in the mundane and allowing those moments to nourish your soul.
                
                Through this blog, discover how cozy moments can help reduce stress, enhance your mood, and contribute to a balanced and fulfilling lifestyle. It’s a reminder that in the middle of our busy lives, there’s always time to pause, enjoy the present, and find peace in the cozy moments that make life special</p>
                
                
                <div class="author">
                    <p>Altina Musaj</p>
                    <button  class="back-btn"  onclick="window.location.href='MyPosts.html'">Go Back</button>
                </div>
        
        
          
            <?php
// Kontrollo nëse useri është i kyçur
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<p>You must be logged in to add a comment.</p>";
} else {
?>
    <form action="comment_form.php" method="POST">
        <input type="hidden" name="post_id" value="1"> <!-- Zëvendëso me ID dinamike -->
        <textarea name="comment" placeholder="Write your comment here..." required></textarea>
        <button type="submit">Add Comment</button>
    </form>
<?php
}
?>
        </div>
</body>
</html>


    
