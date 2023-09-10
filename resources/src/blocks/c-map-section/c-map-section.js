if (document.querySelector(".c-map-section")) {
  let width = window.innerWidth;
  let height = (width / 16) * 9;

  if (width < 952 && window.matchMedia('(orientation: portrait)').matches) {
    height = window.innerHeight;
    width = (height / 9) * 16;
  }

  gsap.fromTo(".c-map-section__bg", {width: 0, height: 0}, {width: width, height: height, duration: 1.5, ease: "power3",
    scrollTrigger: {
      trigger: ".c-map-section",
      start: "top 80%",
      end: "bottom bottom",
      scrub: true
    }
  });
}
