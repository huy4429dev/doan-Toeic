/**
 * Play sound grammar
 */
let audio = new Audio();

function playSound(src) {
    audio.src = src;
    audio.play();
}
/**
 *  Pick Topic Status
 */

let status = document.querySelectorAll('div.main-head ul li');

let contentTopic = document.querySelectorAll('.bgr-white > div');

function pickStatus(event) {
    for (let i = 0; i < status.length; i++) {
        status[i].classList.remove('active-status');
    }
    for (let i = 1; i < contentTopic.length; i++) {
        contentTopic[i].style.display = 'none';
    }
    event.target.classList.add('active-status');
    let idTarget = event.target.dataset.target;
    document.querySelector(`#${idTarget}`).style.display = 'block';
}