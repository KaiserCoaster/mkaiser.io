<?php get_header() ?>

<main>

	<?php while(have_posts()): the_post() ?>
	
		<div class="section">
			<h2 class="bottom-margin"><?php the_title() ?></h2>
			<p class="bottom-margin">Send me a message and I'll reply back as soon as possible.</p>
			<form id="contact">
				<ul id="contact-form">	
					<li>
						<label for="contact-name">Name</label>
						<input id="contact-name" type="text" />
					</li>
					<li>
						<label for="contact-email">Email</label>
						<input id="contact-email" type="email" />
					</li>
					<li>
						<label for="contact-message">Message</label>
						<textarea id="contact-message"></textarea>
					</li>
					<li>
						<input type="submit" value="Send" class="button" id="contact-send" />
						<div id="contact-loading"><img src="/assets/loading.gif" /></div>
					</li>
				</ul>
			</form>
			<?php the_content() ?>
		</div>
		
	<?php endwhile; ?>
	
</main>

<script type="text/javascript">

	(function($){
		
		$(document).ready(function() {
			
			var ErrorEnum  = {
				NAME_EMPTY : 0,
				NAME_INVALID : 1,
				EMAIL_EMPTY : 2,
				EMAIL_INVALID : 3,
				MESSAGE_EMPTY : 4,
				MESSAGE_INVALID : 5,
				TIMED_OUT : 6,
				NOT_SENT : 7,
			};
			
			$("#contact").on('submit', function(e) {
				e.preventDefault();
				$("#contact-loading img").fadeIn('fast');
				$(".contact-error, .contact-error-under, .contact-success").slideUp('fast', function() {
					this.remove();
				});
				$.ajax({
					type: "POST",
					url: "/scripts/contact.php",
					data: { name: $("#contact-name").val(), from: $("#contact-email").val(), message: $("#contact-message").val() }
				})
				.done(function( msg ) {
					$("#contact-loading img").fadeOut('fast');
					console.log( msg );
					var response = JSON.parse(msg);
					if(response.success == true) {
						console.log("success");
						$("<div />").addClass('contact-success').text("Message sent!").insertAfter($("#contact-send")).slideDown('fast');
					}
					else {
						$.each(response.errors, function(k, v) {
							errorAlert(v);
						});
					}
				});
			});
			
			function errorAlert(errno) {
				var msg;
				var after;
				var divClass = "contact-error-under";
				switch(errno) {
					case ErrorEnum.NAME_EMPTY: 
						msg = "Name cannot be empty";
						after = $("#contact-name");
						break;
					case ErrorEnum.NAME_INVALID:
						msg = "Name entry is invalid";
						after = $("#contact-name");
						break;
					case ErrorEnum.EMAIL_EMPTY:
						msg = "Email cannot be empty";
						after = $("#contact-email");
						break;
					case ErrorEnum.EMAIL_INVALID:
						msg = "This email is not valid";
						after = $("#contact-email");
						break;
					case ErrorEnum.MESSAGE_EMPTY:
						msg = "Message cannot be empty";
						after = $("#contact-message");
						break;
					case ErrorEnum.MESSAGE_INVALID:
						msg = "Message entry is invalid";
						after = $("#contact-message");
						break;
					case ErrorEnum.TIMED_OUT:
						msg = "Slow down! Wait a bit before sending another message.";
						after = $("#contact-send").parent();
						divClass = "contact-error";
						break;
					case ErrorEnum.NOT_SENT:
						msg = "An error occurred and the message was not sent. Please try again.";
						after = $("#contact-send").parent();
						divClass = "contact-error";
						break;
				}
				$("<div />").addClass(divClass).text(msg).insertAfter(after).slideDown('fast');
			}
			
		});
	
	})(jQuery);

</script>

<?php get_footer() ?>