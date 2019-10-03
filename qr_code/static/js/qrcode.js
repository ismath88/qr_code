/**
 *  A UX Component for QR Code
 *
 * @author    ismath@obelisksolutions.in
 * @copyright (c) 2012, OBELISK SOLUTIONS LLP
 * @date      12 Janauary 2012
 * @version   1.0
 *
 */

this.main_div = document.getElementById("main");

var textarea_div = document.createElement('div');
textarea_div.id ="textarea-div";
textarea_div.className ="Blsk-txt-div-ct";
textarea_div.innerHTML = "Enter Your Text Here:"+"</br>";

var text_area = document.createElement('textarea');
text_area.id ='text_area';
text_area.rows ='4';
text_area.cols ='25';
text_area.onkeyup = gettext_value;

var label = document.createElement('div');
label.id = "qrcode_label";
label.className = "Blsk-qr-code-label";
label.innerHTML = "QRCODE:"+"</br>";

var qrcode_div = document.createElement('div');
qrcode_div.id = "qrcode_image_div";
qrcode_div.className = "Blsk-qr-image-div";


textarea_div.appendChild(text_area);
this.main_div.appendChild(textarea_div);
this.main_div.appendChild(label);
this.main_div.appendChild(qrcode_div);


/**
 * Keyup Function For get the Value From textarea
 */
function gettext_value(){
    var textarea = document.getElementById("text_area");
    if(textarea.value != ''){
        var qr_div = document.getElementById("qrcode_image_div");

        if(document.getElementById("qrcode_image")){

            document.getElementById("qrcode_image").parentNode.removeChild(document.getElementById("qrcode_image"));
        }
    
        var qrcode_image = document.createElement('div');
        qrcode_image.id="qrcode_image";
        qrcode_image.className="Blsk-qr-image";
        qr_div.appendChild(qrcode_image);

    
        jQuery('#qrcode_image').qrcode({
            //render:'table',
            text: textarea.value
        });
    }
    else{
        document.getElementById("qrcode_image").innerHTML='';
    }
}

/*
 * Color Picker Function For get Color Code
 */
function colorpicker(){

    var textarea = document.getElementById("text_area");
    $('#colorpicker').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {

            if(textarea.value != '')
                var qr_div = document.getElementById("qrcode_image_div");

            if(document.getElementById("qrcode_image")){

                document.getElementById("qrcode_image").parentNode.removeChild(document.getElementById("qrcode_image"));
            }

            var qrcode_image = document.createElement('div');
            qrcode_image.id="qrcode_image";
            qrcode_image.className="Blsk-qr-image";
            qr_div.appendChild(qrcode_image);
            jQuery('#qrcode_image').qrcode({
                text: textarea.value,
                color: '#'+hex

            });
        }
    });
    
}


   
     
    
 
    


 

   
