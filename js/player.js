var playerObj = {
    animationRunning: false,
    animationBtnRunning: false
};

playerObj.showHeader = function() {
    var headerObj = document.getElementById('lp-header-obj');
    var topPos = headerObj.offsetTop;
    
    if (topPos < 0) {
        topPos += 2;
        headerObj.style.top = topPos + 'px';
        setTimeout(function() {
            playerObj.showHeader();
        }, 10);
    } else {
        setTimeout(function() {
            playerObj.hideHeader();
        }, 2500);
    }

    if (playerObj.animationBtnRunning == false) {
        playerObj.animationBtnRunning = true;
        //document.getElementById('lp-btn-header').style.cursor = 'default';
        playerObj.hideButton();
    }

}

playerObj.hideHeader = function() {
    var headerObj = document.getElementById('lp-header-obj');
    var topPos = headerObj.offsetTop;
    
    if (topPos > -60) {
        topPos -= 2;
        headerObj.style.top = topPos + 'px';
        setTimeout(function() {
            playerObj.hideHeader();
        }, 10);
    } else {
        setTimeout(function() {
            playerObj.showButton();
        }, 200);
    }

}

playerObj.showButton = function() {
    /*var btnHeader = document.getElementById('lp-btn-header');
    var opBtn = parseFloat($(btnHeader).css('opacity'));

    if (opBtn < 1) {
        opBtn += 0.2;
        btnHeader.style.opacity = "" + opBtn;
        setTimeout(function() {
            playerObj.showButton();
        }, 50);
    } else {
        btnHeader.style.cursor = 'pointer';
        playerObj.animationRunning = false;
        playerObj.animationBtnRunning = false;
    }*/

    $('#lp-btn-header-left').show();
    $('#lp-btn-header-right').show();

    setTimeout(function() {
        playerObj.animationRunning = false;
        playerObj.animationBtnRunning = false;
    }, 300);
}

playerObj.hideButton = function() {
    /*var btnHeader = document.getElementById('lp-btn-header');
    var opBtn = parseFloat($(btnHeader).css('opacity'));

    if (opBtn > 0) {
        opBtn -= 0.2;
        btnHeader.style.opacity = "" + opBtn;
        setTimeout(function() {
            playerObj.hideButton();
        }, 50);
    }*/

    $('#lp-btn-header-left').hide();
    $('#lp-btn-header-right').hide();
}

setTimeout(function() {
    playerObj.hideHeader();
}, 2000);

/*document.getElementById('lp-btn-header').addEventListener('click', function() {
    if (playerObj.animationRunning) return;
    playerObj.animationRunning = true;
    playerObj.showHeader();
});*/

document.getElementById('lp-btn-header-left').addEventListener('mouseover', function() {
    if (playerObj.animationRunning) return;
    playerObj.animationRunning = true;
    playerObj.showHeader();
});

document.getElementById('lp-btn-header-right').addEventListener('mouseover', function() {
    if (playerObj.animationRunning) return;
    playerObj.animationRunning = true;
    playerObj.showHeader();
});