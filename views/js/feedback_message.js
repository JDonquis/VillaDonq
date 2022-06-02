const body = document.querySelector("body")
function feedbackMessage (msg) {
    const parentAlert = document.createElement('div')
    parentAlert.classList.add('feedback_message', 'active')
    const p =document.createElement('p')
    p.textContent = msg
    parentAlert.append(p)
    body.append(parentAlert)
    return parentAlert
}

if (body.classList.contains('error')) {

    feedbackMessage('datos invalidos').classList.add('fail_feedback')
}