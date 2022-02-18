<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<style>
body{
    background-color: #e6e6e6;
    width: 100%;
    height: 100%;
}
#success_tic{
    position: fixed;
    margin: 0 auto;
    left: 35%;
    top: 20%;
    
}

#success_tic .page-body{
    width: 400px;
    height: 250px;
    background-color:#FFFFFF;
    margin:10% auto;
}
#success_tic .page-body .head{
    text-align:center;
}
/* #success_tic .tic{
    font-size:186px;
} */
#success_tic .close{
    opacity: 1;
    position: absolute;
    right: 0px;
    font-size: 30px;
    padding: 3px 15px;
    margin-bottom: 10px;
}
#success_tic .checkmark-circle {
    width: 150px;
    height: 150px;
    position: relative;
    display: inline-block;
    vertical-align: top;
}
.checkmark-circle .background {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: #1ab394;
    position: absolute;
}
#success_tic .checkmark-circle .checkmark {
    border-radius: 5px;
}
#success_tic .checkmark-circle .checkmark.draw:after {
    -webkit-animation-delay: 300ms;
    -moz-animation-delay: 300ms;
    animation-delay: 300ms;
    -webkit-animation-duration: 1s;
    -moz-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-timing-function: ease;
    -moz-animation-timing-function: ease;
    animation-timing-function: ease;
    -webkit-animation-name: checkmark;
    -moz-animation-name: checkmark;
    animation-name: checkmark;
    -webkit-transform: scaleX(-1) rotate(135deg);
    -moz-transform: scaleX(-1) rotate(135deg);
    -ms-transform: scaleX(-1) rotate(135deg);
    -o-transform: scaleX(-1) rotate(135deg);
    transform: scaleX(-1) rotate(135deg);
    -webkit-animation-fill-mode: forwards;
    -moz-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}
#success_tic .checkmark-circle .checkmark:after {
    opacity: 1;
    height: 75px;
    width: 37.5px;
    -webkit-transform-origin: left top;
    -moz-transform-origin: left top;
    -ms-transform-origin: left top;
    -o-transform-origin: left top;
    transform-origin: left top;
    border-right: 15px solid #fff;
    border-top: 15px solid #fff;
    border-radius: 2.5px !important;
    content: '';
    left: 35px;
    top: 80px;
    position: absolute;
}

@-webkit-keyframes checkmark {
    0% {
        height: 0;
        width: 0;
        opacity: 1;
    }
    20% {
        height: 0;
        width: 37.5px;
        opacity: 1;
    }
    40% {
        height: 75px;
        width: 37.5px;
        opacity: 1;
    }
    100% {
        height: 75px;
        width: 37.5px;
        opacity: 1;
    }
}
@-moz-keyframes checkmark {
    0% {
        height: 0;
        width: 0;
        opacity: 1;
    }
    20% {
        height: 0;
        width: 37.5px;
        opacity: 1;
    }
    40% {
        height: 75px;
        width: 37.5px;
        opacity: 1;
    }
    100% {
        height: 75px;
        width: 37.5px;
        opacity: 1;
    }
}
@keyframes checkmark {
    0% {
        height: 0;
        width: 0;
        opacity: 1;
    }
    20% {
        height: 0;
        width: 37.5px;
        opacity: 1;
    }
    40% {
        height: 75px;
        width: 37.5px;
        opacity: 1;
    }
    100% {
        height: 75px;
        width: 37.5px;
        opacity: 1;
    }
}
</style>
</head>
<body>
<!-- Modal -->
<div id="success_tic" class="fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<a class="close" onclick="closeModal();" >&times;</a>
<div class="page-body">
<div class="head">  
<h3 style="margin-top:5px;">Sucesso!</h3>
<h4>Operação efetuada com sucesso!</h4>
</div>

<h1 style="text-align:center;"><div class="checkmark-circle">
<div class="background"></div>
<div class="checkmark draw"></div>
</div><h1>

</div>
</div>
</div>

</div>

<script>
function closeModal(){
    $('#success_tic').hide();

    document.body.style.backgroundColor = "white";
}
</script>
</body>
</html>