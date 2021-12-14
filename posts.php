<?php include "inc/header.php"; ?>

    <!-- Masthead -->  
    <main id="home" class="masthead jarallax" style="background-image:url('img/news /news.jpg');" role="main">
      <div class="opener">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <h1>Latest News</h1>
              <p class="lead mt-4 mb-5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
              <button type="button" class="btn" data-toggle="modal" data-target="#send-request">Let's talk</button>
          </div>
          </div>
        </div>
      </div>
    </main>


<!-- News -->
    <section id="news" class="section bg-light">
     <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Latest news</h2></div>
        </div>
        <div class="mt-5 pt-5">
          <div class="row-news row">
       
          <?php
          if(isset($_GET['id'])) {
             $id = $_GET['id']; 
          }
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
                <figcaption><h5><a href="post.php?id=<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h5><?php echo substr($news['description'], 0, 99);?>
                </figcaption>
              </figure>
            </div>

            <?php } } ?>
         </div>
        </div>
      </div>
    </section>


    <!-- Footer -->  
    <footer>
      <div class="section bg-dark py-5 pb-0">
        <div class="container">
          <div class="row">
           <div class="col-md-6 col-lg-3">
             <h6 class="text-white mb-4">Phone:</h6>
             <p class="text-white mb-4">+72323156466:</p>
            </div>
            <div class="col-md-6 col-lg-3">
             <h6 class="text-white mb-4">Email:</h6>
             <p class="text-white mb-4">Richard@example.com</p>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6 class="text-white mb-4">Follow me:</h6>
              <ul class="social-icons">
               <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
               <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
               <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
               <li><a href="#"> <ion-icon name="logo-instagram"></ion-icon></a></li>
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
        <div class="container">© Copyright 2020 Richard. All Rights Reserved</div>
       </div>
    </footer>
    <?php include "inc/footer.php"; ?>