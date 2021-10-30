function writeAllUni() {
    const uniHousingMain = document.getElementById("full");
    const xml = new XMLHttpRequest();
    xml.open("GET", "../server/all-operations.php?operation=writeAllUni");
    xml.send()
    xml.onreadystatechange = () => {
        if (xml.readyState === 4 && xml.status === 200) {
            const text = xml.responseText;
            uniHousingMain.innerHTML = text;
        }
    };
}

function suggestName(inputField) {
    let value = inputField.value;
    const uniHousingMain = document.getElementById("full");
    const xml = new XMLHttpRequest();
    xml.open("GET", `../server/all-operations.php?operation=writeSuggestName&suggestName=${value}`);
    xml.send()
    xml.onreadystatechange = () => {
        if (xml.readyState === 4 && xml.status === 200) {
            const text = xml.responseText;
            console.log(text);
            uniHousingMain.innerHTML = text;
        }
    };
}

function suggestRank(inputField) {
    let value = inputField.value;
    const uniHousingMain = document.getElementById("full");
    const xml = new XMLHttpRequest();
    xml.open("GET", `../server/all-operations.php?operation=writeSuggestRank&suggestRank=${value}`);
    xml.send()
    xml.onreadystatechange = () => {
        if (xml.readyState === 4 && xml.status === 200) {
            uniHousingMain.innerHTML = xml.responseText;
        }
    };
}

function suggestResearch(inputField) {
    let value = inputField.value;
    const uniHousingMain = document.getElementById("full");
    const xml = new XMLHttpRequest();
    xml.open("GET", `../server/all-operations.php?operation=writeSuggestResearch&suggestResearch=${value}`);
    xml.send()
    xml.onreadystatechange = () => {
        if (xml.readyState === 4 && xml.status === 200) {
            uniHousingMain.innerHTML = xml.responseText;
        }
    };
}

function suggestScholarship(inputField) {
    let value = inputField.value;
    const uniHousingMain = document.getElementById("full");
    const xml = new XMLHttpRequest();
    xml.open("GET", `../server/all-operations.php?operation=writeSuggestScholarship&suggestScholarship=${value}`);
    xml.send()
    xml.onreadystatechange = () => {
        if (xml.readyState === 4 && xml.status === 200) {
            uniHousingMain.innerHTML = xml.responseText;
        }
    };
}

function openPage(data) {
    window.localStorage["universityCode"] = data.id;
    window.location.href = "../markup/uni-details.php";
}