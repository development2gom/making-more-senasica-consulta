<?php

use app\models\Calendario;

?>
<body>

    <table cellpadding="0" cellspacing="0" style="background-color: white;  width: 100%;">
        <tbody>
        
            <tr>

                <td>
                    
                    <table cellpadding="0" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%;">
                        <tr>
                            <td colspan="3" style="border: none; padding: 8px 8px 2px;"></td>
                            <td style="border: none; padding: 8px 8px 2px 0;">
                                <strong style="font-size: 12px;">FOLIO: </strong>
                                <span style="font-size: 13px; text-transform: uppercase;"> <?=$acta->txt_folio?></span>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="4" style="border: 1px solid black; border-top: none; padding: 4px 8px 8px;">
                                <h4 style="font-size: 14px; font-weight: bold; margin-top: 0; padding: 8px 0;">ACTA CIRCUNSTANCIADA</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; padding: 2px 8px;">
                                <strong style="display: block;">OISA en: </strong>
                                <br>
                                <span style="display: block;"> <?=$acta->txt_oficina?></span>
                            </td>
                            <td style="border: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; padding: 2px 8px;">
                                <strong style="display: block;">Fecha: </strong>
                                <br>
                                <span style="display: block;"> <?=Calendario::getDateComplete($acta->txt_fecha)?></span>
                            </td>
                            <td style="border: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; padding: 2px 8px;">
                                <strong style="display: block;">Hora: </strong>
                                <br>
                                <span style="display: block;"> <?=Calendario::getHoursMinutes($acta->txt_fecha)?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; padding: 2px 8px;">
                                <strong style="display: block;">Nombre del representante o particular: </strong>
                                <br>
                                <span style="display: block;"><?=$acta->txt_nombre." ".$acta->txt_apellido_paterno." ".$acta->txt_apellido_materno?></span>
                            </td>
                            <td style="border: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; padding: 2px 8px;">
                                <strong style="display: block;">Identificación: </strong>
                                <br>
                                <span style="display: block;"> <?=$acta->txt_tipo_identificacion?>: <?=$acta->txt_numero_identificacion?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; padding: 2px 8px;">
                                <strong style="display: block;">Información complementaría: (Domicilio, CP.) </strong>
                                <br>
                                <span style="display: block;"> <?=$acta->txt_calle?> <?=$acta->txt_numero?> <?=$acta->txt_municipio?> <?=$acta->txt_estado?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; padding: 2px 8px;">
                                <strong style="display: block;">Nombre del oficial: </strong>
                                <br>
                                <span style="display: block;"> <?=$acta->txt_nombre_completo_oficial?></span>
                            </td>
                            <td style="border: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; padding: 2px 8px;">
                                <strong style="display: block;">No. de credencial: </strong>
                                <br>
                                <span style="display: block;"> <?=$acta->txt_numero_credencial?></span>
                            </td>
                        </tr>
                    </table>

                </td>

            </tr>

            <tr>

                <td>

                    <table cellpadding="0" cellspacing="0" style="width: 100%;">

                        <tr>
                            <td colspan="2" style="border-bottom: none; border-top: none; border-left: 1px solid black; border-right: 1px solid black; padding: 16px 12px 4px;">
                                <h4 style="font-size: 14px; font-weight: bold; margin: 0;">ACTA</h4>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="border-bottom: none; border-top-color: transparent; border-left: 1px solid black; border-right: 1px solid black; padding: 4px 6px 24px;">

                                <table cellpadding="0" cellspacing="0" style="border: 1px solid black; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;">Folio:</th>
                                            <th style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;">País de origen:</th>
                                            <th style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;">País de procedencia:</th>
                                            <th style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;">Mercancía:</th>
                                            <th style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;">Cantidad:</th>
                                            <th style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;">Unidad de medida:</th>
                                            <th style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;">Detectado por:</th>
                                            <th style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;">Dictaminado por:</th>
                                            <th style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;">Clave TEA:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;"><?=$acta->txt_folio?></td>
                                            <td style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;"><?=$acta->txt_pais_origen?></td>
                                            <td style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;"><?=$acta->txt_pais_procedencia?></td>
                                            <td style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;"><?=$acta->txt_tipo_mercancia?></td>
                                            <td style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;"><?=$acta->txt_cantidad?></td>
                                            <td style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;"><?=$acta->txt_unidad_medida?></td>
                                            <td style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;"><?=$acta->txt_detectado_por?></td>
                                            <td style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;"><?=$acta->txt_dictamen?></td>
                                            <td style="border: 1px solid black; font-size: 10px; padding: 12px 8px; text-align: center;"><?=$acta->txt_clave_verificador_tea?></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="border-bottom: none; border-top-color: transparent; border-left: 1px solid black; border-right: 1px solid black; padding: 4px 12px 24px;">
                                <strong>Para su: </strong>
                                <span><?=$acta->txt_dictamen?></span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="border-bottom: none; border-top-color: transparent; border-left: 1px solid black; border-right: none; padding: 12px 2px 12px 12px; width: 180px;">
                                <strong>En uso de la palabra del C: </strong>
                            </td>
                            <td style="border-bottom: 2px solid black; border-top-color: transparent; border-left: none; border-right: 1px solid black;">
                                <span></span>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="border-bottom: none; border-top-color: transparent; border-left: 1px solid black; border-right: 1px solid black; padding: 12px 2px 12px 12px;"></td>
                        </tr>

                    </table>         

                </td>

            </tr>

            <tr>

                <td>

                    <table cellpadding="0" cellspacing="0" style="border: 1px solid black; border-top-color: black; border-bottom-color: black; width: 100%;">
                        <tr>
                            <td style="border-bottom: 1px solid black; padding: 4px 8px;">
                                <strong>MOTIVO: </strong>
                                <span><?=$acta->txt_motivo?></span>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-bottom: 1px solid black; padding: 12px 8px;">
                                <p style="font-size: 7px; letter-spacing: 1px; margin: 0;">
                                    <strong>Fundamento legal: </strong>
                                    Con fundamento en los artículos 1, 6 y 7 fracciones XIII, XVIII, XIX, XXI, XXVIII y XLI, 15, 19 Fracciones I, incisos e) l) y IV, 23, 24, 26, 27 A, 29, 30 
                                    <strong>fracción I</strong>, 46, 54 fracción III y 55 de la Ley Federal de Sanidad Vegetal; 1, 5, 6 fracciones I, II, III, IV, XI, XII, XIV, XX, XXII, LVII, LXIII y LXXI, 16 fracciones II, IV, VI, VII, VIII y XXI, 18, 24, 25, 26, 27, 32, 33, 35 fracciones I y IV, 36, 38, 39, 45 
                                    <strong>fracción I</strong>, 46, <strong>50,</strong> 78, 126 fracción III, 127 fracciones I, V y VII, 128, 129, 130, 133, 136 fracción I y 138 fracción I de la Ley Federal de Sanidad Animal;1, 2 fracciones X, XIII y XIV, 7, 8 fracciones XXII, XXXVIII, XXXIX y XL, 10 fracciones I y II, 21, 95, 96, 103, 104, 105 fracción I, 107, 109, 111, 113, 114 y 124 de la Ley General de Pesca y Acuacultura Sustentables; Norma Oficial Mexicana No. <span style="letter-spacing: 0;">____________</span>; 1, 2, 3, 8 y 9 de la Ley Federal de Procedimiento Administrativo; 1, 54, 55, 58, 59, 60, 64, 65, 78 
                                    <strong>fracción II, 79, 80,</strong> 131, 163 y 172 del Reglamento de la Ley Federal de Sanidad Vegetal; 1, 4, 35, 36, 37, 38, 41, 44, 47, <strong>48,</strong> 49, 50, 52, 59, 60, 61, 62, 67, 70, 72 y 135 del Reglamento de la Ley Federal de Sanidad Animal; 1, 2 inciso D, 16, 17 fracciones I, III, IV y XVIII, 44 y 46 del Reglamento Interior de la Secretaría de Agricultura, Ganadería, Desarrollo Rural, Pesca y Alimentación publicado en el DOF el día 25 de abril de 2012; 4, 14 fracciones XVIII, XXIII y XXIV y 17 del Reglamento Interior del Servicio Nacional de Sanidad, Inocuidad y Calidad Agroalimentaria y; en el ACUERDO que establece la clasificación y codificación de mercancías cuya importación está sujeta a regulación por parte de la Secretaría de Agricultura, Ganadería, Desarrollo Rural, Pesca y Alimentación, a través del Servicio Nacional de Sanidad, Inocuidad y Calidad Agroalimentaria, publicado en el DOF el día 3 de septiembre de 2012.
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-bottom: 1px solid black; padding: 4px 8px;">
                                <strong>DESCRIPCIÓN DE HECHOS: </strong>
                                <span><?=$acta->txt_descripcion_hechos?></span>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 4px 8px;">
                                <strong>OBSERVACIONES: </strong>
                                <span><?=$acta->txt_observaciones?></span>
                            </td>
                        </tr>

                    </table>

                </td>

            </tr>

            <tr>

                <td>

                    <table cellpadding="0" cellspacing="0" style="border: none; width: 100%;">
                        <tr>
                            <td colspan="5" style="padding: 4px 8px; 80px 8px;">
                                <strong>Para constancia de los hechos se levanta la presente que firman de conformidad las personas que en esta intervienen</strong>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="5">
                                <p style="background-color: teal; width: 100%"><br></p>
                                <p style="background-color: teal; width: 100%"><br></p>
                                <p style="background-color: teal; width: 100%"><br></p>
                                <p style="background-color: teal; width: 100%"><br></p>
                                <p style="background-color: teal; width: 100%"><br></p>
                                <p style="background-color: teal; width: 100%"><br></p>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 4px 8px;" width="5%"></td>
                             <?php
                            foreach($acta->entFirmasImagenes as $firma){
                                if($acta->txt_nombre_testigo_1 == $firma->txt_firmado_por){?>
                                <td style="padding: 4px 8px; text-align: center;" width="35%">
                                    <span style="display: block; font-weight: 400; text-transform: uppecarse;"><?=$acta->txt_nombre_testigo_1?></span>
                                    <br>
                                    <span style="display: block;"><img width="50px" style="display: block;" src="https://dev.2geeksonemonkey.com/senasica/api/web/<?=$firma->txt_url?>"/>
                                    </span>
                                    <p style="font-weight: 300; text-transform: uppecarse;">TESTIGO </p>
                                </td>
                                <td style="padding: 4px 8px;" width="20%"></td>
                            <?php
                                }
                                if($acta->txt_nombre_testigo_2 == $firma->txt_firmado_por){?>
                                    <td style="padding: 4px 8px; text-align: center;" width="35%">
                                        <span style="display: block; font-weight: 400; text-transform: uppecarse;"><?=$acta->txt_nombre_testigo_2?></span>
                                        <br>
                                        <span style="display: block;"><img width="50px" style="display: block;"  src="https://dev.2geeksonemonkey.com/senasica/api/web/<?=$firma->txt_url?>"/>
                                        </span>
                                        <p style="font-weight: 300; text-transform: uppecarse;">TESTIGO </p>
                                    </td>
                                    
                                <?php
                                    }
                            }
                            ?>
                            <td style="padding: 4px 8px;" width="5%"></td>
                        </tr>

                    </table>

                </td>

            </tr>


        </tbody>
    </table>
    <table cellpadding="0" cellspacing="0" style="border: none; width: 100%;">
        <tr style="width:100%; display:inline-block;">
            <?php
            foreach($acta->entImagenes as $imagen){
            ?>
            <td align="center">
                <div style="display: block; text-align: center; width: 100%;">
                    <span style="display: inline-block; vertical-align: middle; width: 48%;">
                        <img style="display: block; margin: 0 auto; max-width: 80%; width: 300px;" src="https://dev.2geeksonemonkey.com/senasica/api/web/<?=$imagen->txt_url?>" alt="">
                    </span>
                </div>
            </td>
           
            <?php
            }
            ?>
        </tr>
    </table>
    
</body>
