<?php
$connection = new PDO('mysql:host=localhost; dbname=myresumephp; charset=utf8', 'root', '');

$aboutData = $connection->query("SELECT * FROM about");
$aboutData = $aboutData->fetch();

$educationData = $connection->query("SELECT * FROM education");

$languagesData = $connection->query("SELECT * FROM languages");
$languagesData = $languagesData->fetchAll();

$interestsData = $connection->query("SELECT * FROM interests");
$interestsData = $interestsData->fetchAll();

$experiencesData = $connection->query("SELECT * FROM experiences");
$experiencesData = $experiencesData->fetchAll();

$projectsData = $connection->query("SELECT * FROM projects");
$projectsData = $projectsData->fetchAll();

$skillsData = $connection->query("SELECT * FROM skills");
$skillsData = $skillsData->fetchAll();

    if ($_POST['comment']) {
        $newComment = $_POST['comment'];
        $connection->query("INSERT INTO comments (comment) VALUE ('$newComment')");
        header("Location: " . $_SERVER['REQUEST_URI']);

    }
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Responsive Resume/CV Template for Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body>
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="assets/images/<?=$aboutData['img']?>" alt="" />
                <h1 class="name"><?= $aboutData['name']?></h1>
                <h3 class="tagline"><?= $aboutData['job']?></h3>
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto: <?= $aboutData['email']?>"><?= $aboutData['email']?></a></li>
                    <li class="phone"><i class="fa fa-phone"></i><a href="tel:<?= $aboutData['phone']?>"><?= $aboutData['phone']?></a></li>
                    <li class="website"><i class="fa fa-globe"></i><a href="/" target="_blank"><?= $aboutData['site']?></a></li>
                    <li class="linkedin"><i class="fa fa-linkedin"></i><a href="<?= $aboutData['linkedinLink']?>" target="_blank"><?= $aboutData['linkedin']?></a></li>
                    <li class="linkedin"><i class="fa fa-vk"></i><a href="<?= $aboutData['vkLink']?>" target="_blank"><?= $aboutData['vk']?></a></li>

                    <li class="github"><i class="fa fa-github"></i><a href="<?= $aboutData['githubLink']?>" target="_blank"><?= $aboutData['github']?></a></li>
<!--                    <li class="twitter"><i class="fa fa-twitter"></i><a href="https://twitter.com/3rdwave_themes" target="_blank">@twittername</a></li>-->
                </ul>
            </div><!--//contact-container-->
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>
                <?php foreach ($educationData as $education) :?>
                    <div class="item">
                        <h4 class="degree"><?= $education['course']?></h4>
                        <h5 class="meta"><?= $education['school']?></h5>
                        <div class="time"><?= $education['timeIn']?> - <?= $education['timeOut']?></div>
                    </div><!--//item-->
                <?php endforeach; ?>
            </div><!--//education-container-->
            
            <div class="languages-container container-block">
                <h2 class="container-block-title">Languages</h2>
                <ul class="list-unstyled interests-list">
                    <?php foreach ($languagesData as $lanuag): ?>
                    <li><?= $lanuag['languag']?> <span class="lang-desc">(<?= $lanuag['levelLanguag']?>)</span></li>
                    <?php endforeach;?>
                </ul>
            </div><!--//interests-->
            
            <div class="interests-container container-block">
                <h2 class="container-block-title">Interests</h2>
                <ul class="list-unstyled interests-list">
                    <?php foreach ($interestsData as $interes) : ?>
                    <li><?= $interes['interes']?></li>
                   <?php endforeach;?>
                </ul>
            </div><!--//interests-->
            <p class = "gitPage">this page on  <a href="<?= $aboutData['githubLink']?>" target="_blank">github</a></p>
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                <div class="summary">
                    <p>I am actively keen on and practicing web development, strenuously delving into the knowledge of PHP in both procedural and object oriented programming style. I also study the framework Yii2. I also tried to make this page on the basis of php and using databases.</p>
                </div><!--//summary-->
            </section><!--//section-->
            
            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>
                
                <div class="item">
	                <?php foreach ($experiencesData as $job): ?>
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"><?= $job['post']?></h3>
                            <div class="time"><?= $job['timeIn']?> - <?= $job['timeOut']?></div>
                        </div><!--//upper-row-->
                        <div class="company"><?= $job['company']?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?= $job['details']?></p>
                    </div><!--//details-->
                    <hr>
	            <?php endforeach;?>
                </div><!--//item-->

                
            </section><!--//section-->
            
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                <div class="intro">
                    <p>All my projects are mainly on gitHub and you can see them there. Here is the link. <a href="<?= $aboutData['githubLink']?>" target="_blank">github</a> Or by clicking on some links separately even lower.</p>
                    
                </div><!--//intro-->
                <?php foreach ($projectsData as $project) : ?>
                <div class="item">
                    <span class="project-title"><a href="<?= $project['projectLink']?>"><?= $project['projectTitle']?></a></span> - <span class="project-tagline"><?= $project['projectDescription']?></span>
                    
                </div>
                <hr style="width: 10%; text-align: left; margin: 20px 0;">
                <?php endforeach; ?>

               

            </section><!--//section-->
            
            <section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                <div class="skillset">  
                <?php foreach ($skillsData as $skill) : ?>      
                    <div class="item">
                        <h3 class="level-title"><?= $skill['scillTitle']?></h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?= $skill['scillLevel']?>">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                    <?php endforeach; ?>
                  
                    
                </div>  
            </section><!--//skills-section-->
            <form action="" method="post">
                <input type="text" name = "comment" required>
                <input type="submit" value="отправить">
            </form>
            <hr>

            <?php 

                $allComments = $connection->query("SELECT * FROM comments ORDER BY id DESC");

                foreach ($allComments as $comment) {
                    echo "<p>" . $comment['comment'] . "</p>";
                }
             ?>

        </div>

    </div>
    <footer class="footer">
        <div class="text-center">
                <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
        </div><!--//container-->
    </footer><!--//footer-->

 
    <!-- Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>    
    <!-- custom js -->
    <script type="text/javascript" src="assets/js/main.js"></script>            
</body>
</html> 

