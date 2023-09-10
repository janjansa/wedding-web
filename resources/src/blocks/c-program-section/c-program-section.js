if (document.querySelector(".c-program-section")) {
  gsap.to(".c-program-section__headline", {
    scrollTrigger: {
      trigger: ".c-program-section__headline",
      start: "center center",
      end: "center top-=5000px",
      scrub: true,
      pin: true
    }
  })

  gsap.from(".c-program-section__timebox", {y: 250, duration: 1.3, ease: "power3",
    scrollTrigger: {
      trigger: ".c-program-section",
      start: "top 50%"
    }
  })
}
