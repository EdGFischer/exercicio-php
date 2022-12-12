/* Função Mask CPF*/

let cpfMask = document.querySelectorAll('.cpfMask');
console.log(cpfMask)
cpfMask.forEach(e => {

    value = (e.innerHTML == '' ? e.defaultValue : e.innerHTML )
    value = value.replace(/\D/g, "")
    value = value.replace(/(\d{3})(\d)/, "$1.$2")
    value = value.replace(/(\d{3})(\d)/, "$1.$2")
    value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2")

    e.innerHTML = value
    e.defaultValue = value
})