<?php include "inc/header.php"; ?>


<?php

$query = "SELECT * FROM banners WHERE status = 1";

$post = $db->select($query);
if($post) {
  $result = $post->fetch_assoc();


?>
    <!-- Masthead -->  
    <main id="home" class="masthead jarallax" style="background-image:url('img/banners/<?php echo $result['image']; ?>');" role="main">
      <div class="opener">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-5">
           
              <h1><?php echo $result['title']; ?></h1>
              <p class="lead mt-4 mb-5"><?php echo $result['description']; ?></p>
              <button type="button" class="btn" data-toggle="modal" data-target="#send-request"><?php echo $result['button']; ?></button>
          </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </main>

      <?php
      $query = "SELECT * FROM trust";
      $post = $db->select($query);
      if($post) {
        $result = $post->fetch_assoc();
      ?>
    <!-- About -->
    <section id="about" class="section">
     <div class="container">
       <h2 data-aos="fade-up"><?php echo $result['title']; ?></h2>
       <section class="mt-4">
          <div class="row">
            <div class="col-md-6 col-lg-5 mb-5 mb-md-0" data-aos="fade-up">
              <p><?php echo $result['description']; ?></p>
              <div class="experience d-flex align-items-center">
                <div class="experience-number text-parallax"><?php echo $result['experience']; ?></div><div class="text-dark mt-3 ml-4">Years<br> of experience</div>
              </div>
              <?php } ?>
            </div>
        
            <div class="col-md-5 offset-lg-2" data-aos="fade-in" data-aos-delay="50">
            <?php
            $trust_query = "SELECT * FROM skill WHERE status = 1";
            $trust_post = $db->select($trust_query);
            if($trust_post) { 
              while($skill = $trust_post->fetch_assoc()) {
             
            ?>

              <h6 class="mt-0"><?php echo $skill['name']; ?></h6>
              <div class="progress mb-5">
                <div class="progress-bar" role="progressbar" data-aos="width" style="width: <?php echo $skill['percentage'];?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <?php } } ?>
            </div>
           
          </div>
        </section>
      </div>
    </section>
    
    <section class="section bg-dark">
     <div class="container">
        <div class="container">
          <div class="row">

          <?php
            $services_query = "SELECT * FROM services WHERE status = 1";
            $services_post = $db->select($services_query);
            if($services_post) { 
              while($services = $services_post->fetch_assoc()) {
             
            ?>
            <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-in">
              <ion-icon class="text-white" name="logo-sass"></ion-icon>
              <h6 class="text-white"><?php echo $services['name']; ?></h6>
              <p><?php echo $services['description']; ?></p>
            </div>
            <?php } } ?>
          </div>
        </div>
      </div>
    </section>
      
     <!-- Experience -->
     <section id="experience" class="section pb-0">
      <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Experience</h2></div>
          <div class="col-md-5 offset-md-1 text-md-right"><h6 class="my-0 text-gray"><a href="">Download my cv</a></h6></div>
        </div>
        <div class="mt-5 pt-5">
        <?php
            $experience_query = "SELECT * FROM experience";
            $experience_post = $db->select($experience_query);
            if($experience_post) { 
              while($experience = $experience_post->fetch_assoc()) {
             
            ?>
          <div class="row-experience row justify-content-between" data-aos="fade-up">
            <div class="col-md-4">
              <div class="h6 my-0 text-gray"><?php echo $experience['date']; ?></div>
              <h5 class="mt-2 text-primary text-uppercase"><?php echo $experience['title']; ?></h5>
            </div>
            <div class="col-md-4">
              <h5 class="mb-3 mt-0 text-uppercase"><?php echo $experience['designation']; ?></h5>
            </div>
            <div class="col-md-4">
              <p><?php echo $experience['description']; ?></p>
            </div>
          </div>
     
          <?php } } ?>
       
          </div>
        </div>
      </div>
    </section>
    
    <!-- Projects -->
    <section id="projects" class="section">
     <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Featured projects</h2></div>
          <div class="col-md-5 offset-md-1 text-md-right"><h6 class="my-0 text-gray"><a href="#">View all projects</a></h6></div>
        </div>
        <div class="mt-5 pt-5" data-aos="fade-in">
          <div class="carousel-project owl-carousel">
     
          <?php
            $projects_query = "SELECT * FROM projects";
            $projects_post = $db->select($projects_query);
            if($projects_post) { 
              while($projects = $projects_post->fetch_assoc()) {
          
            ?>
  
            <div class="project-item">
              <a href="#project3" class="popup-with-zoom-anim">
                <figure class="position-relative">
                  <img alt="" class="w-100" src="./img/projects/<?php echo $projects['image']; ?>">
                  <figcaption class="text-white">
                    <h3 class="mb-2 text-white"><?php echo $projects['title']; ?></h3>
                    <p><?php echo $projects['branding']; ?></p>
                  </figcaption>
                </figure>
              </a>
           </div>

     
           <?php } } ?>
         </div>
        </div>
      </div>
    </section>

   

    <!-- Project Modal Dialog 3 -->
    <div id="project3" class="container mfp-hide zoom-anim-dialog">
  <?php
      $projects_modal = "SELECT * FROM projects";
      $projects_modal_post = $db->select($projects_modal);
      if($projects_modal_post) { 
        while($projects_modal = $projects_modal_post->fetch_assoc()) {
    
  ?>
      <h2 class="mt-0"><?php echo $projects_modal['title']; ?></h2>
      <div class="mt-5 pt-2 text-dark">
        <div class="row">
          <div class="col">
            <h2><?php echo $projects_modal['branding']; ?></h2>
          </div>
        </div>
      </div>
      <img alt="" class="mt-5 pt-2 w-100" src="img/projects/<?php echo $projects_modal['image']; ?>">
    </div>

    <?php } } ?>

    
    <!-- Testimonials -->
    <!-- <section id="testimonials" class="testimonials section">
      <div class="container">
         <div class="carousel-testimonials owl-carousel">
         <?php
            // $testimonial_query = "SELECT * FROM testimonials";
            // $testimonial_post = $db->select($testimonial_query);
            // if($testimonial_post) { 
            //   while($testimonials = $testimonial_post->fetch_assoc()) {
          
            ?>   
           <div class="col-testimonial" data-aos="fade-up">
              <span class="quiote">"</span>
              <p><<?php //echo $testimonials['description']; ?>/p>
              <p class="mt-5 text-dark"><strong><?php //echo $testimonials['name']; ?></strong>- <?php //echo $testimonials['designation']; ?></p>
           </div>
           <?php //} } ?>
         </div>
       </div>
    </section> -->

     <!-- News -->
    <section id="news" class="section bg-light">
     <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Latest news</h2></div>
          <div class="col-md-5 offset-md-1 text-md-right"><h6 class="text-gray my-0"><a href="posts.php">View all news</a></h6></div>
        </div>
        <div class="mt-5 pt-5">
          <div class="row-news row">
       
          <?php
            $news_query = "SELECT * FROM news";
            $news_query_post = $db->select($news_query);
            if($news_query_post) { 
              while($news = $news_query_post->fetch_assoc()) {
          
            ?>      
            <div class="col-news col-md-6 col-lg-4" data-aos="fade-in" data-aos-delay="200">
              <figure class="position-relative">
                <div class="position-relative">
                  <a href="post.php?id=<?php echo $news['id']; ?>"><img alt="" class="w-100 d-block" src="img/news/<?php echo $news['image']; ?>"></a>
                  <mark class="date"><?php echo $news['date']; ?></mark>
                </div>
                <figcaption><h5><a href="post.php?id=<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h5><?php echo substr($news['description'], 0 , 70); ?>
                </figcaption>
              </figure>
            </div>

            <?php } } ?>
         </div>
        </div>
      </div>
    </section>

    <!-- Partners -->
    <!-- <section class="section-sm">
       <div class="container">
         <div class="row-partners row">
         <?php
            // $patners_query = "SELECT * FROM partners";
            // $patners_post = $db->select($patners_query);
            // if($patners_post) { 
            //   while($patners = $patners_post->fetch_assoc()) {
          
            ?>     
           <div class="col-partner col-md-6 col-lg-3" data-aos="fade-in">
              <img alt="" src="img/partners/<?php// echo $patners['image']; ?>">
           </div>
           <?php// } } ?>
         </div>
       </div>
    </section> -->


    <!-- Footer -->  
    <footer>
      <div class="section bg-dark py-5 pb-0">
        <div class="container">
          <div class="row">
           <div class="col-md-6 col-lg-3">
           <?php
              $footer_query = "SELECT * FROM footer";
              $footer_post = $db->select($footer_query);
              if($footer_post) { 
                $footer = $footer_post->fetch_assoc();
            
            ?>   
             <h6 class="text-white mb-4">Phone:</h6>
             <p class="text-white mb-4"><?php echo $footer['phone']; ?></p>
            </div>
            <div class="col-md-6 col-lg-3">
             <h6 class="text-white mb-4">Email:</h6>
             <p class="text-white mb-4"><?php echo $footer['email']; ?></p>
            </div>
            <?php } ?>
            <div class="col-md-6 col-lg-3">
              <h6 class="text-white mb-4">Follow me:</h6>
              <ul class="social-icons">
              <?php
              $social_query = "SELECT * FROM social";
              $social_post = $db->select($social_query);
              if($social_post) { 
                $socials = $social_post->fetch_assoc();
            
            ?>   
           <li><a target="_blank" href="<?php echo $socials['facebook']; ?>"><ion-icon name="logo-facebook"></ion-icon></a></li>
           <li><a href="<?php echo $socials['twitter']; ?>"><ion-icon name="logo-twitter"></ion-icon></a></li>
           <li><a href="<?php echo $socials['linkedin']; ?>"><ion-icon name="logo-linkedin"></ion-icon></a></li>
           <li><a href="<?php echo $socials['instagram']; ?>"> <ion-icon name="logo-instagram"></ion-icon></a></li>
               
        <?php } ?>
            </ul>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6 class="text-white mb-4">Subscribe:</h6>
              <form class="js-subscribe-form">
                <div class="input-group">
                  <input id="mc-email" type="email" class="form-control" placeholder="Email">
                  <div class="input-group-append">
                    <button class="btn" type="submit">Go</button>
                  </div>
                </div>
                <label class="mc-label" for="mc-email" id="mc-notification"></label>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copy section-sm">
      <?php
              $copyright_query = "SELECT * FROM copyright";
              $copyright_post = $db->select($copyright_query);
              if($copyright_post) { 
                $copyright = $copyright_post->fetch_assoc();
            
            ?>  
        <div class="container"><?php echo $copyright['title']; ?></div>
        <?php } ?>
       </div>
    </footer>
     
    <?php include "inc/footer.php"; ?>
