<x-home-master>

    @section('content')

<!-- Page Title START -->

    <section class="page-title-section-contact" data-type="background" data-speed="5" >
    </section>

  <!-- Page Title END -->


    <!-- Contact Boxes START -->
    <div class="section-block-grey">
        <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
            <div class="contact-box">
                <i class="fa fa-phone-square"></i>
                <h4>Call Us</h4>
                <span>+20 101-431-2319</span>
            </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
            <div class="contact-box">
                <i class="fa fa-map">
                </i>
                <a href="https://www.google.com/maps/place/blue+developments/@30.0760672,31.3069811,15z/data=!4m2!3m1!1s0x0:0xe1636613e77e4f42?sa=X&ved=2ahUKEwiN1bboio_tAhUIqaQKHd7gC8oQ_BIwCnoECBMQBQ"><h4>Visit Us </h4></a>

                <span>Nasr City, 19 b Salah Salem St, Cairo</span>
            </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
            <div class="contact-box">
                <i class="fa fa-envelope"></i>
                <h4>Mail Us</h4>
                <span>da-vinci@blue-developments.team</span>
            </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
            <div class="contact-box">
                <i class="fa fa-comments-o"></i>
                <h4>Live Chat</h4>
                <span>Chat with Us 24/7</span>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Contact Boxes END -->


    <!-- Contact Form Section START -->
    <div class="section-block">
        <div class="container">

            @if(Session::has('contact_message'))
                <blockquote class="blockquote">
                    <p> {{session('contact_message')}}</p>
                </blockquote>
            @endif


            <div class="section-heading center-holder">
                <span>Get in Touch</span>
                <h3>Let's Talk about Your Business</h3>
                <div class="section-heading-line"></div>
            </div>
            <div class="mt-50">
                <div class="contact-form-box">
                <!-- Form Start -->
                    {!! Form::open(['method'=>'POST', 'class'=>'contact-form row', 'action'=>'ContactController@store','autocomplete'=>'off','files'=>true]) !!}


                    {{ csrf_field() }}

                    <div class="col-md-6 col-sm-6 col-12">
                        <input type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <input type="email" name="email" placeholder="E-mail" required>
                    </div>

                    <div class="col-md-12">
                        <input type="text" name="subject" placeholder="Subject" required>
                    </div>

                    <div class="col-md-12">
                        <textarea name="body" placeholder="Message" required></textarea>
                    </div>
                    <div class="col-md-12">

                        <div class="center-holder">
                            <button type="submit">Send Message</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                <!-- Form End -->

                    <div class="col-md-12">
                        @include('includes.form_error')
                    </div>

                </div>
            </div>



        </div>
    </div>
    <!-- Contact Form Section END -->



    @endsection

</x-home-master>
