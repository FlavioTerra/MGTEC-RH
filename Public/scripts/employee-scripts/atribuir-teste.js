let contQuestions = 1;

function addPergunta() {
    contQuestions++;

    let elementForm = document.createElement('div');
    elementForm.id = `question_${contQuestions}`;

    let form = document.getElementById(`question_${contQuestions-1}`).innerHTML;
    elementForm.innerHTML = form;

    document.getElementById('questions').appendChild(elementForm);
    
    let buttons = document.querySelector('#btn-area-form-0');
    document.querySelector('#btn-area-form-0').remove();
    document.getElementById('questions').appendChild(buttons);

    document.querySelector(`#question_${contQuestions} .title-2`).innerHTML = `${contQuestions}. <img src="../../../../Public/images/global/edit.svg" alt="edit">`;

    document.querySelector(`#question_${contQuestions} [name=question_title_${contQuestions-1}]`).setAttribute('name', `question_title_${contQuestions}`);

    for(let i = 1; i < 5; i++) {
        document.querySelector(`#question_${contQuestions} [name=quest_${contQuestions-1}_answer_${i}]`).setAttribute('name', `quest_${contQuestions}_answer_${i}`);
        document.querySelector(`#question_${contQuestions} [name=check_quest_${contQuestions-1}_answer_${i}]`).setAttribute('name', `check_quest_${contQuestions}_answer_${i}`);
    }
}

function removePergunta() {
    if(contQuestions > 1) {
        let form = document.getElementById(`question_${contQuestions}`);
        form.remove();
        contQuestions--;
    }
}