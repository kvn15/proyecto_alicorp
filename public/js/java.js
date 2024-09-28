 
 
$(".owl-carousel").owlCarousel({
	items:10,
	loop: true,
	margin: 10,
	nav: true,
	autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 4
		},
		1000: {
			items: 7
		}
	}
});

$('.customNextBtn').click(function() {
    owl.trigger('next.owl.carousel');
})
// Go to the previous item
$('.customPrevBtn').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
})

//menu principal

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');

    openModalBtn.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    closeModalBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});