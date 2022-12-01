document.querySelector('#phone').addEventListener('keydown', (e) => {
    let key = e.key;
    let telefone = e.target.value.replace(/\D+/g, "");

    if (/^[0-9]$/i.test(key)) {
        e.preventDefault();
        phone = telefone + key;
        let size = phone.length;

        if (size >= 12) {
            return false;
        }

        if (size > 10) {
            phone = phone.replace(/^(\d\d)(\d)(\d{4})(\d{4}).*/, "($1) $2 $3-$4");
        } else if (size > 5) {
            phone = phone.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
        } else if (size > 2) {
            phone = phone.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
        } else {
            console.log(phone);
            phone = phone.replace(/^(\d*)/, "($1");
            console.log(phone);
        }

        document.querySelector('#phone').value = phone;
    }

    if (!["Backspace", "Delete", "Tab"].includes(key)) {
        e.preventDefault();
        return false;
    }
});

document.querySelector('#cpf').addEventListener('keydown', (e) => {
    let key = e.key;
    let cpf = e.target.value.replace(/\D+/g, "");

    if (/^[0-9]$/i.test(key)) {
        e.preventDefault();
        cpf = cpf + key;
        let size = cpf.length;

        if (size >= 12) {
            return false;
        } if (size == 11) {
            cpf = cpf.replace(/^(\d{3})(\d{3})(\d{3})(\d{2}).*/, "$1.$2.$3-$4");
        } else if (size > 9) {
            cpf = cpf.replace(/^(\d{3})(\d{3})(\d{3})(\d{1}).*/, "$1.$2.$3-$4");
        } else if (size > 6) {
            cpf = cpf.replace(/^(\d{3})(\d{3})(\d{0,3}).*/, "$1.$2.$3");
        } else if (size > 3) {
            cpf = cpf.replace(/^(\d{3})(\d{0,3}).*/, "$1.$2");
        } else {
            cpf = cpf.replace(/^(\d*)/, "$1");
        }

        document.querySelector('#cpf').value = cpf;
    }

    if (!["Backspace", "Delete", "Tab"].includes(key)) {
        e.preventDefault();
        return false;
    }
});