
var submenu = ['Inicio', 'Ventas', 'Compras', 'Sat', 'Personal', 'Almacen', 'Informes', 'Administracion'];
var optionSubMenu = {
    'Inicio' : [],
    'Ventas' : ['Clientes', 'Entregas a Cuenta', 'Proyectos', 'Presupuestos', 'Avisos', 'Pedidos', 'Partes de Trabajo', 'Albaranes', 'Facturas', 'Facturas Proforma', 'Recibos-Cobros', 'Remesas'],
    'Compras' : ['Proveedores', 'Pedidos-Compra', 'Albaranes', 'Facturas-Compras', 'Recibos-Pagos'],
    'Sat' : ['Plantillas de Contratos', 'Contratos', 'Equipos'],
    'Personal' : ['Trabajadores', 'Pagos a Trabajadores', 'Pago a la S.Social', 'Pagos para IRPF', 'Adjuntos'],
    'Almacen' : ['Almacenes', 'Familias', 'Articulos', 'Movimientos entre Almacenes', 'Comprobar Stock Minimo'],
    'Informes' : ['Balances', 'Datos Modelo 347', 'Productos', 'Personal-Info', 'Gráficos', 'Historial Usuarios'],
    'Administracion' : ['Configuracion', 'Datos Empresa', 'Usuarios App', 'Descargar Datos', 'Descargar Archivos', 'Almacenamiento']
};
var rutaOptionSubMenu = {
    'Inicio' : [],
    'Ventas' : ['Clientes', 'EntregasACuenta', 'Proyectos', 'Presupuestos', 'Avisos', 'Pedidos', 'PartesDeTrabajo', 'Albaranes', 'Facturas', 'FacturasProforma', 'RecibosCobros', 'Remesas'],
    'Compras' : ['Proveedores', 'PedidosCompra', 'albaranes', 'FacturasCompras', 'RecibosPagos'],
    'Sat' : ['PlantillasDeContratos', 'Contratos', 'Equipos'],
    'Personal' : ['Trabajadores', 'PagosATrabajadores', 'PagoALaSSocial', 'PagosParaIRPF', 'Adjuntos'],
    'Almacen' : ['Almacenes', 'Familias', 'Articulos', 'MovimientosEntreAlmacenes', 'ComprobarStockMinimo'],
    'Informes' : ['Balances', 'DatosModelo347', 'Productos', 'PersonalInfo', 'Gráficos', 'HistorialUsuarios'],
    'Administracion' : ['Configuracion', 'DatosEmpresa', 'UsuariosApp', 'DescargarDatos', 'DescargarArchivos', 'Almacenamiento']
};  
var IniPar = 'Inicio';
var oldPar = '';
// pintarCabecera();
var slugRute = '/';
var InitApp = true;
function pintarCabecera(){

    document.getElementById('Header').innerHTML = `
        <ul id="Options">
        </ul>
    `;
    document.getElementById('Options').innerHTML = `
        <li class="options selected2" id="BoxOption_${submenu[0]}">
            <a href="${submenu[0]}">${submenu[0]}</a>
        </li>
    `;
    for(let x=1; x<submenu.length; x++){
        document.getElementById('Options').innerHTML += `
                    <li class="options" id="BoxOption_${submenu[x]}">
                        <a href="${submenu[x]}">${submenu[x]}</a>
                    </li>
        `;
    }

}
function incluirSubMenu(){

    document.getElementById('SubHeader').innerHTML = `
        <div class="btns-sub-header" id="BoxSubOptions_${submenu[0]}">
            <ul class="" id="SubOptions_${submenu[0]}">
            </ul>
        </div>
    `;
    // document.getElementById(`TitleUbicationMenu`).innerHTML = `
    //     <h1>
    //         Estás en: ${submenu[0]}
    //     </h1>
    // `;
    for(var x=1; x<submenu.length; x++){
        document.getElementById('SubHeader').innerHTML += `
            <div class="btns-sub-header hidden" id="BoxSubOptions_${submenu[x]}">
                <ul class="" id="SubOptions_${submenu[x]}">

        `;
        for(var y=0; y<optionSubMenu[`${submenu[x]}`].length; y++){
            document.getElementById(`SubOptions_${submenu[x]}`).innerHTML += `
            <li class="options2" id="BoxSubOptionsButton_${rutaOptionSubMenu[`${submenu[x]}`][y]}">
                <a name="${submenu[x]}" href="${rutaOptionSubMenu[`${submenu[x]}`][y]}">${optionSubMenu[`${submenu[x]}`][y]}</a>
            </li>
        `;
        }
        document.getElementById('SubHeader').innerHTML += `

                </ul>
            </div>
        `;
        
    }
    if(InitApp){
        printDocument(IniPar);
    } 
    // pintarSubMenu(IniPar);
}
// function incluirCajaBusqueda(){
//     document.getElementById('modContainer').innerHTML = `
//         <div class="search-box" id="SearchBox">
//             <li class="search-box-li">
//                 <a class="new-item" name="create" href="<?php echo $reception2 ?>">
//                     Nuevo
//                 </a>
//             </li>
//         </div>
//     `;
// }
// function printTitleUbication(sub, main){
//     // console.log(sub);
//     // console.log(main);
//     var subTitle =  optionSubMenu[`${main}`].valueOf();
//     var indexSubTitle = rutaOptionSubMenu[`${main}`].indexOf(`${sub}`);
//     // console.log(subTitle);
//     // console.log(indexSubTitle);

//     if(subTitle.length == 0){
//         document.getElementById(`TitleUbicationMenu`).innerHTML = `
//             <h1>
//                 Estás en: ${main} 
//             </h1>
//         `;
//     } else {
//         document.getElementById(`TitleUbicationMenu`).innerHTML = `
//             <h1>
//                 Estás en: ${main} > ${subTitle[indexSubTitle]}
//             </h1>
//         `;
//     }
   
// }

function printDocument(main){
    console.log(main);
    let arrayMain = [];
    arrayMain.push(main);
    if( arrayMain == 'Inicio'){
        arrayMain.pop();
        arrayMain.push(main+'.html');
        console.log(arrayMain);
        $('#Document').load(arrayMain);
        $('#modContainer').addClass('hidden');
    } else if( arrayMain == 'login'){
        arrayMain.pop();
        arrayMain.push(main+'.php');
        console.log(arrayMain);
        $('#Document').load(arrayMain);
        $('#modContainer').addClass('hidden');
    } else {
        $('#Document').load('empty.php');
    }
    
}


