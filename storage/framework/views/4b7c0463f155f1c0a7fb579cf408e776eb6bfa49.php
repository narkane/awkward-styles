<?php $__env->startSection('content'); ?>

    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    <div class="contactContainer">

        <div class="jumbotron bg-primary rounded-0">

            <div class="row">

                <div class="col-6">

                    <div class="contact-details">
                        <i class="fas fa-map"></i>
                        <a href="https://goo.gl/maps/QqJU5JM5KcMVt647A" target="_blank">9830 Bell Ranch Dr, Santa Fe Springs, CA 90670</a>
                    </div>

                    <div class="contact-details">
                        <i class="fas fa-phone-square-alt"></i>
                        <a href="tel:562-903-2626" title="Click To Call">562-903-2626</a>
                    </div>

                    <div class="contact-details">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:contact@awkwardstyles.com" title="Email Awkward Styles">contact@awkwardstyles.com</a>
                    </div>

                    <div class="contact-details pb-5">
                        <i class="fas fa-envelope"></i>
                        Monday – Friday 8:00 am – 4:00 pm / Saturday 9:00 am – 3:00 pm / Sunday Closed
                    </div>

                    <form name="contactForm" id="contactForm" method="POST">

                        <div class="form-group">

                            <label for="contactName" class="big-label">Name:</label>
                            <input class="form-control contact-input" type="text" id="contactName" placeholder="Please enter your name or company name.." required/>

                        </div>

                        <div class="form-group">

                            <label for="contactEmail" class="big-label">Email:</label>
                            <input class="form-control contact-input" type="email" id="contactEmail" placeholder="email@host.com" required/>

                        </div>

                        <div class="form-group">

                            <label for="contactSubject" class="big-label">Subject:</label>
                            <input class="form-control contact-input" id="contactSubject" type="text" placeholder="Topic of discussion.." required/>

                        </div>

                        <div class="form-group">

                            <label for="contactMessage" class="big-label">Message:</label>
                            <textarea class="form-control contact-input" id="contactMessage" placeholder="Message to send.." required></textarea>

                        </div>

                        <input type="button" class="btn btn-form" value="Send Message" />

                    </form>

                </div>

                <div class="col-6">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3309.6911352095067!2d-118.06516368435321!3d33.949071280634094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2d3aa84162fa9%3A0x7dd6386820c6e12d!2s9830+Bell+Ranch+Dr+%23101%2C+Santa+Fe+Springs%2C+CA+90670!5e0!3m2!1sen!2sus!4v1563815731213!5m2!1sen!2sus"
                            width="300" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div>

        </div>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>