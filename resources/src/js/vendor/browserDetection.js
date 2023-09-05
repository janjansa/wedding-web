checkBrowser()

function checkBrowser() {
    // Get the user-agent string
    let userAgentString = navigator.userAgent;

    let chromeAgent = userAgentString.indexOf("Chrome") > -1;
    let IExplorerAgent = userAgentString.indexOf("MSIE") > -1 || userAgentString.indexOf("rv:") > -1;
  
    let firefoxAgent = userAgentString.indexOf("Firefox") > -1;
    let safariAgent = userAgentString.indexOf("Safari") > -1;
          
    // Discard Safari since it also matches Chrome
    if ((chromeAgent) && (safariAgent)) safariAgent = false;
  
    let body = document.querySelector("body")
  
    if (safariAgent) body.classList.add("safari")
    if (chromeAgent) body.classList.add("chrome")
    if (firefoxAgent) body.classList.add("firefox")
    if (IExplorerAgent) body.classList.add("IExplorer")
}