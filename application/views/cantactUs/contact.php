
<!-- inner banner -->
<div class="inner-banner" id="home">
    <div class="container">

    </div>	
</div>
<!-- inner banner -->
<!-- contact -->
<section class="contact py-5 my-lg-5">
    <h2 class="heading text-center mb-sm-5 mb-4"> Get In Touch </h2>
    <div class="map">
            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47491.005288533226!2d-88.04112836481997!3d41.93181507965691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880fad7e1d6ddc3d%3A0xbd8ff504d27e8e63!2sAddison%2C+IL%2C+USA!5e0!3m2!1sen!2sin!4v1522131822507"></iframe>-->
        <div class="main_grid_contact">
            <div  class="form">
                <h3 class="text-capitalize mb-2">send us a message</h3>
                <form action="#" method="post">
                    <div class="input-group">
                        <input type="text" class="margin2" name="name" placeholder="Full name" required="">
                        <input type="text" name="name" placeholder="Subject" required="">
                    </div>
                    <div class="input-group">
                        <input type="email" class="margin2" name="email" placeholder="mail@example.com"  required="">
                        <input type="text" name="number" placeholder="phone number"  required="">
                    </div>
                    <div class="input-group">
                        <textarea rows="4" cols="50" placeholder="message"></textarea>
                    </div>
                    <div class="input-group1">
                        <button class="submit btn">Send </button>
                    </div>
                </form>
            </div>
            <div class="w3ls-contact">
                    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBRPT5Mbn7P169R7PWk1hwE5eyaMGHhH5w '></script>
                    <div style='overflow:hidden;height:100%;'>
                        <div id='gmap_canvas' style='height:100%;'>
                        </div>
<!--                        <div>
                            <small><a href="http://embedgooglemaps.com">embed google maps</a></small>
                        </div>-->
                        <!--<div><small><a href="https:/disclaimergenerator.net">disclaimer example</a></small></div>-->
                        <style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div>
                    <script type='text/javascript'>function init_map() {
                            var myOptions = {zoom: 10, center: new google.maps.LatLng(19.2184594, 73.0932129), mapTypeId: google.maps.MapTypeId.ROADMAP};
                            map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                            marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(19.2184594, 73.0932129)});
                            infowindow = new google.maps.InfoWindow({content: '<strong>Daynil Group Solutions Pvt. Ltd.</strong><br>105, Building - 4, Shree Dhanshree Ekvira, Dombivli East, Thane, Mahashtra-421203<br>'});
                            google.maps.event.addListener(marker, 'click', function () {
                                infowindow.open(map, marker);
                            });
                            infowindow.open(map, marker);
                        }
                        google.maps.event.addDomListener(window, 'load', init_map);</script>
                    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1229.5864897864183!2d75.76904979762698!3d26.886852269789564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1499667244188" allowfullscreen="" width="1170" height="512"></iframe>-->
            </div>
        </div>
    </div>
</section>
<!-- //contact -->