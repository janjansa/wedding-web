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

  setTimeout(() => {
    gsap.to(".c-hero__pic1", {y: "-20vh", duration: 2.5, ease: "power3", immediateRender: false,
      scrollTrigger: {
        trigger: ".c-hero",
        start: "top top",
        endTrigger: ".c-hero__pic1",
        end: "bottom top",
        scrub: true
      }
    });

    gsap.to(".c-hero__pic2", {y: "-20vh", duration: 2.5, ease: "power3", immediateRender: false,
      scrollTrigger: {
        trigger: ".c-hero",
        start: "top top",
        endTrigger: ".c-hero__pic2",
        end: "bottom top",
        scrub: true
      }
    });
  }, 2800);

  // let scrolled = false;
  //
  // window.addEventListener("scroll", () => {
  //
  //   if(!scrolled) {
  //     document.querySelector(".c-hero__pic1").classList.remove("--loader-prepare");
  //     document.querySelector(".c-hero__pic2").classList.remove("--loader-prepare");
  //
  //     document.querySelector(".c-hero__pic1").style.setProperty("opacity", 1);
  //     document.querySelector(".c-hero__pic2").style.setProperty("opacity", 1);
  //
  //     gsap.to(".c-hero__pic1", {y: "-25vh", duration: 0.5, ease: "power3", immediateRender: false, overwrite: true,
  //       scrollTrigger: {
  //         trigger: ".c-hero",
  //         start: "top top",
  //         endTrigger: ".c-hero__pic1",
  //         end: "bottom top",
  //         scrub: true,
  //         markers: true
  //       }
  //     });
  //
  //     gsap.to(".c-hero__pic2", {y: "-25vh", duration: 0.5, ease: "power3", immediateRender: false, overwrite: true,
  //       scrollTrigger: {
  //         trigger: ".c-hero",
  //         start: "top top",
  //         endTrigger: ".c-hero__pic2",
  //         end: "bottom top",
  //         scrub: true,
  //         markers: true
  //       }
  //     });
  //   }
  //
  //   scrolled = true;
  // })


  window.addEventListener("load", () => {
    document.querySelectorAll(".--loader-prepare").forEach(element => {
      element.classList.remove("--loader-prepare");
    });

    startTl.play();
  })


}
