// LÓGICA DA VALIDAÇÃO DE SENHA (FRACA, MÉDIA E FORTE)

const bars = document.querySelector("#bars");
const strengthdiv = document.querySelector("#strength");
const passwordinput = document.querySelector("#password");
const strength = {
    1: "fraca",
    2: "média",
    3: "forte"
};
const getindicator = (strengthvalue) => {
    if (strengthvalue.length == null) {
        bars.remove;
        strengthdiv.remove;
    }
    if (strengthvalue.length == 0) return false
    if (strengthvalue.length <= 3) return strength[1] ?? ""
    if (strengthvalue.length > 3 && strengthvalue.length <= 6) return strength[2] ?? ""
    if (strengthvalue.length >= 6 || strengthvalue.length > 8) return strength[3] ?? ""
}
const handlechange = () => {
    let { value: password } = passwordinput;

    const strengthtext = getindicator(password);
    bars.classList = "";
    if (strengthtext) {
        strengthdiv.innerText = `Senha ${strengthtext}`;
        bars.classList.add(strengthtext);
    } else {
        strengthdiv.innerText = "";
    }
}