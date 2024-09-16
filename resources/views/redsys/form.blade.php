<!DOCTYPE html>
<html>

<head>
    <title>Pago con Redsys</title>
</head>

<body>
    <h1>PASARELA DE PAGO POR REDIRECCIÓN DE REDSYS</h1>
    <h2>Realizado con LARAVEL</h2>
    <div>
        <h3>Datos a codificar</h3>
        <p>DS_MERCHANT_AMOUNT: {{ $redsys->getParameter('DS_MERCHANT_AMOUNT') }}</p>
        <p>DS_MERCHANT_ORDER: {{ $redsys->getParameter('DS_MERCHANT_ORDER') }}</p>
        <p>DS_MERCHANT_MERCHANTCODE: {{ $redsys->getParameter('DS_MERCHANT_MERCHANTCODE') }}</p>
        <p>DS_MERCHANT_CURRENCY: {{ $redsys->getParameter('DS_MERCHANT_CURRENCY') }}</p>
        <p>DS_MERCHANT_TRANSACTIONTYPE: {{ $redsys->getParameter('DS_MERCHANT_TRANSACTIONTYPE') }}</p>
        <p>DS_MERCHANT_TERMINAL: {{ $redsys->getParameter('DS_MERCHANT_TERMINAL') }}</p>
        <p>DS_MERCHANT_MERCHANTURL: {{ $redsys->getParameter('DS_MERCHANT_MERCHANTURL') }}</p>
        <p>DS_MERCHANT_URLKO: {{ $redsys->getParameter('DS_MERCHANT_URLKO') }}</p>
        <p>DS_MERCHANT_URLOK: {{ $redsys->getParameter('DS_MERCHANT_URLOK') }}</p>


        <h3>Ds_MerchantParameters a enviar</h3>
        <textarea cols="125" rows="6" readOnly>{{ $merchantParameters }} </textarea>
        <br />

        <h3>Ds_Siganture a enviar</h3>
        <textarea cols="125" rows="2" readOnly>{{ $signature }}</textarea>
        <br />
    </div>

    <div>
        <h3>FORMULARIO DE PAGO A ENVIAR</h3>
        <form name="pago" action="https://sis-t.redsys.es:25443/sis/realizarPago" method="POST">
            <label>Ds_MerchantParameters</label>
            <br />
            <input type="text" name="Ds_MerchantParameters" value={{ $merchantParameters }} />
            <br />

            <label>Ds_Signature</label>
            <br />
            <input type="text" name="Ds_Signature" value={{ $signature }} />
            <br />

            <label>Ds_SignatureVersion</label>
            <br />
            <input type="text" name="Ds_SignatureVersion" value="HMAC_SHA256_V1" />
            <br />

            <button type="submit">REALIZAR PRUEBA</button>
        </form>
</body>

</html>
