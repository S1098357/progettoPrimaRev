
main()
function main() {
    window.onload = function () {
        var testo = "<?php Print($ricercaA); ?>";
        document.getElementById('nome').innerHTML = testo.toString();
    };
};
