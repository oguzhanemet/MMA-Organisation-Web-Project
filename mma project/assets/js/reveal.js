const images = document.querySelectorAll(".img-container");

const removeOverlay = overlay => {
	let tl = gsap.timeline();

	tl.to(overlay, {
		duration: 1.4,
		ease: "Power2.easeInOut",
		width: "0%"
	});

	return tl;
};

const scaleInImage = image => {
	let tl = gsap.timeline();

	tl.from(image, {
		duration: 1.4,
		scale: 1.4,
		ease: "Power2.easeInOut"
	});

	return tl;
};

images.forEach(image => {
  
	gsap.set(image, {
		visibility: "visible"
	});
  
	const overlay = image.querySelector('.img-overlay');
	const img = image.querySelector("img");

	const masterTL = gsap.timeline({ paused: true });
	masterTL
    .add(removeOverlay(overlay))
    .add(scaleInImage(img), "-=1.4");
  
  
  let options = {
    threshold: 0
  }

	const io = new IntersectionObserver((entries, options) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				masterTL.play();
			} else {
        masterTL.progress(0).pause()
      }
		});
	}, options);

	io.observe(image);
});
