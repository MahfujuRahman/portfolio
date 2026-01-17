/*--------------------- Copyright (c) 2023 -----------------------
[Master Javascript]
Project: Resume html
-------------------------------------------------------------------*/
(function ($) {
	"use strict";
	var Resume = {
		initialised: false,
		version: 1.0,
		mobile: false,
		init: function () {
			if (!this.initialised) {
				this.initialised = true;
			}
			else {
				return;
			}
			/*-------------- Resume Functions Calling ---------------------------------------------------
			------------------------------------------------------------------------------------------------*/


			this.tyipng();
			this.bottom_top();
			this.loader();
			this.toggle_menu();
			this.copy_right();
			this.port_tab();
			this.counter();
		},

		/*-------------- Resume Functions Calling ---------------------------------------------------
		--------------------------------------------------------------------------------------------------*/

		// Typing Effect
		tyipng: function () {
			 window.ityped.init(document.querySelector('.cv_profile_name'),{
                strings: ['S. M. Mahfujur Rahman.','Full-Stack Web Dev!','Laravel Developer!','Freelancer!'],
                loop: true,
                typeSpeed:  100,
                backSpeed:  100,
                showCursor: false,
            })
		},

		// Bottom To Top
		bottom_top: function () {
			if ($('#button').length > 0) {
				var btn = $('#button');
				var fixed = $('.vld_header_wrapper')
				$(window).scroll(function () {
					if ($(window).scrollTop() > 50) {
						btn.addClass('show');
						fixed.addClass('fixed');
					} else {
						btn.removeClass('show');
						fixed.removeClass('fixed');
					}
				});
				btn.on('click', function (e) {
					e.preventDefault();
					$('html, body').animate({ scrollTop: 0 }, '50');
				});
			}
		},

		// loader
		loader: function () {
			jQuery(window).on('load', function () {
				$(".loader").fadeOut();
				$(".spinner").delay(500).fadeOut("slow");
			});
		},

		// toggle menu
		toggle_menu: function(){
             // Toggle menu
             $('.cv_toggle_btn, .cv_menu_close').on('click', function () {
                $('body').toggleClass('menu-open');
            });

        },

		copy_right: function(){
			document.getElementById("copyYear").innerHTML = new Date().getFullYear();
		},

		port_tab: function(){
			$('.cv_port_tab li a').on('click', function(){
        		var target = $(this).attr('data-rel');
      			$('.cv_port_tab li a').removeClass('active');
        		$(this).addClass('active');
        		$("#"+target).fadeIn('slow').siblings(".cv_tab_pane").hide();
        		return false;
    		});
		},

		counter: function(){
			$('.timer').appear(function() {
				$(this).countTo();
			});
		},

	};
	Resume.init();

}(jQuery));


// **********************MY Custom js********************************
//Modal
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('exampleModal');

    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // Button that triggered the modal
        const title = button.getAttribute('data-title');
        const image = button.getAttribute('data-image');
        const description = button.getAttribute('data-description');
        const time = button.getAttribute('data-time');

        // Decode HTML entities to get the correct formatted HTML
        const decodeHtml = function(html) {
            const txt = document.createElement('textarea');
            txt.innerHTML = html;
            return txt.value;
        };

        const formattedDescription = decodeHtml(description);

        // Update the modal's content.
        const modalTitle = modal.querySelector('#modal-title');
        const modalImage = modal.querySelector('#modal-image');
        const modalDescription = modal.querySelector('#modal-description');
        const modalTime = modal.querySelector('#modal-time');

        if (modalTitle) {
            modalTitle.textContent = title;
        }
        modalImage.src = image;
        modalDescription.innerHTML = formattedDescription; // Use innerHTML to set formatted text
        modalTime.textContent = time;
    });
});


//Scroll tracker
$(document).ready(function() {

    $('html, body').scrollTop(0);

    $(document).on('scroll', function() {
        var scrollPosition = $(document).scrollTop();
        var offset = 100; // Adjust this offset as needed

        var sections = ['#home', '#about', '#exprience', '#portfolio', '#strength', '#education',
            '#contact'
        ];

        // Variable to keep track of the active section
        var activeSection = null;

        // Iterate through sections and find the active one
        for (var i = 0; i < sections.length; i++) {
            var section = sections[i];
            var sectionElement = $(section);

            if (sectionElement.length > 0) {
                var sectionTop = sectionElement.offset().top;
                var sectionBottom = sectionTop + sectionElement.outerHeight();

                // Check if scroll position is within the bounds of the section
                if (scrollPosition >= sectionTop - offset && scrollPosition < sectionBottom -
                    offset) {
                    activeSection = section;
                    break; // Exit loop once active section is found
                }
            }
        }

        // Update active class in the menu based on the activeSection found
        if (activeSection) {
            $('.cv_menus li a').removeClass('active');
            $('.cv_menus li a[href="' + activeSection + '"]').addClass('active');
        }


    });

    // Trigger scroll event initially to set initial state
    $(document).trigger('scroll');

});

//Email Template

document.getElementById('emailLink').addEventListener('click', function(event) {
    event.preventDefault();
    var email = "mahfujur.dev@gmail.com";
    var subject = "Get in Touch with Me";
    // var body = "Hi S. M. Mahfujur Rahman,\n\nI need some assistance and have a few questions. Could you please reach out to me at your earliest convenience?\n\nThank you,\n[Your information here]";
    var body =
`Hi S. M. Mahfujur Rahman,

I hope this message finds you well.

I have a few questions and need some assistance with a project I'm working on. Your expertise would be incredibly valuable, and I would greatly appreciate it if you could reach out to me at your earliest convenience.

Looking forward to hearing from you soon. Thank you in advance for your time and help.

Thank you,

[Your Name]
[Your Contact Information]
[Please feel free to customize the entire email to suit your needs.]
`;
    var gmailUrl = "https://mail.google.com/mail/?view=cm&to=" + encodeURIComponent(email) + "&su=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);
    window.open(gmailUrl, '_blank');
});
