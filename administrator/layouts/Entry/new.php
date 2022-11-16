<?php defined('_EXEC') or die;?>

<main class="wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <ol class="breadcrumb hide-phone">
                        <li class="breadcrumb-item">
                            <a href="index.php">{$vkye_webpage}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Entradas
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div align="center" class="row">
            <div class="col-sm-12">
                <div class="card m-b-30">
                    <div align="center" class="card-body">

                        <form id="myForm">

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
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
