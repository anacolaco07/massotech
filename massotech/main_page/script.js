document.addEventListener("DOMContentLoaded", function () {
    const button1 = document.getElementById("button1");
    const button2 = document.getElementById("button2");
    const button3 = document.getElementById("button3");
    const button4 = document.getElementById("button4");
    const button5 = document.getElementById("button5");
    const button6 = document.getElementById("button6");

    button1.addEventListener("click", function () {
        window.location.href = "../agenda/agenda.php";
    });

    button2.addEventListener("click", function () {
        window.location.href = "../prontuario/prontuario_form.php";
    });

    button3.addEventListener("click", function () {
        window.location.href = "../relatorio/formulario_relatorio.php";
    });

    button4.addEventListener("click", function () {
        window.location.href = "../paciente/paciente.php";
    });

    button5.addEventListener("click", function () {
        window.location.href = "../perfil/view_perfil.php";
    });

    button6.addEventListener("click", function () {
        window.location.href = "../login/logout.php";
    });
});
