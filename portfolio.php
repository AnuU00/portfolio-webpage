<?php
session_start();

// Include functions and database connection
require_once("functions.php");
$db = connectDatabase();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = validateForm($_POST);
    
    if (empty($errors)) {
        $name = sanitizeInput($_POST["name"]);
        $email = sanitizeInput($_POST["email"]);
        $message = sanitizeInput($_POST["message"]);

        // Insert form data into the database
        insertProject($db, $name, $email, $message);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Webpage</title>
    
    <link rel="stylesheet" href="portfolio.css">
</head>
<body>
    
    <header>
        <div class="logo">
    
            <img src="logo.png" alt="Logo">
        </div>
        <nav>
    
            <a href="#about">About</a>
            <a href="#work">Work</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    
    <main>
        <section id="about">
    
            <h1>Hi, I'm H. A. Udayanga, a graphic designer.</h1>
    
            <p>I create beautiful and functional designs for web and print. I have a passion for typography, color, and layout. I enjoy working on projects that challenge my creativity and problem-solving skills.</p>
        </section>

        <section id="work">
         <h2>Add a New Project</h2>
         <form id="projectForm" action="" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit">Submit</button>
         </form>
    
            <h2>Some of my work</h2>
    
            <div class="grid">
    
                <article>
    
                    <img src="work1.jpeg" alt="Work 1">
    
                    <h3>Website Design</h3>
    
                    <p>I designed and developed this website for a local pharmacy. It features a responsive design, a custom logo, and an online ordering system.</p>
                </article>

                <article>
                    <img src="work2.jpeg" alt="Work 2">
                    <h3>Poster Design</h3>
                    <p>I created this poster for a music festival. It showcases the lineup of artists, the venue, and the date. I used bold colors and typography to attract attention.</p>
                </article>

                <article>
                    <img src="work3.jpeg" alt="Work 3">
                    <h3>Logo Design</h3>
                    <p>I designed this logo for a coffee shop. It represents the name and the concept of the business. I used a simple and elegant font and a coffee bean icon.</p>
                </article>

                <article>
                    <img src="work4.jpeg" alt="Work 4">
                    <h3>Brochure Design</h3>
                    <p>I designed this brochure for a travel agency. It showcases the destinations, the packages, and the testimonials. I used a clean and modern layout and vibrant images.</p>
                </article>
            </div>
        </section>

    

    </main>

    
    <aside>
    
        <h2>Related Links</h2>
    
        <ul>
    
            <li><a href="#">My Resume</a></li>
            <li><a href="#">My Blog</a></li>
            <li><a href="#">My Portfolio</a></li>
    
        </ul>
    </aside>

    
    <footer>
    
        <div class="social">
    
    
            <a href="#"><img src="facebook.png" alt="Facebook"></a>
            <a href="#"><img src="twitter.png" alt="Twitter"></a>
            <a href="#"><img src="instagram.png" alt="Instagram"></a>
    
        </div>

    
        <div class="contact">
    
    
            <p><img src="phone.png" alt="Phone"> +1-234-567-8900</p>
            <p><img src="email.png" alt="Email"> anu.ude@example.com</p>
    
        </div>

    
        <p><small>© 2023 by H.A.Udayanga. All rights reserved.</small></p>

    </footer>
    <script src="portfolio.js"></script>

</body>
</html>

