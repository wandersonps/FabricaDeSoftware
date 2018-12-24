
$(function () {

    $("#adicao").maskMoney(
            {symbol: 'R$',
                showSymbol: true,
                thousands: '',
                decimal: ',',
                symbolStay: true}
    );
   
    $("#valorOs").maskMoney(
            {symbol: 'R$',
                showSymbol: true,
                thousands: '',
                decimal: ',',
                symbolStay: true}
    );

    $(".graus").maskMoney(
            {symbol: 'R$', // Simbolo 
                thousands: '.',
                decimal: '.', // Separador do decimal
                precision: 2,
                allowZero: false, // Permite que o digito 0 seja o primeiro caractere 
                showSymbol: false // Exibe/Oculta o símbolo
            });
});
