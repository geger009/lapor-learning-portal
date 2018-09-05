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

//default for menu page functions
