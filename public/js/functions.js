/* Função Mask CPF*/

let cpfMask = document.querySelectorAll('#cpfMask');
let count = 0

cpfMask.forEach(e => {
    value = e.innerHTML
    value = value.replace(/\D/g, "")
    value = value.replace(/(\d{3})(\d)/, "$1.$2")
    value = value.replace(/(\d{3})(\d)/, "$1.$2")
    value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2")


    e.innerHTML = value
})