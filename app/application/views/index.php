<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <head>
        <link href="<?= base_url(); ?>assets/style.min.css?v=<?= time(); ?>" rel="stylesheet" type="text/css">
        <script>
            var base_url = "<?= base_url(); ?>";
        </script>
    </head>
    <body>

        <h1>Game <span id="txt_game">1</span></h1>

        <table width="100%">
            <tr>
                <td width="20%" valign="top">
                    Click: <span id="txt_click">-</span>
                    <br/>
                    <br/>
                    My Best: <span id="txt_my_best">-</span>
                    <br/>
                    <br/>
                    Global Best: <span id="txt_globle_best">-</span>
                    <br/>
                    <br/>

                    <button onclick="newGameClick();" class="new-game">
                        New Game
                    </button>
                </td>
                <td>
                    <div class="grid-container">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            ?>
                        <div class="grid-item close" id="box_<?=$i;?>" onclick="openCard(<?=$i;?>);"><span class="txt" id="num_<?=$i;?>"></span></div>
                        <?php }
                        ?>

                    </div>
                </td>
            </tr>
        </table>
        <input type="hidden" value="0" id="id"/>
        <input type="hidden" value="0" id="click"/>
        <input type="hidden" value="1" id="check"/>
    </body>
    <script src="<?= base_url(); ?>assets/app.min.js?v=<?= time(); ?>"></script>
</html>
