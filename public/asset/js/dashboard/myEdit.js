let $wrapper = document.getElementById("main-wrapper");
let $contentBody = document.getElementById("content-body");
let $header = document.getElementById("header");
let $headerContent = document.getElementById("header-content");
let $footer = document.getElementById("footer");
$contentBody.style.marginRight = '60px';
$contentBody.style.marginLeft = '0px';
document.getElementById("quixnav").style.position = 'fixed';
document.getElementsByClassName('ps__thumb-y')[0].style.display = 'none';
function changeHamburger() {
    let $wrapper = document.getElementById("main-wrapper");
    if ($wrapper.classList.contains("menu-toggle")) {
        $contentBody.style.marginRight = '17.1875rem';
        $contentBody.style.marginLeft = '0px';
        $header.style.paddingRight = '17.1875rem';
        $headerContent.style.paddingRight = '3.875rem';
        $footer.style.paddingRight = '17.1875rem';
        document.getElementsByClassName('ps__thumb-y')[0].style.display = 'block';
    }
    else {
        $contentBody.style.marginRight = '60px';
        $contentBody.style.marginLeft = '0px';
        $header.style.paddingRight = '7.1875rem';
        $headerContent.style.paddingRight = '1.875rem';
        $footer.style.paddingRight = '60px';
        document.getElementsByClassName('ps__thumb-y')[0].style.display = 'none';

    }
}