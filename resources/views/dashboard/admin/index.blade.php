@extends('header-footer.index')

@section('content')

<main id="main">

    <!-- ======= Contact Single ======= -->
    <section class="contact">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 section-t8">
              <div class="row">
                <div class="col-md-12">
                  <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="Your Name" required>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input type="text" name="subject" class="form-control form-control-lg form-control-a" placeholder="Subject" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea name="message" class="form-control" name="message" cols="45" rows="8" placeholder="Message" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 my-3">
                        <div class="mb-3">
                          <div class="loading">Loading</div>
                          <div class="error-message"></div>
                          <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                      </div>

                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-a">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Contact Single-->

</main>
@endsection
