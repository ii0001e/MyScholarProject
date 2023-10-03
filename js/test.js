let from;
let to;
function validateForm() {
    let amount = document.forms["var1"]["kogus"].value;

    if (amount === null || amount === undefined || isNaN(amount)) {
        alert("Sisesta kogus!");
        return false;
    }

    let myHeaders = new Headers();
    myHeaders.append("apikey", "pTmZndv9dJAIuKS07pNJDmmMd6KwYyrp");

    let requestOptions = {
        method: 'GET',
        redirect: 'follow',
        headers: myHeaders
    };

    fetch(`https://api.apilayer.com/currency_data/convert?to=${to}&from=${from}&amount=${amount}`, requestOptions)
        .then(response => response.json())
        .then(data => {
            // Обработка данных
            alert(`Result: ${amount} ${from} ------> ${data.result.toFixed(2)} ${to}`);
        })
        .catch(error => console.log('error', error));
}

function checkboxValik(event) {
    const selectedOption = event.target;
    const selectedValue = selectedOption.value;
    const checkboxes = document.getElementsByName("valuuta1");
    let checkedCount = 0;
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkedCount++;
        }
    }
    if (checkedCount > 1) {
        event.target.checked = false;
        alert("Vali ainult üks valuuta!");
    }

    if (selectedValue === "dollar") {
        to = 'USD';
    } else if (selectedValue === "kroon") {
        to = 'SEK';
    } else if (selectedValue === "rub") {
        to = 'RUB';
    } else if (selectedValue === "frank") {
        to = 'CHF';
    }
}


function selectOptionChange(event) {
    const selectedOption = event.target;
    const selectedValue = selectedOption.value;

    if (selectedValue === "dollar") {
        console.log("Выбран доллар");
        from = 'USD'
    } else if (selectedValue === "kroon") {
        console.log("Выбран SEK");
        from = 'SEK'
    } else if (selectedValue === "rub") {
        console.log("Выбран рубль");
        from = 'RUB'
    } else if (selectedValue === "frank") {
        console.log("Выбран франк");
        from = 'CHF'
    }
}

function radioChange(event){
    const selectedOption = event.target;
    const selectedValue = selectedOption.value;

    const selectElement = document.getElementById("valik");
    const options = selectElement.getElementsByTagName("option");
    for (let i = 0; i < options.length; i++) {
        if (options[i] !== selectedOption) {
            options[i].disabled = true;
        }
    }

    if (selectedValue === "dollar") {
        from = 'USD';
    } else if (selectedValue === "kroon") {
        from = 'SEK';
    } else if (selectedValue === "rub") {
        from = 'RUB';
    } else if (selectedValue === "frank") {
        from = 'CHF';
    }
}