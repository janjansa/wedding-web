if (document.querySelector(".c-hero")) {
  gsap.from(".c-hero__textblock", {y: 250, opacity: 0, duration: 1.5, ease: "power3", delay: 0.3});
  gsap.from(".c-hero__pic1", {y: 250, opacity: 0, duration: 1.4, ease: "power3", delay: 1.4});
  gsap.from(".c-hero__pic2", {y: 250, opacity: 0, duration: 1.4, ease: "power3", delay: 1.4});
  gsap.from(".c-hero__date", {y: 100, opacity: 0, duration: 1.4, ease: "power3", delay: 1.4});
  gsap.from(".c-hero__leaves", {y: 100, opacity: 0, duration: 1.4, ease: "power3", delay: 1.4});

  let animation = window.innerWidth > 952 ? '{"x": 200, "duration": 1.4, "ease": "power3", "delay": 1.4}' : '{"y": -200, "duration": 1.4, "ease": "power3", "delay": 1.4}';
  gsap.from(".c-hero__title", JSON.parse(animation));
}
