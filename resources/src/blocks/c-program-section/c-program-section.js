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

  gsap.from(".c-program-section__timebox", {y: "20vh", duration: 1.3, ease: "power3.out",
    scrollTrigger: {
      trigger: ".c-program-section",
      start: window.innerWidth > 952 ? "top center" : "top bottom-=25%",
      end: window.innerWidth > 952 ? "top center" : "top bottom-=25%",
      toggleActions: "play none reverse none"
    }
  })
}
