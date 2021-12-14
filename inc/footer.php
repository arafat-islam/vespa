  <!-- Modal -->
  <div class="modal fade" id="send-request">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title mt-0">Send request</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Leave your contacts and our managers
            will contact you soon.</p>
          <form action="./action/message.php" method="post">
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" required="" placeholder="Email *">
            </div>
            <div class="form-group">
              <textarea rows="3" name="message" class="form-control" placeholder="Message"></textarea>
            </div>

            <div class="form-group mb-0 text-right">
              <input type="submit" name="submit" class="btn" value="Send">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script src="js/jarallax.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/interface.js"></script>
  </body>

  </html>

  <!-- <form action="" method="post" class="form-request js-ajax-form">
  <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="Name">
</div>
  <div class="form-group">
    <input type="email" name="email"  class="form-control" required="" placeholder="Email *">
  </div>
  <div class="form-group">
  <textarea rows="3" name="message"  class="form-control" placeholder="Message"></textarea>
  </div>

  <div class="form-group mb-0 text-right">
    <input type="submit" name="submit" class="btn" value="Send">
  </div>
</form> -->