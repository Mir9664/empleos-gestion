var ncontrol  = /^[0-9]{8}$/;
var clave     = /^[a-zA-Z]{1}[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}$/;
var clav2     = /^[a-zA-Z]{1}[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}$/;
var importe   = /^[0-9]+(\.[0-9]{2}){0,1}$/;
var program1  = /^[0-9]{5}[0-9]*[A-Z]{1}[0-9]{7}$/;
var actividad = /^[0-9]{2}\.[0-9]{1}\.[0-9]{4}$/;
var partidas  = /^[0-9]+$/;
var rfc       = /^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/;
var claveInst = /^[0-9]{3}$/;
var cuentaCont= /^[0-9]{4}-[0-9]{3}-[0-9]{3}-[0-9]{3}$/;
var email     = /^[0-9]{4}-[0-9]{3}-[0-9]{3}-[0-9]{3}$/;
var folio     = /^[0-9]+$/;
var cuentaB   = /^[0-9]+$/;
var var4   = /^[0-9]{3}$/;
$(document).ready(function()
{
    //VALIDACION CAMPO CUENTAS-CONTABLE
    $("#bRegCuC").click(function()
    {
        if($("#var1").val().trim()==="")
        {
            $("#mensaje0").show();$("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").hide();
            frmCuentaContable.var1.focus();
            return false;
        }
        if($("#var2").val().trim()==="")
        {
            $("#mensaje0").hide();$("#mensaje1").show();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").hide();
            frmCuentaContable.var2.focus();
            return false;
        }
        if($("#var3").val().trim()==="")
        {
            $("#mensaje0").hide();$("#mensaje1").hide();$("#mensaje2").show();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").hide();
            frmCuentaContable.var3.focus();
            return false;
        }
        if($("#var4").val()=="" || !var4.test($("#var4").val()))
        {
            $("#mensaje0").hide();$("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").show();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").hide();
            frmCuentaContable.var4.focus();
            return false;
        }
        if($("#descripcion").val()=="")
        {
            $("#mensaje0").hide();$("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").show();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").hide()
            frmCuentaContable.descripcion.focus();
            return false;
        }
        if($("#tipo_cuenta").val().trim()==="")
        {
            $("#mensaje0").hide();$("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").show();$("#mensaje6").hide();$("#mensaje7").hide();
            frmCuentaContable.tipo_cuenta.focus();
            return false;
        }
        if($("#naturaleza").val().trim()==="")
        {
            $("#mensaje0").hide();$("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").show();$("#mensaje7").hide();
            frmCuentaContable.naturaleza.focus();
            return false;
        }
        if($("#det_acu").val().trim()==="")
        {
            $("#mensaje0").hide();$("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").show();
            frmCuentaContable.det_acu.focus();
            return false;
        }
        else
        {
            $("#mensaje0").hide();$("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").hide();
        }
    });
    //VALIDACION CAMPO PROGRAMAS
    $("#bRegProg").click(function()
    {
        if($("#programa").val()=="" || !program1.test($("#programa").val()))
        {//fadeIn();fadeOut();
            $("#mensaje1").show();$("#mensaje2").hide();
            frmPrograma.programa.focus();
            return false;
        }
        else if($("#descripcion").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje2").show();
            frmPrograma.descripcion.focus();
            return false;
        }
        else
        {
            $("#mensaje1").hide();$("#mensaje2").hide();
        }
    });
    //VALIDACION CAMPO ACTIVIDADES
    $("#bRegActi").click(function()
    {
        if($("#actividadR").val()=="" || !actividad.test($("#actividadR").val()))
        {
            $("#mensaje1").show();$("#mensaje2").hide();
            frmActividad.actividadR.focus();
            return false;
        }
        else if($("#descripcion").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje2").show();
            frmActividad.descripcion.focus();
            return false;
        }
        else
        {
            $("#mensaje1").hide();$("#mensaje2").hide();
        }
    });
    //VALIDACION CAMPO PARTIDAS
    $("#bRegPart").click(function()
    {
        if($("#partidasR").val()=="" || !partidas.test($("#partidasR").val()))
        {
            $("#mensaje1").show();$("#mensaje2").hide();
            frmPartida.partidasR.focus();
            return false;
        }
        else if($("#descripcion").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje2").show();
            frmPartida.descripcion.focus();
            return false;
        }
        else
        {
            $("#mensaje1").hide();$("#mensaje2").hide();
        }
    });
    //VALIDACION CAMPO DEPARTAMENTOS
    $("#bRegDept").click(function()
    {
        if($("#descripcion").val()=="")
        {
            $("#mensaje1").show();
            frmDepto.descripcion.focus();
            return false;
        }
        else
        {
            $("#mensaje1").hide();
        }
    });
    //VALIDACION CAMPO BANCOS
    $("#bRegBanc").click(function()
    {
        if($("#descripcion").val()=="")
        {
            $("#mensaje1").show();
            frmBanco.descripcion.focus();
            return false;
        }
        else
        {
            $("#mensaje1").hide();
        }
    });
    //VALIDACION CAMPO CUENTAS-BANCOS
    $("#bRegCuB").click(function()
    {
        if($("#claveB").val().trim()==="")
        {
            $("#mensaje1").show();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").hide();
            frmCuenBan.claveB.focus();
            return false;
        }
        else if($("#folio").val()=="" || !folio.test($("#folio").val()))
        {
            $("#mensaje1").hide();$("#mensaje2").show();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").hide();
            frmCuenBan.folio.focus();
            return false;   
        }
        else if($("#cuenta").val()=="" || !cuentaB.test($("#cuenta").val()))
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").show();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").hide();
            frmCuenBan.cuenta.focus();
            return false;   
        }
        else if($("#fuente").val().trim()==="")
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").show();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").hide();
            frmCuenBan.fuente.focus();
            return false;
        }
        else if($("#cuenta_contable").val().trim()==="")
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").show();$("#mensaje6").hide();$("#mensaje7").hide();
            frmCuenBan.cuenta_contable.focus();
            return false;
        }
        else if($("#mensaje").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").show();$("#mensaje7").hide();
            frmCuenBan.mensaje.focus();
            return false;   
        }
        else if($("#saldo").val()=="" || !importe.test($("#saldo").val()))
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").show();
            frmCuenBan.saldo.focus();
            return false;   
        }
        else
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();$("#mensaje7").hide();
        }
    });
    //VALIDACION CAMPO ALUMNOS
    $("#bRegAlum").click(function()
    {
        if($("#n_control").val()=="" || !ncontrol.test($("#n_control").val()))
        {
            $("#mensaje1").show();$("#mensaje2").hide();
            frmAlumno.n_control.focus();
            return false;
        }
        else if($("#nombre").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje2").show();
            frmAlumno.nombre.focus();
            return false;
        }
        else
        {
            $("#mensaje1").hide();$("#mensaje2").hide();
        }
    });
    //VALIDACION CAMPO CONCEPTOS
    $("#bRegConc").click(function()
    {
        if($("#clave").val()=="" || !clav2.test($("#clave").val()))
        {
            $("#mensaje1").show();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();
            frmConcepto.clave.focus();
            return false;
        }
        else if($("#concepto").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje2").show();$("#mensaje3").hide();$("#mensaje4").hide();
            frmConcepto.concepto.focus();
            return false;
        }
        /*else if($("#importe").val()=="" || !importe.test($("#importe").val()))
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").show();$("#mensaje4").hide();
            frmConcepto.importe.focus();
            return false;
        }*/
        else if($("#cuenta_c").val().trim()==="")
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").show();
            frmConcepto.cuenta_c.focus();
            return false;
        }
        else
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje15").hide();
        }
    });
    $("#bRegSubConc").click(function()
    {
        if($("#cuenta_c2").val().trim()==="")
        {
            $("#mensaje11").show();$("#mensaje12").hide();$("#mensaje13").hide();$("#mensaje14").hide();$("#mensaje15").hide();
            frmSubConcepto.cuenta_c2.focus();
            return false;
        }
        else if($("#clave2").val()=="" || !clav2.test($("#clave2").val()))
        {
            $("#mensaje11").hide();$("#mensaje12").show();$("#mensaje13").hide();$("#mensaje14").hide();$("#mensaje15").hide();
            frmSubConcepto.clave2.focus();
            return false;
        }
        else if($("#concepto2").val()=="")
        {
            $("#mensaje11").hide();$("#mensaje12").hide();$("#mensaje13").show();$("#mensaje14").hide();$("#mensaje15").hide();
            frmSubConcepto.concepto2.focus();
            return false;
        }
        else if($("#importe").val()=="" || !importe.test($("#importe").val()))
        {
            $("#mensaje11").hide();$("#mensaje12").hide();$("#mensaje13").hide();$("#mensaje14").show();$("#mensaje15").hide();
            frmSubConcepto.importe.focus();
            return false;
        }
        else if($("#sub_fk").val().trim()==="")
        {
            $("#mensaje11").hide();$("#mensaje12").hide();$("#mensaje13").hide();$("#mensaje14").hide();$("#mensaje15").show();
            frmSubConcepto.sub_fk.focus();
            return false;
        }
        else
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje15").hide();
        }
    });
    //VALIDACION CAMPO SISTEMA
    $("#bRegSist").click(function()
    {
        if($("#dependencia").val()=="")
        {
            $("#mensaje1").show();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").hide();
            frmSistema.dependencia.focus();
            return false;
        }
        else if($("#departamento").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje1-").show();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").hide();
            frmSistema.domicilio.focus();
            return false;
        }
        else if($("#domicilio").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").show();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").hide();
            frmSistema.domicilio.focus();
            return false;
        }
        else if($("#clave").val()=="" || !claveInst.test($("#clave").val()))
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").show();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").hide();
            frmSistema.clave.focus();
            return false;
        }
        else if($("#ciudad").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").show();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").hide();
            frmSistema.ciudad.focus();
            return false;
        }
        else if($("#rfc_d").val()=="" || !rfc.test($("#rfc_d").val()))
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").show();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").hide();
            frmSistema.rfc_d.focus();
            return false;
        }
        else if($("#director").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").show();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").hide();
            frmSistema.director.focus();
            return false;
        }
        else if($("#rfc_c").val()=="" || !rfc.test($("#rfc_c").val()))
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").show();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").hide();
            frmSistema.rfc_c.focus();
            return false;
        }
        else if($("#contralor").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").show();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").hide();
            frmSistema.contralor.focus();
            return false;
        }
        else if($("#rfc_ca").val()=="" || !rfc.test($("#rfc_ca").val()))
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").show();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").hide();
            frmSistema.rfc_ca.focus();
            return false;
        }
        else if($("#cajero").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").show();$("#mensaje11").hide();$("#mensaje12").hide();
            frmSistema.cajero.focus();
            return false;
        }
        else if($("#rfc_dg").val()=="" || !rfc.test($("#rfc_dg").val()))
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").show();$("#mensaje12").hide();
            frmSistema.rfc_dg.focus();
            return false;
        }
        else if($("#directorg").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").show();
            frmSistema.directorg.focus();
            return false;
        }
        else
        {
            $("#mensaje1").hide();$("#mensaje1-").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();$("#mensaje5").hide();$("#mensaje6").hide();
            $("#mensaje7").hide();$("#mensaje8").hide();$("#mensaje9").hide();$("#mensaje10").hide();$("#mensaje11").hide();$("#mensaje12").hide();
        }
    });
    //VALIDACION CAMPO ACTIVIDADES
    $("#act_act_mod").click(function()
    {
        if($("#clavePa").val()=="" || !actividad.test($("#clavePa").val()))
        {
            $("#mensaje3").show();$("#mensaje4").hide();
            frmActMod.clavePa.focus();
            return false;
        }
        else if($("#act").val()=="")
        {
            $("#mensaje3").hide();$("#mensaje4").show();
            frmActMod.act.focus();
            return false;
        }
        else
        {
            $("#mensaje3").hide();
            $("#mensaje4").hide();
        }
    });
    //VALIDACION CAMPO PROGRAMAS
    $("#act_pro_mod").click(function()
    {
        if($("#clavePro").val()=="" || !programa.test($("#clavePro").val()))
        {//fadeIn();fadeOut();
            $("#mensaje3").show();$("#mensaje4").hide();
            frmProMod.clavePro.focus();
            return false;
        }
        else if($("#pro").val()=="")
        {
            $("#mensaje3").hide();$("#mensaje4").show();
            frmProMod.pro.focus();
            return false;
        }
        else
        {
            $("#mensaje3").hide();
            $("#mensaje4").hide();
        }
    });
    //VALIDACION CAMPO PARTIDAS
    $("#act_par_mod").click(function()
    {
        if($("#claveP").val()=="" || !partidas.test($("#claveP").val()))
        {
            $("#mensaje3").show();$("#mensaje4").hide();
            frmParMod.claveP.focus();
            return false;
        }
        else if($("#parti").val()=="")
        {
            $("#mensaje3").hide();$("#mensaje4").show();
            frmParMod.parti.focus();
            return false;
        }
        else
        {
            $("#mensaje3").hide();
            $("#mensaje4").hide();
        }
    });
    //VALIDACION CAMPO DEPARTAMENTOS
    $("#act_dep_mod").click(function()
    {
        if($("#depto").val()=="")
        {
            $("#mensaje2").show();
            frmDepMod.depto.focus();
            return false;
        }
        else
        {
            $("#mensaje2").hide();
        }
    });
    //VALIDACION CAMPO BANCOS
    $("#act_ban_mod").click(function()
    {
        if($("#banc").val()=="")
        {
            $("#mensaje2").show();
            frmBanMod.banc.focus();
            return false;
        }
        else
        {
            $("#mensaje2").hide();
        }
    });
    //VALIDACION CAMPO ALUMNOS
    $("#act_alu_mod").click(function()
    {
        if($("#con_alu").val()=="" || !ncontrol.test($("#con_alu").val()))
        {
            $("#mensaje3").show();$("#mensaje4").hide();
            frmAluMod.con_alu.focus();
            return false;
        }
        else if($("#alum").val()=="")
        {
            $("#mensaje3").hide();$("#mensaje4").show();
            frmAluMod.alum.focus();
            return false;
        }
        else
        {
            $("#mensaje3").hide();
            $("#mensaje4").hide();
        }
    });
    //VALIDACION CAMPO USUARIOS
    $("#act_user_mod").click(function()
    {
        if($("#nombre").val()=="")
        {
            $("#mensaje1").show();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();
            frmUserMod.nombre.focus();
            return false;
        }
        else if($("#email").val()==""/* || !email.test($("#email").val())*/)
        {
            $("#mensaje1").hide();$("#mensaje2").show();$("#mensaje3").hide();$("#mensaje4").hide();
            frmUserMod.email.focus();
            return false;
        }
        else if($("#contras").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").show();$("#mensaje4").hide();
            frmUserMod.contras.focus();
            return false;
        }
        else if($("#contras1").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").show();
            frmUserMod.contras1.focus();
            return false;
        }
        else
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();
        }
    });
    $("#env").click(function()
    {
        if($("#nom").val()=="")
        {
            $("#mensaje1").show();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();
            frmU.nom.focus();
            return false;
        }
        else if($("#ema").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje2").show();$("#mensaje3").hide();$("#mensaje4").hide();
            frmU.ema.focus();
            return false;
        }
        else if($("#co1").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").show();$("#mensaje4").hide();
            frmU.co1.focus();
            return false;
        }
        else if($("#co2").val()=="")
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").show();
            frmU.co2.focus();
            return false;
        }
        else
        {
            $("#mensaje1").hide();$("#mensaje2").hide();$("#mensaje3").hide();$("#mensaje4").hide();
        }
    });
});