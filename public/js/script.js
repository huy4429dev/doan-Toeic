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

/**
 *  Listening
 */

var positionSpace = {};

function nextQuestion(level) {

    let allQuestion = document.querySelectorAll('.one-question');
    if (level === allQuestion.length) {
        allQuestion[level - 1].innerHTML = '<h2 style="margin-top:20px">Chúc mừng bạn đã vượt qua chủ đề này : <br/> Lựa chọn 1 chủ đề mới và chinh phục nó nào !</h2>';
        window.alert('Topic complete ');
        return false;
    }
    allQuestion[level - 1].style.display = 'none';
    allQuestion[level].style.display = 'block';
}

function displayAnswer() {
    let listeningAnswer = document.querySelectorAll('.listening-answer');
    listeningAnswer.forEach(answer => {
        let arrAns = answer.innerText.split(" ");
        let positionAns = 0;
        if (arrAns.length > 1) {
            positionAns = Math.floor(Math.random() * (arrAns.length - 1)) + 1;
        }
        positionSpace[answer.id] = positionAns;
        arrAns[positionAns] = '<input type="text" name="answer" class="hidden-text error-text" value="">';

        answer.innerHTML = arrAns.join(" ");
    })
    let allQuestion = document.querySelectorAll('.one-question');
    allQuestion[0].style.display = 'block';
}
displayAnswer();
console.log(positionSpace);