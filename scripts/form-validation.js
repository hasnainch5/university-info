let maintainRecord = [];

function validateForm(eventData) {
    let patterns = {
        firstName: /[a-z]{5,10}/i,
        lastName: /[a-z]{5,10}/i,
        email: /^([a-z0-9.-]+)@([a-z0-9-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
        username: /^[a-z0-9]{5,12}$/i,
        password: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/
    }
    let name = patterns[eventData.name];
    if (!name.test(eventData.value)) {
        eventData.nextElementSibling.className = 'basic-styles-invalid active-invalid-element';
        const index = maintainRecord.indexOf(name);
        index > -1 ? maintainRecord.splice(index, 1) : undefined;
        return;
    }
    eventData.nextElementSibling.className = 'basic-styles-invalid';
    maintainRecord.indexOf(name) < 0 ? maintainRecord.push(name) : undefined;
}

function validate(val) {
    if (val === 'sign-up') {
        if (maintainRecord.indexOf("email") && maintainRecord.indexOf("password") && maintainRecord.indexOf("passwordO")) {
            document.getElementById("getForm").onsubmit = function () {
                if (val === "sign-up") {
                    let pass = document.getElementById('password');
                    let confirmPass = document.getElementById('confirmPassword');
                    let div = document.getElementById("div");
                    const form = document.getElementById("getForm");
                    console.log(pass);
                    console.log(confirmPass);
                    if (pass.value === confirmPass.value) {
                        div.innerText = "Passwords Match";
                        div.className = 'valid active-invalid-element';
                        form.onsubmit = () => {
                            return true;
                        }
                    } else {
                        div.innerText = 'Both Passwords Must Match';
                        div.className = 'basic-styles-invalid active-invalid-element'
                        return false;
                    }
                }
                return true;
            };
        }
    } else {
        let email = document.getElementById("email");
        let password = document.getElementById("password");

        email = email.value;
        password = password.value;

        const ajaxCall = new XMLHttpRequest();
        ajaxCall.open("GET", `../server/all-operations.php?operation=loginUser&email=${email}&password=${password}`);
        ajaxCall.send();
        ajaxCall.onreadystatechange = () => {
            if (ajaxCall.readyState === 4 && ajaxCall.status === 200) {
                const res = ajaxCall.responseText;
                console.log(res);
                if (res === 'true') {
                    window.location.href = '../markup/index.php';
                } else {
                    alert("Username and password combination does not match any records");
                }
            }
        };
    }
}
