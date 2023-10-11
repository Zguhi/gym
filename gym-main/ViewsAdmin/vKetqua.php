<style type="text/css">
    .modal {
        display: block; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
    }

    /*CSS cho nội dung của hộp thoại chình là thẻ <div class="modal-content"> */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 5px;
        border: 1px solid #090;
        width: 30%; /* Could be more or less, depending on screen size */
        font-family:Arial, Helvetica, sans-serif;
    }
    .modal-content p:nth-child(1) {
        margin: 0px; height:25px;  background:#666;
        padding-top:5px; padding-left:10px; color:white;
        font-weight:bold; text-transform:uppercase; text-align:center;}
    .modal-content p:nth-child(2) { color:red; text-align:center; margin:10px}
    .modal-content p:nth-child(3) { text-align:right; margin:0px}
    .modal-content a{color:#090; text-decoration:none; font-size:12px;padding-right:10px}
</style>
<div id="myModal" class="modal">
    <!-- Nội dung hộp thoại -->
    <div class="modal-content">
        <p>
            <span class="title">Notification</span>
        </p>
        <p><?=$thongbao?></p> <!-- nội dung của hộp thoại -->
        <p><a href="<?=$link_tieptuc?>">Continue</a></p>
    </div>
</div>
<script>
    // Get the modal - Lấy tham chiếu đến thẻ div id=myModal
    var modal = document.getElementById("myModal");
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) { //nếu thẻ được nhấn là <div id="myModal"> thì ẩn nó đi
            //modal.style.display = "none";
        }
    }
</script>