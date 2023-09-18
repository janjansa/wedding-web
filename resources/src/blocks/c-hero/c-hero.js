if (document.querySelector(".c-hero")) {
  let startTl = gsap.timeline();

  startTl.pause();

  startTl.from(".c-hero__textblock", {y: "20vh", opacity: 0, duration: 1.5, ease: "power3"}, 0.3);
  startTl.from(".c-hero__pic1", {y: "20vh", opacity: 0, duration: 1.4, ease: "power3"}, 1.4);
  startTl.from(".c-hero__pic2", {y: "20vh", opacity: 0, duration: 1.4, ease: "power3"}, "<");
  startTl.from(".c-hero__date", {y: "10vh", opacity: 0, duration: 1.4, ease: "power3"}, "<");
  startTl.from(".c-hero__leaves", {y: "10vh", opacity: 0, duration: 1.4, ease: "power3"}, "<");

  let animation = window.innerWidth > 952 ? '{"x": "200%", "duration": 1.4, "ease": "power3"}' : '{"y": "-15vh", "duration": 1.4, "ease": "power3"}';
  startTl.from(".c-hero__title", JSON.parse(animation), "<");
  startTl.from(".c-nav", {x: "-100%", duration: 1.4, ease: "power3"}, "<");

  // NOTE: tady bych u obou trochu ubral na tom pohybu na scroll, mělo by to být víc subble + ease: "none" je lepší na tohle na scroll - easing tý animaci dodává samotnej smooth scroll
  gsap.to(".c-hero__pic1", {top: "-20vh", duration: 2.5, ease: "power3", immediateRender: false,
    scrollTrigger: {
      trigger: ".c-hero",
      start: "top top",
      endTrigger: ".c-hero__pic1",
      end: "bottom top",
      scrub: true
    }
  });
  
  gsap.to(".c-hero__pic2", {
    top: "-20vh", // NOTE: hodnota má trochu jinou interpretaci + bug -> více na callu
    duration: 2.5, 
    ease: "power3", 
    immediateRender: false,
    scrollTrigger: {
      trigger: ".c-hero",
      start: "top top",
      endTrigger: ".c-hero__pic2",
      end: "bottom top",
      scrub: true
    }
  });



  window.addEventListener("load", () => {
    document.querySelectorAll(".--loader-prepare").forEach(element => {
      element.classList.remove("--loader-prepare");
    });

    startTl.play();
  })


}
