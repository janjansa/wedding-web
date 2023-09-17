if (document.querySelector(".c-map-section")) {

  gsap.fromTo(".c-map-section__bg", {width: "0%", height: "0%"}, {width: "100%", height: "100%", duration: 1.5, ease: "power3",
    scrollTrigger: {
      trigger: ".c-map-section",
      start: "top 80%",
      end: "bottom bottom",
      scrub: true
    }
  });
}
