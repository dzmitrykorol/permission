// import './base.scss';

if (!Element.prototype.matches) {
    Element.prototype.matches = Element.prototype.msMatchesSelector ||
        Element.prototype.webkitMatchesSelector;
}

if (!Element.prototype.closest) {
    Element.prototype.closest = function(s) {
        var el = this;

        do {
            if (el.matches(s)) return el;
            el = el.parentElement || el.parentNode;
        } while (el !== null && el.nodeType === 1);
        return null;
    };
}


var isIE = document.documentMode || /Edge/.test(navigator.userAgent);
var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
var isWebP = false;

if (!isIE && !isSafari) {
    isWebP = e => document.createElement('canvas').toDataURL('image/webp').indexOf('data:image/webp') == 0;
}

function handleWindowScroll(secondaryNav) {
    var menuBounds = secondaryNav.getBoundingClientRect();
    if (menuBounds.top === 0) {
        secondaryNav.classList.add('fully-charged');
    } else {
        secondaryNav.classList.remove('fully-charged');
    }
}

function handleHamberderClick(hamberder, menu, menuOverlay, closeIcon) {
    if (hamberder.classList.contains('expanded')) {
        hamberder.classList.remove('expanded');
        menu.classList.remove('expanded');
        menuOverlay.classList.remove('expanded');

        if (closeIcon) {
            closeIcon.classList.remove('expanded');
        }
    } else {
        document.querySelectorAll('.expanded').forEach((el) => el.classList.remove('expanded'));
        menu.classList.add('expanded');
        menuOverlay.classList.add('expanded');
        hamberder.classList.add('expanded');

        if (closeIcon) {
            closeIcon.classList.add('expanded');
        }
    }
}

function handleHamberderMenuClick(hamberder, menu, menuOverlay, closeIcon) {
    if (menu.classList.contains('expanded')) {
        hamberder.classList.remove('expanded');
        menu.classList.remove('expanded');
        menuOverlay.classList.remove('expanded');

        if (closeIcon) {
            closeIcon.classList.remove('expanded');
        }
    }
}

function handleMenuCloseClick() {
    document.querySelectorAll('.expanded').forEach(function (el) {
        el.classList.remove('expanded');
    })
}

function handleMenuOverlayClick() {
    document.querySelectorAll('.expanded').forEach(function (el) {
        el.classList.remove('expanded');
    });
}

function RemoveLastDirectoryPartOf(the_url)
{
    var the_arr = the_url.split('/');
    the_arr.pop();
    return( the_arr.join('/') );
}

function handleTabClick(hash, tabset) {

    var tabsContainer = document.querySelector('[data-tabs="' + tabset + '"]');
    var tabLinksContainer = document.querySelector('[data-for-tabs="' + tabset + '"]');

    var oldActiveTabs = tabsContainer.querySelectorAll('.active');
    var oldActiveTabLinks = tabLinksContainer.querySelectorAll('.active');
    console.log(hash);
    // history.replaceState({}, 'some title', '/');
    // history.pushState(null, "", location.href.split("?").pop());
    // history.pushState(null, "", location.href.split("/")[0]+'#'+hash);

    if(oldActiveTabs) {
        Array.from(oldActiveTabs).forEach(function (item) {
            if (item.classList.contains('active')) {
                item.classList.remove('active');
            }
        });
    }

    if(oldActiveTabLinks) {
        Array.from(oldActiveTabLinks).forEach(function (item) {
            if (item.classList.contains('active')) {
                item.classList.remove('active');
            }
        });
    }

    tabsContainer.querySelector('[data-tab="' + hash + '"]').classList.add('active');
    tabLinksContainer.querySelector('[data-tab-selector="' + hash + '"]').classList.add('active');

    /*
    var oldActiveTab = tabContent.parentNode.querySelector('.active');
    var oldActiveTabLink = evt.target.closest('[data-for-tabs]').querySelector('.active');
    if (oldActiveTab) {
      oldActiveTab.classList.remove('active');
    }
    if (oldActiveTabLink) {
      oldActiveTabLink.classList.remove('active');
    }
    if (tabContent) {
      evt.target.classList.add('active');
      tabContent.classList.add('active');
    }*/
}

function onTabClick(evt) {
    if (evt.target.hash !== '' && evt.target.getAttribute('href').indexOf('#') === 0) {
        handleTabClick(evt.target.hash.substr(1), 'secondary');
    }
}

function attachMenus() {
    var menuOverlay = document.querySelector('.menu-overlay');
    menuOverlay.addEventListener('click', handleMenuOverlayClick);
    document.querySelectorAll('[data-formenu]').forEach((menu) => {
        var menuTarget = menu.getAttribute('data-formenu');
        var targetMenu = document.querySelector('[data-menu="' + menuTarget + '"]');
        var closeIcon = document.querySelector('[data-menu-close="' + menuTarget + '"]');

        menu.addEventListener('click', handleHamberderClick.bind(this, menu, targetMenu, menuOverlay, closeIcon));
        targetMenu.addEventListener('click', handleHamberderMenuClick.bind(this, menu, targetMenu, menuOverlay, closeIcon));
        if (closeIcon) {
            closeIcon.addEventListener('click', handleMenuCloseClick);
        }
    });
}

function attachFieldToucher() {
    document.querySelectorAll('input').forEach((input) => {
        input.addEventListener('blur', (evt) => evt.target.classList.add('touched'));
    });
}
//if hash in url, check for hash
function attachTabs() {
    var existingHash = window.location.hash.substr(1);
    var existingActiveTablink = document.querySelector('[data-tab-selector="' + existingHash + '"]');
    var existingActiveTab = document.querySelector('[data-tab="' + existingHash + '"]');

    var tabsets = document.querySelectorAll('[data-tabs]');
    tabsets.forEach((tab) => tab.querySelectorAll('a').forEach(
        (tablink) => {
            tablink.addEventListener('click', onTabClick.bind(this));
        })
    );

    if (existingActiveTablink) {
        handleTabClick(existingHash, 'secondary')
    }
}

function dynImgSrc(image, field) {
    if (isIE && image.hasAttribute('data-src-jxr')) {
        image.setAttribute('src',image.getAttribute('data-src-jxr'));
    } else if(isSafari && image.hasAttribute('data-src-jpf')) {
        image.setAttribute('src',image.getAttribute('data-src-jpf'));
    } else if(isWebP && image.hasAttribute('data-src-webp')) {
        image.setAttribute('src',image.getAttribute('data-src-webp'));
    } else if(image.hasAttribute('data-src')) {
        image.setAttribute('src',image.getAttribute('data-src'));
    }
}

function dynBackgroundImgSrc(el, field) {
    if (isIE) {
        el.style.background = 'url('+el.getAttribute('data-background-src-jxr')+')';
    } else if(isSafari) {
        el.style.background = 'url('+el.getAttribute('data-background-src-jpf')+')';
    } else if(isWebP) {
        el.style.background = 'url('+el.getAttribute('data-background-src-webp')+')';
    } else {
        el.style.background = 'url('+el.getAttribute('data-background-src')+')';
    }
}

function handleLanguageSelection() {

}

function initialize() {
    var secondaryNav = document.querySelector('.secondary-nav');
    if (secondaryNav) {
        window.onscroll = handleWindowScroll.bind(this, secondaryNav);
    }
    attachMenus();
    attachFieldToucher();
    attachTabs();
    document.querySelectorAll('img[data-src]').forEach(dynImgSrc);
    document.querySelectorAll('[data-background-src]').forEach(dynBackgroundImgSrc);

    window.addEventListener('popstate', function(event) {
        var location = document.location.toString();
        var hashSplit = location.split('#');
        if (hashSplit.length === 2) {
            handleTabClick(hashSplit[1], 'secondary');
        } else {
            handleTabClick('devportal', 'secondary');
        }
    });
}

initialize();