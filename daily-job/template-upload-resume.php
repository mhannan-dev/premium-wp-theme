<?php
/*
Template Name: Custom Upload Resume Template
*/

get_header();
?>

<div class="bradcam_area bradcam_bg_1">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="bradcam_text">
                          <h3>Resume Upload</h3>
                      </div>
                  </div>
              </div>
          </div>
</div>

<section class="contact-section section_padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Resume Upload</h2>
        </div>
        <div class="col-lg-10">
          <form class="form-contact contact_form" action="." method="post" novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="resume_file" accept="application/pdf" type="file">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_4 boxed-btn">Upload</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
<?php
get_footer();
?>