<?php
        $hr = date(" H ");

        if($hr >= 12 && $hr<18) {

            $resp = "Boa tarde";}

            else if ($hr >= 0 && $hr <12 ){

            $resp = "Bom dia";}

            else {

            $resp = "Boa noite";
        }
// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer

require("class.phpmailer.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];


$bodyContent = "
<table style='background-color: #FFFFFF;' width='744' border='0' align='center' cellpadding='0' cellspacing='0'>
        <tbody>
            <tr>
                <td height='20' align='center' valign='middle'>
                   
                </td>
            </tr>
            <tr>
                <td align='center' valign='top'>
                    <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                        <tbody>
                            <tr>
                                <td align='right'>
                                    <img src='img/logo_sumay_web.png' width='250' height='63' alt='Logomarca'>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height='20' align='center' valign='middle'>
                   
                </td>
            </tr>
            <tr>
                <td>
                    <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                        <tbody>
                            <tr>
                                <td height='4' align='center' valign='middle'>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height='20' align='center' valign='middle'>
                   
                </td>
            </tr>
            <tr>
                <td align='center' valign='top'>
                    <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                        <tbody>
                            <tr>
                                <td style='font-family: Trebuchet MS,Verdana,Arial; text-align: justify; color: #5D5E5E; font-size: 16px;'>
                                Olá <strong>$resp</strong>,<br><br>

                                Há uma nova mensagem que veio através do formulário de contato do site

								<p><strong>Nome:</strong> $nome</p>
								<p><strong>Email:</strong> $email</p>
								<p><strong>Telefone:</strong> $telefone</p> 
                                <p><strong>Assunto:</strong> $assunto</p> 
								<p><strong>Mensagem:</strong> $mensagem</p>

                                    <table border='0' cellpadding='0' cellspacing='0' style='width:100%;padding:20px;color:#253543;background-color:#e6e7e8'>  
                                        <tbody>    
                                            <tr>      
                                                <th style='text-align:center;font-family:Ubuntu,sans-serif;font-weight:bold;font-size:20px' colspan='2'>       
                                                    <p style='margin:5px 0 15px'>Formulário de contato</p>      
                                                </th>    
                                            </tr>    
                                        </tbody>
                                    </table>
                                    <table>
                                        <tr>
                                            
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height='20' align='center' valign='middle'>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                        <tbody>
                            <tr>
                                <td height='4' align='center' valign='middle'>
                                   
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height='20' align='center' valign='middle'>
                    
                </td>
            </tr>
	    </tbody>
	</table>";
 

// Inicia a classe PHPMailer

$mail = new PHPMailer();

 

// Define os dados do servidor e tipo de conexão

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->IsSMTP(); // Define que a mensagem será SMTP

$mail->Host = "mail.ita.locaweb.com.br"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)

$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)

$mail->Username = 'sumayatavora@gmail.com'; // Usuário do servidor SMTP (endereço de email)

$mail->Password = 'senha-do-email'; // Senha do servidor SMTP (senha do email usado)

$mail ->CharSet = "UTF-8";

 

// Define o remetente

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->From = "sumayatavora@gmail.com"; // Seu e-mail

$mail->Sender = "sumayatavora@gmail.com"; // Seu e-mail

$mail->FromName = "Sumaya Távora Web developer"; // Seu nome

$mail->ClearReplyTos();
$mail->addReplyTo($email, $name);

 

// Define os destinatário(s)

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->AddAddress('sumayatavora@gmail.com', 'Sumaya Távora Web developer');

//$mail->AddAddress('plinio.cruz@triointerativa.com.br');

//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia

//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

 

// Define os dados técnicos da Mensagem

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->IsHTML(true); // Define que o e-mail será enviado como HTML

//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

 

// Define a mensagem (Texto e Assunto)

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->Subject  = "Formulário do Site"; // Assunto da mensagem


/*
$mail->Body = 'Este é o corpo da mensagem de teste, em HTML! 

 <IMG src="http://seudomínio.com.br/imagem.jpg" alt=":)"   class="wp-smiley"> ';

$mail->AltBody = 'Este é o corpo da mensagem de teste, em Texto Plano! \r\n 

<IMG src="http://seudomínio.com.br/imagem.jpg" alt=":)"  class="wp-smiley"> ';
*/
 
$mail->Body = $bodyContent;
$mail->AltBody =$bodyContent;


// Define os anexos (opcional)

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

//$mail->AddAttachment("/home/kaique2/public_html/teste.tar", "teste.tar");  // Insere um anexo

 

// Envia o e-mail

$enviado = $mail->Send();

 

// Limpa os destinatários e os anexos

$mail->ClearAllRecipients();

$mail->ClearAttachments();

 

// // Exibe uma mensagem de resultado

// if ($enviado) {

// echo "E-mail enviado com sucesso!";

// } else {

// echo "Não foi possível enviar o e-mail.

 

// ";

// echo "Informações do erro: 

// " . $mail->ErrorInfo;

// }

if ($enviado) { ?>
    <script language="javascript" type="text/javascript">
        alert('Mensagem enviada com sucesso');
        window.location = '../index';
    </script>
<?php
}
else { ?>
    <script language="javascript" type="text/javascript">
        alert('Campos incorretos, mensagem não enviada.');
        window.location = '.../index';
    </script>
<?php
}
?>

