function writeUniDetails() {
    const id = window.localStorage["universityCode"];
    const xml = new XMLHttpRequest();
    xml.open("GET", `../server/all-operations.php?operation=writeUniDetails&uniId=${id}`);
    xml.send();
    xml.onreadystatechange = () => {
        if (xml.readyState === 4 && xml.status === 200) {
            const text = xml.responseText;
            const mainDetailsContainer = document.getElementById("mainDetailsContainer");
            mainDetailsContainer.innerHTML = text;
        }
    };
}

function unsetVariables() {
    window.localStorage.removeItem("universityCode");
}
function getFeedbackFromDb() {
    const id = window.localStorage["universityCode"];
    const container = document.getElementById("feedbackContainer");
    const xml = new XMLHttpRequest();
    xml.open("GET", `../server/all-operations.php?operation=getAllFeedback&universityCode=${id}`);
    xml.send();
    xml.onreadystatechange = () => {
        if (xml.readyState === 4 && xml.status === 200) {
            let responseText = xml.responseText;
            console.log(responseText);
            container.innerHTML = responseText;
        }
    };
}

function sendFeedbackToDb() {
    let area = document.getElementById("textarea");
    area = area.value;
    if (area.length === 0) {
        alert("Feedback must not be empty");
        return;
    }
    let universityCode = window.localStorage["universityCode"];
    const xml = new XMLHttpRequest();
    xml.open("GET", `../server/all-operations.php?operation=addFeedback&feedback=${area}&universityCode=${universityCode}`);
    xml.send();
    xml.onreadystatechange = () => {
        if (xml.readyState === 4 && xml.status === 200) {
            const responseText = xml.responseText;
            console.log(responseText);
            if (responseText !== '1') {
                alert('Feedback not added');
            }
        }
    };
}