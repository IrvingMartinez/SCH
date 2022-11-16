<?php defined('_EXEC') or die;?>

<input type="text" name="num_card" placeholder="Pase la tarjeta por el lector...">

<script type="text/javascript">

window.addEventListener('keydown',function(e)
    {
        if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13)
        {
            if(e.target.nodeName=='INPUT'&&e.target.type=='text')
            {
                e.preventDefault();
                return false;
            }
        }


        document.getElementById("myForm").submit();
        window.location.reload();
    },
    true);

</script>

<br>

<?=$_POST['num_card']?>
