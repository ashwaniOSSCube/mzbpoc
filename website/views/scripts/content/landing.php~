<!-- main content -->
					<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
					<div id="main" class="container-fluid">
					<!-- END SHOPPAGE_HEADER.HTM --><div class="breadcrumb"><a href="default.asp"> Home </a>&nbsp;:<a href="shopdisplaycategories.asp"> Brands</a>:&nbsp;<a href="shopdisplaycategories.asp?id=8&amp;cat=Chase+%26amp%3B+Sanborn">Chase &amp; Sanborn</a></div>
	<div id="emailsubscribe" class="mailchimp-button chase"><a href="#"><img border="0" src="/website/mzb_content/images/emailIcon.png" alt="" /></a><a href="#">Subscribe</a></div>
	<!-- Begin MailChimp Signup Form -->
	<div id="mailchimp-container" class="chase">
	  <div id="mailchimp-form">
	    <div id="mc_embed_signup">
	      <form action="//chaseandsanborn.us11.list-manage.com/subscribe/post?u=acba3b2552e45dede95cac0fd&amp;id=91dd1e5581" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	        <div id="mc_embed_signup_scroll">
	          <div class="close">X</div>
	          <h2>Subscribe to our mailing list</h2>
	          <div class="mc-field-group">
	            <label for="mce-EMAIL">Email Address <span class="asterisk">*</span> </label>
	            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
	          </div>
	          <div class="mc-field-group">
	            <label for="mce-FNAME">First Name </label>
	            <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
	          </div>
	          <div class="mc-field-group">
	            <label for="mce-LNAME">Last Name </label>
	            <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
	          </div>
	          <div class="clear">
	            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
	          </div>
	          <div class="mc-field-group input-group" style="display:none">
	            <ul>
	              <li>
	                <input checked type="checkbox" value="2" name="group[5661][2]" id="mce-group[5661]-5661-1">
	                <label for="mce-group[5661]-5661-1">Shop MZB Customers</label>
	              </li>
	            </ul>
	          </div>
	          <div id="mce-responses" class="clear">
	            <div class="response" id="mce-error-response" style="display:none"></div>
	            <div class="response" id="mce-success-response" style="display:none"></div>
	          </div>
	          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
	          <div style="position: absolute; left: -5000px;">
	            <input type="text" name="b_acba3b2552e45dede95cac0fd_91dd1e5581" tabindex="-1" value="">
	          </div>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
	<!--End mc_embed_signup--> 
	<script type="text/javascript">
	jQuery(function( $ ){
	     $('.mailchimp-button').click(function() {
			$('#mailchimp-form').fadeIn(500);
		});
	     $('#mc-embedded-subscribe, .close').click(function() {
			$('#mailchimp-form').fadeOut(500);
		});
	});
	</script>
	<?php 
	$mzbBrand = $this->brand;
	?>
	<div align="center">
	  <div class="catintro-chase">
	    <div><img height="240" align="left" width="199" src="<?= $this->brandImage; ?>" alt="<?= $mzbBrand->brand_name ?>" /></div><!-- /website/mzb_content/images/Chasecan.png-->
	    <div class="catintro-2-chase">
	      <p><?= $mzbBrand->brand_name; ?><!-- <img height="23" width="208" src="/website/mzb_content/images/ChaseSanbornTitleText.png" alt="<?= $mzbBrand->brand_name ?>" /> --></p>
	      <p><?= $mzbBrand->brand_desc; ?><!-- Established in 1878, Chase & Sanborn was the first to pack and ship roasted coffee in sealed tins. Today, Chase& Sanborn continues its tradition of quality at a value with a robust blend of coffee at an affordable price. --></p>
	    </div>
	    <div class="cb"> </div>
	  </div>
	</div>
	<?php
	$categories = $this->categories;
	?>
	<tr style="background-color:#FFFFFF">
		<?php
			foreach ($categories as $key => $value) {
		?>
		<td class="ac vt" width="33.3333333333333%">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="categorysummary" >
	    			<div  class="category_container">
	    				<a href="/shopdisplayproducts/<?= $value['id'];?>">
	    					<img class="product_thumbnail" border="0" src="<?= $value['category_image']; ?>" alt="Special Roast" />
	    				</a>
	 					<br />
	 					<div style="margin-top:5px;text-align:center;"><?= $value['category_description']?></div>
					</div>
				</div> 
			</div>
		</td>
		<?php }
		?>
		</tr>				
		<!-- START SHOPPAGE_TRAILER.HTM -->
	</div>
</div> 
