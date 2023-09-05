// // create the scrollSmoother before your scrollTriggers
let smoother = ScrollSmoother.create({
    wrapper: "#smooth-wrapper",
    content: "#smooth-content",
    //normalizeScroll: true,
    ignoreMobileResize: true,
    smooth: 0.5,
    effects: true,
    smoothTouch: false
  });
  

const appHeight = () => {
    let doc = document.documentElement
    // alert("new heigth: " + window.innerHeight)
    doc.style.setProperty('--app-height', `${window.innerHeight*1}px`)
    doc.style.setProperty('--app-height-outer', `${window.outerHeight*1}px`)
}

appHeight()



// // reload
// let mobileLoaded = false;
// let dektopLoaded = false;
// let mm = gsap.matchMedia();
// mm.add({
//     isMax1700p: '(min-width: 953px) and (max-width: 1700px)',
//     isMin1700p: '(min-width: 1701px)',
//     isTablet: '(min-width: 768px) and (max-width: 952px)',      
//     isMobile: '(max-width: 952px)',      
// }, (context) => {
//     let {isMax1700p, isMin1700p, isTablet, isMobile} = context.conditions;

//     if (isMobile){
//         // mobile
//         if (dektopLoaded) {
//             window.scroll
//             // setTimeout(() => {
//                 // console.log("mobile resize")
//                 location.reload();
//             // }, 500)
//         } else {
//             mobileLoaded = true;
//             smoother.scrollTo(0);
//         }
//     } else {
//         // desktop
//         if (mobileLoaded) {
//             // setTimeout(() => {
//                 // console.log("mobile resize")
//                 location.reload();
//             // }, 500)
//         } else {
//             dektopLoaded = true;
//             smoother.scrollTo(0);
//         }
//     }

//     return () => { // optional
//     // custom cleanup code here (runs when it STOPS matching)
//     };
// });