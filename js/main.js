//default for home page functions
var formState = "login";

document.getElementById('login-action').style.cursor = 'pointer';
document.getElementById('regis-action').style.cursor = 'pointer';
document.getElementById('forgot-link').style.cursor = 'pointer';
document.getElementById('cancel-reset-pass').style.cursor = 'pointer';
document.getElementById('login-action').addEventListener('click', showLoginForm);
document.getElementById('regis-action').addEventListener('click', showRegistForm);
document.getElementById('forgot-link').addEventListener('click', showResetPassForm);
document.getElementById('cancel-reset-pass').addEventListener('click', showLoginForm);

function showLoginForm() {
    TweenMax.set('#form-login', { display: 'block' });
    TweenMax.to('#form-login', .3, { opacity: 1, left: '0px' });
    switch (formState) {
        case 'regist':
        {
            TweenMax.to('#form-regis', .3, { opacity: 0, left: '-100px', onComplete: function() { TweenMax.set('#form-regis', { display: 'none' }); formState = 'login'; } });
        }
        break;
        case 'restore':
        {
            TweenMax.to('#reset-pass-details', .3, { opacity: 0, onComplete: function() { 
                TweenMax.set('#reset-pass-details', { display: 'none' }); 
                TweenMax.set('#choice-action', { display: 'block' });
                TweenMax.to('#choice-action', .3, { opacity: 1 });
            } });
            TweenMax.to('#form-restore', .3, { opacity: 0, left: '-100px', onComplete: function() { TweenMax.set('#form-restore', { display: 'none' }); formState = 'login'; } });
        }
        break;
    }
}

function showRegistForm() {
    TweenMax.set('#form-regis', { display: 'block' });
    TweenMax.to('#form-regis', .3, { opacity: 1, left: '0px' });
    switch (formState) {
        case 'login':
        {
            TweenMax.to('#form-login', .3, { opacity: 0, left: '-100px', onComplete: function() { TweenMax.set('#form-login', { display: 'none' }); formState = 'regist'; } });
        }
        break;
        case 'restore':
        {
            TweenMax.to('#reset-pass-details', .3, { opacity: 0, onComplete: function() { 
                TweenMax.set('#reset-pass-details', { display: 'none' }); 
                TweenMax.set('#choice-action', { display: 'block' });
                TweenMax.to('#choice-action', .3, { opacity: 1 });
            } });
            TweenMax.to('#form-restore', .3, { opacity: 0, left: '-100px', onComplete: function() { TweenMax.set('#form-restore', { display: 'none' }); formState = 'regist'; } });
        }
        break;
    }
}

function showResetPassForm() {
    TweenMax.set('#form-restore', { display: 'block' });
    TweenMax.to('#form-restore', .3, { opacity: 1, left: '0px' });
    TweenMax.to('#choice-action', .3, { opacity: 0, onComplete: function() { 
        TweenMax.set('#choice-action', { display: 'none' }); 
        TweenMax.set('#reset-pass-details', { display: 'block' });
        TweenMax.to('#reset-pass-details', .3, { opacity: 1 });
    } });
    switch (formState) {
        case 'login':
        {
            TweenMax.to('#form-login', .3, { opacity: 0, left: '-100px', onComplete: function() { TweenMax.set('#form-login', { display: 'none' }); formState = 'restore'; } });
        }
        break;
        case 'regist':
        {
            TweenMax.to('#form-regis', .3, { opacity: 0, left: '-100px', onComplete: function() { TweenMax.set('#form-regis', { display: 'none' }); formState = 'restore'; } });
        }
        break;
    }
}

//logic for form button goes here
document.getElementById('btn-login').addEventListener('click', function() {
    TweenMax.set('#menu-obj', { display: 'block'});
    TweenMax.to('#menu-obj', 0.5, { opacity: 1 });
    TweenMax.to('#home-obj', 0.5, { opacity: 0, onComplete: function() { TweenMax.set('#home-obj', { display: 'none' }) }});
});

//default for menu page functions
document.getElementById('box-01').addEventListener('click', function() {
    TweenMax.set('#modul-obj', { display: 'block'});
    TweenMax.to('#modul-obj', 0.5, { opacity: 1, backgroundColor: '#C0312B'});
    TweenMax.to('#menu-obj', 0.5, { opacity: 0, onComplete: function() { TweenMax.set('#menu-obj', { display: 'none' }) }});
});

document.getElementById('scroll-btn').addEventListener('click', function() {
    TweenMax.to(window, 1, {scrollTo: { y: 700, autoKill: true }, ease: Power3.easeOut });
});

//default fot modul choose page functions
document.getElementById('close-box').addEventListener('click', function() {
    TweenMax.set('#menu-obj', { display: 'block'});
    TweenMax.to('#menu-obj', 0.5, { opacity: 1 });
    TweenMax.to('#modul-obj', 0.5, { opacity: 0, onComplete: function() { TweenMax.set('#modul-obj', { display: 'none' }) }});
});