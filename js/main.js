//testing
document.getElementById('login-action').style.cursor = 'pointer';
document.getElementById('regis-action').style.cursor = 'pointer';
document.getElementById('login-action').addEventListener('click', showLoginForm);
document.getElementById('regis-action').addEventListener('click', showRegistForm);

function showLoginForm() {
    TweenMax.set('#form-login', { display: 'block' });
    TweenMax.to('#form-login', .3, { opacity: 1, left: '0px' });
    TweenMax.to('#form-regis', .3, { opacity: 0, left: '-100px', onComplete: function() { TweenMax.set('#form-regis', { display: 'none' }); } });
}

function showRegistForm() {
    TweenMax.set('#form-regis', { display: 'block' });
    TweenMax.to('#form-regis', .3, { opacity: 1, left: '0px' });
    TweenMax.to('#form-login', .3, { opacity: 0, left: '-100px', onComplete: function() { TweenMax.set('#form-login', { display: 'none' }); } });
}