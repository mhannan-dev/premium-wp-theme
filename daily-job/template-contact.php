<?php
/*
Template Name: Custom Contact Page
*/
session_start();
get_header();
?>
<!-- bradcam_area  -->
  <div class="bradcam_area bradcam_bg_1">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="bradcam_text">
                          <h3>Contact</h3>
                      </div>
                  </div>
              </div>
          </div>
  </div>
    
  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <?php @include('flash_msg.php'); ?>
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact" 
          action="<?php echo esc_url(get_template_directory_uri() . '/template-contact-submission.php'); ?>" method="POST" id="contactForm">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message" maxlength="500"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text"  placeholder="Enter Subject">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_4 boxed-btn">Send Message</button>
            </div>
          </form>
          
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Buttonwood, California.</h3>
              <p>Rosemead, CA 91770</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>00 (440) 9865 562</h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>support@colorlib.com</h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
  jQuery(document).ready(function($) {
    jQuery('#contactForm').validate({
      rules: {
        name: 'required',
        email: {
          required: true,
          email: true
        },
        subject: 'required',
        message: 'required'
      },
      messages: {
        name: 'Please enter your name',
        email: {
          required: 'Please enter your email address',
          email: 'Please enter a valid email address'
        },
        subject: 'Please enter a subject',
        message: 'Please enter a message'
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        jQuery(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        jQuery(element).removeClass('is-invalid');
      }
    });
  });
</script>

<?php
get_footer();
?>
