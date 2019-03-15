<!-- <div class="foot_box"> -->
	<div class="footer_wrapper">
		<div class="social">
			<div class="social_left">
				
				<span>Contact Us</span>	
				<div class="info_footer">
					<p>Spencer Animal Shelter (SAS) Pvt.Ltd</p>
					<ul>
						<li><img src="assets/images/map.png" alt="Mountain View"/>Animal Bussiness Center, Jawalakhel Road, Lalitpur</li><br>
						<li><img src="assets/images/email.png" alt="Mountain View"/> sales@animal.com.np, customercare@animal.com.np</li><br>
						<li><img src="assets/images/mail.png" alt="Mountain View"/>  GPO Box: 8975 EPC 1674
						</li><br>
					</ul>
				</div>
				<div class="social_icons">


					<ul>
						<li><a href="https://www.facebook.com/html/"><img src="assets/images/facebook.png" alt="Mountain View"/></a></li>
						<li><a href="https://www.twitter.com/html/" ><img src="assets/images/twitter.png" alt="Mountain View"/></a></li>
						<li><a href="https://www.instagram.com/html/"><img src="assets/images/instagram.png" alt="Mountain View"/></a></li>
						<li><a href="https://www.youtube.com/html/"><img src="assets/images/youtube.png" alt="Mountain View"/></a></li>
					</ul>
				</div>
			</div>
			<div class = help_footer>
				<p>Help & Support</p>
				<ul>
					<li><img src="assets/images/phone-book.png" alt="Mountain View"/>Phone Support</li>
					<li><img src="assets/images/email.png" alt="Mountain View"/> Message Support</li>
					<li><img src="assets/images/share.png" alt="Mountain View"/> share
					</li>
					<li><img src="assets/images/support.png" alt="Mountain View"/>  Field Support
					</li>
				</ul>
			</div>
			<div class="company_footer">
				<p>Company</p>
				<ul>
					<li>About Us</li>
					<li>Contact Us</li>
					<li>Vacancy</li>
					<li>Privacy Policy</li>
					<li>Coupon</li>
				</ul>		
			</div>		
		</div>
	</div>
	
  <script type="text/javascript">

  	var slider_content = document.getElementById('box');

  	// contain images in an array
    var image = ['a','b', 'c', 'd','e'];

    var i = image.length;


    // function for next slide 

    function nextImage(){
    	if (i<image.length) {
    		i= i+1;
    	}else{
    		i = 1;
    	}
    	  slider_content.innerHTML = "<img src=jsslider/"+image[i-1]+".jpg>";
    }


    // function for prew slide

    function prewImage(){

    	if (i<image.length+1 && i>1) {
    		i= i-1;
    	}else{
    		i = image.length;
    	}
    	  slider_content.innerHTML = "<img src=jsslider/"+image[i-1]+".jpg>";

    }

  
  // script for auto image slider

  setInterval(nextImage , 4000);

  </script>



</body>
</html>