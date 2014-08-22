<?php
/**
 * Shortcode to display a basic contact form
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_contact_form_shortcode( $atts, $content = '' ) {

	$out = sprintf(
		'<form action="%s" id="contact_form" method="post">
			<p>
				<label>Name</label><br />
				<input type="text" name="name" id="name" value="" class="requiredField name" />
			</p>

			<p>
				<label>Email Address</label><br />
				<input type="text" name="email" id="email" value=""  class="requiredField email" />
			</p>

			<p>
				<label>Your Message</label><br />
				<textarea name="message" id="message" rows="10" cols="30" class="requiredField message"></textarea>
			</p>

			<p>
				<input name="submitted" id="submitted" value="Submit" class="submit" type="submit" />
			</p>
		</form>',
		''
	);

	return $out;
}

add_shortcode( 'contact_form', 'wtm_contact_form_shortcode' );

