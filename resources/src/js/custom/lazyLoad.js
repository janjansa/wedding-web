// const lazyImages = document.querySelectorAll("img.lazy")
// const lazyVideos = document.querySelectorAll("video.lazy")
// const lazyMobile = document.querySelectorAll("video.lazy-mobile")
// const lazyDesktop = document.querySelectorAll("video.lazy-desktop")


// if (window.innerWidth >= 768) {
//   window.addEventListener("load", function() {
//     lazyDesktop.forEach(video => {
//       for (var source in video.children) {
//         var videoSource = video.children[source];
//         if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
//           videoSource.src = videoSource.dataset.src;
//         }
//       }
//       video.load();
//       video.classList.remove("lazy-dekstop");
//     });
//   })
// } else {
//   window.addEventListener("load", () => {
//     lazyMobile.forEach(video => {
//       for (var source in video.children) {
//         var videoSource = video.children[source];
//         if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
//           videoSource.src = videoSource.dataset.src;
//         }
//       }
//       video.load();
//       video.classList.remove("lazy-mobile");
//     });
//   })
// }



// lazyVideos.forEach(video => {
//   gsap.to(video, {

//     onStart: function() {
//       for (var source in video.children) {
//         var videoSource = video.children[source];
//         if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
//           videoSource.src = videoSource.dataset.src;
//         }
//       }

//       video.load();
//       // console.log("video loads")
//       video.classList.remove("lazy");
//     },
//     scrollTrigger: {
//       trigger: video,
//       start: "top 300%",
//       end: "top 300%",
//       once: true,
//       // toggleActions: "restart none none none",
//       // onEnter onLeave onEnterBack onLeaveBack
//       // markers: true,
//     }
//   })
// });



// lazyImages.forEach(image => {
//   gsap.to(image, {

//     onStart: function() {
//       image.src = image.dataset.src;
//       // console.log("image loads")
//       image.classList.remove("lazy");
//     },
//     scrollTrigger: {
//       trigger: image,
//       start: "top 250%",
//       end: "top 250%",
//       once: true,
//       // toggleActions: "restart none none none",
//       // onEnter onLeave onEnterBack onLeaveBack
//       // markers: true,
//     }
//   })
// });